package com.ac;

import java.net.URL;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.ac.tool.RemoteUtility;
import com.ac.tool.Tools;

public class Act_AddJyusho extends Activity {
	/** Called when the activity is first created. */
	//int INDEX = 0;
	private String JYUSHO_ID = "";
	private String VIEW_FLAG = "";
	
	private EditText editJyusho = null;
	private EditText editBikou = null;
	
	private String strJyusho = "";
	private String strBikou = "";
	
	
	private JSONArray resultjArray ;
	private ProgressDialog waitDialog;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	
	    // TODO Auto-generated method stub
	    setContentView(R.layout.layout_search_add);
	    
	    Intent intent = getIntent();
	    JYUSHO_ID = intent.getStringExtra("JYUSHOID");
	    VIEW_FLAG = intent.getStringExtra("viewFlag");
	    
    	if(JYUSHO_ID != null && !"".equals(JYUSHO_ID) && !JYUSHO_ID.equals("0")) {
	    	new GetJyushoInfo().execute(null,null,null);
	    }

	    // 登録ボタン
	    Button btnKakutei = (Button)findViewById(R.id.btn_kakutei);
	    btnKakutei.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            	
            	editJyusho = (EditText)findViewById(R.id.editJyusho);
            	strJyusho = editJyusho.getText().toString();
        	    
            	editBikou = (EditText)findViewById(R.id.editBikou);
            	strBikou = editBikou.getText().toString();

            	if (strJyusho.length() == 0) {
            		editJyusho.setError("住所を入力してください。");
            	}
            	
            	if (strBikou.length() == 0) {
            		editBikou.setError("備考を入力してください。");
            	}
            	
            	if(strJyusho.length() > 0 && strBikou.length() > 0) {
            		new DoSaveTask().execute(null,null,null);
            	}
            }
		});
		
	    // 戻るボタン
		Button btnCancel = (Button) findViewById(R.id.btn_cancel);
		btnCancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            	finish();
            }
        });
		
	    /*
	    if(!isMissionOver()){
	    	//サイン
	        ImageView signSyoMei = (ImageView)findViewById(R.id.imageView1);
	        signSyoMei.setOnLongClickListener(new OnLongClickListener() {
	            public boolean onLongClick(View v) {
	        	
//	        	    SignPicPathName = "sign.jpeg";
	            	Intent intent = new Intent();
	            	intent.putExtra("SignPicPathName", SignPicPathName);
	            	intent.setClass(Act_AddJyusho.this, Dlg_Sign.class);
	            	Act_AddJyusho.this.startActivity(intent);
	            	return true;
	            }
	        });
	    }
	    */
	}
	/*
	private boolean isMissionOver(){
		return "配送済".equals(DISPLAY_HAISOU_STATUS);
	}
	
	@Override
	public void onResume() {
		super.onResume();
		File imgFile1 = new File(SignPicPathName);
		if (imgFile1.exists()) {
			Bitmap myBitmap = BitmapFactory.decodeFile(imgFile1.getAbsolutePath());

			ImageView imv_nou = (ImageView) findViewById(R.id.imageView1);
			imv_nou.setImageBitmap(myBitmap);
		}
		
		//保存ボタンの有効・無効設定
		if(!isMissionOver() && imgFile1.exists()){
			((Button)findViewById(R.id.btn_save)).setVisibility(View.VISIBLE);
		}else{
			((Button)findViewById(R.id.btn_save)).setVisibility(View.INVISIBLE);
		}
		
	}
	*/
	private class GetJyushoInfo extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_AddJyusho.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 String querySelect = "";
	    	 querySelect += "Select * from jyusho"; 
	    	 querySelect += " Where ID  = '" + JYUSHO_ID + "'"; 
	    	 
	    	 try{
	    		 //サーバーからデータを取る
		 		RemoteUtility rul = new RemoteUtility(Act_AddJyusho.this);
		 		resultjArray = rul.doquery(querySelect);
	    	 }catch (Exception e){
	    		 return (long) 0;
	    	 }
	 		
	 		return (long) 1;
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	if(result == (long)1){
		 		for (int index = 0; index < resultjArray.length(); index++) {
					JSONObject json_data;
					try {
						json_data = resultjArray.getJSONObject(index);
						
						//データの取得
						String tmpJyusho = Tools.jsonObjToString(json_data.get("JYUSHO"));
						String tmpBikou = Tools.jsonObjToString(json_data.get("BIKOU"));
						
						//住所
						((TextView) findViewById(R.id.editJyusho)).setText(tmpJyusho);
						
						//備考
						((TextView) findViewById(R.id.editBikou)).setText(tmpBikou);
						
					} catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
						waitDialog.dismiss();
						Toast toast = Toast.makeText(Act_AddJyusho.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
				 		toast.setGravity(Gravity.CENTER, 0, 0);
				 		toast.show();
					}
				// end for
		 		}
		 		waitDialog.dismiss();
	    	}else{
	    		waitDialog.dismiss();
	    		Toast toast = Toast.makeText(Act_AddJyusho.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }

	private class DoSaveTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_AddJyusho.this, "", "UpLoading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 RemoteUtility rul = new RemoteUtility(Act_AddJyusho.this);

	    	 String updateSql = "";
	    	 // 登録の場合
	    	 if ("0".equals(VIEW_FLAG)) {
	    		 updateSql += "INSERT INTO jyusho ";
	    		 updateSql += "values('" + strJyusho + "', ";
	    		 updateSql += "'" + strBikou + "' ";
	    		 updateSql += "now(), now())";
             // 更新の場合
	    	 } else {
	    		 updateSql += "UPDATE jyusho ";
	    		 updateSql += "SET JYUSHO = '" + strJyusho + "', ";
	    		 updateSql += "BIKOU = '" + strBikou + "', ";
	    		 updateSql += "UPDATE_DATE = now() ";
	    		 updateSql += "WHERE ID = " + JYUSHO_ID;
	    	 }
	    	 
    		 rul.doupdate(updateSql);

    		 return (long) 1;
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	if(result == (long)1){
		 		waitDialog.dismiss();
		 		// Prepare data intent 
		 		//Intent data = new Intent();
		 		//data.putExtra("viewFlag", VIEW_FLAG);
		 		//data.putExtra("JYUSHOID", JYUSHO_ID);
		 		// Activity finished ok, return the data
		 		//setResult(RESULT_OK, data);
		 		
		 		//Act_AddJyusho.this.finish();
		 		
                // インテントへのインスタンス生成
        		Intent itn_toSearchList = new Intent(getApplication(), Act_Search.class);		
                //　インテントに値をセット
        		itn_toSearchList.putExtra("searchKey", "");
                // サブ画面の呼び出し
                startActivity(itn_toSearchList);
	    	}else{
	    		waitDialog.dismiss();
	    		Toast toast = Toast.makeText(Act_AddJyusho.this, "データ保存失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	     }
	 }
}
