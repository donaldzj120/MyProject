package com.ac;

import java.io.File;
import java.net.URL;
import java.text.NumberFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.ac.tool.Mail;
import com.ac.tool.RemoteUtility;
import com.ac.tool.SystemSettings;
import com.ac.tool.Tools;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.View.OnLongClickListener;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class Act_Sagyo extends Activity {
	/** Called when the activity is first created. */
	int INDEX = 0;
	String MISSION_ID = "";
	String MISSION_ID2 = "";
	String DISPLAY_HAISOU_STATUS = "";
	String SignPicPathName = "";
	private JSONArray resultjArray ;
	private ProgressDialog waitDialog;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	
	    // TODO Auto-generated method stub
	    setContentView(R.layout.layout_sagyo);
	    
	    Intent intent = getIntent();
	    INDEX = intent.getIntExtra("INDEX", -1);
	    MISSION_ID = intent.getStringExtra("MISSION_ID");
	    MISSION_ID2 = intent.getStringExtra("MISSION_ID2");
	    DISPLAY_HAISOU_STATUS = intent.getStringExtra("DISPLAY_HAISOU_STATUS");
	    SignPicPathName = getString(R.string.Dir_home) + MISSION_ID + "_" + MISSION_ID2 + "_sign.jpeg";
	    
	    new GetSagyoTask().execute(null,null,null);
	    
	    if(!isMissionOver()){
	    	//サイン
	        ImageView signSyoMei = (ImageView)findViewById(R.id.imageView1);
	        signSyoMei.setOnLongClickListener(new OnLongClickListener() {
	            public boolean onLongClick(View v) {
	        	
//	        	    SignPicPathName = "sign.jpeg";
	            	Intent intent = new Intent();
	            	intent.putExtra("SignPicPathName", SignPicPathName);
	            	intent.setClass(Act_Sagyo.this, Dlg_Sign.class);
	            	Act_Sagyo.this.startActivity(intent);
	            	return true;
	            }
	        });
	    }
	    
	}
	
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
	
	private class GetSagyoTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_Sagyo.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 String querySelect = "";
	    	 querySelect += "Select mission.over_date ,sagyo.* from mission"; 
	    	 querySelect += "    left join sagyo"; 
	    	 querySelect += "           on mission.mission_id = sagyo.sagyo_id1"; 
	    	 querySelect += "          and mission.mission_id2 = sagyo.sagyo_id2"; 
	    	 querySelect += " Where mission.mission_id  = '" + MISSION_ID + "'"; 
	    	 querySelect += "   And mission.mission_id2 = '" + MISSION_ID2 + "'"; 
	    	 
	    	 try{
	    		 //サーバーからデータを取る
	 		RemoteUtility rul = new RemoteUtility(Act_Sagyo.this);
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
						
						//引取日時
						String year = Tools.jsonObjToString(json_data.get("year"));
						String month = Tools.jsonObjToString(json_data.get("month"));
						String day = Tools.jsonObjToString(json_data.get("day"));
						String jikan = Tools.jsonObjToString(json_data.get("jikan"));
						String torihikiYMD = Tools.getwariYMD(year, month, day);
						((TextView) findViewById(R.id.txv_torihikiYMD)).setText(torihikiYMD+" "+jikan);
						
						//伝票ID 
						String tennpyouID = "伝票ID " + MISSION_ID + "-" + MISSION_ID2;
						((TextView) findViewById(R.id.txv_tennpyouID)).setText(tennpyouID);
						
						//届け先　電話：todoke_tel
						String todoke_tel = "電話：" + Tools.jsonObjToString(json_data.get("todoke_tel"));
						((TextView) findViewById(R.id.txv_todoke_tel)).setText(todoke_tel);
						
						//届け先　ご住所　〒 txv_todoke_post
						((TextView) findViewById(R.id.txv_todoke_post)).setText("ご住所　〒 "+
								    Tools.jsonObjToString(json_data.get("todoke_post")));

						//届け先　ご住所1　txv_todoke_add1
						((TextView) findViewById(R.id.txv_todoke_add1)).setText(
								    Tools.jsonObjToString(json_data.get("todoke_add1")));
						//届け先　ご住所2　txv_todoke_add2
						((TextView) findViewById(R.id.txv_todoke_add2)).setText(
								    Tools.jsonObjToString(json_data.get("todoke_add2")));
						//届け先　ご住所1　txv_todoke_add1
						((TextView) findViewById(R.id.txv_todoke_add3)).setText(
								    Tools.jsonObjToString(json_data.get("todoke_add3")));
						
						//届け先　お名前
						((TextView) findViewById(R.id.txv_todoke_name1)).setText(
							    Tools.jsonObjToString(json_data.get("todoke_name1")));
						((TextView) findViewById(R.id.txv_todoke_name2)).setText(
							    Tools.jsonObjToString(json_data.get("todoke_name2")) + " 様");
						

						//荷送人　電話：txv_ka_tel
						String ka_tel = "電話：" + Tools.jsonObjToString(json_data.get("ka_tel"));
						((TextView) findViewById(R.id.txv_ka_tel)).setText(ka_tel);
						
						//荷送人　ご住所　〒 txv_ka_post
						((TextView) findViewById(R.id.txv_ka_post)).setText("ご住所　〒 "+
								    Tools.jsonObjToString(json_data.get("ka_post")));

						//荷送人　ご住所1　txv_ka_add1
						((TextView) findViewById(R.id.txv_ka_add1)).setText(
								    Tools.jsonObjToString(json_data.get("ka_add1")));
						//荷送人　ご住所2　txv_ka_add2
						((TextView) findViewById(R.id.txv_ka_add2)).setText(
								    Tools.jsonObjToString(json_data.get("ka_add2")));
						//荷送人　ご住所1　txv_ka_add1
						((TextView) findViewById(R.id.txv_ka_add3)).setText(
								    Tools.jsonObjToString(json_data.get("ka_add3")));
						
						//荷送人　お名前
						((TextView) findViewById(R.id.txv_ka_name1)).setText(
							    Tools.jsonObjToString(json_data.get("ka_name1")));
						((TextView) findViewById(R.id.txv_ka_name2)).setText(
							    Tools.jsonObjToString(json_data.get("ka_name2")) + " 様");
						
						//記事欄 txv_bikou  
						String hiccyaku = "";
						String sagyo_date = Tools.jsonObjToString(json_data.get("sagyo_date"));
						String sagyo_time = Tools.jsonObjToString(json_data.get("sagyo_time"));
						
						hiccyaku = Tools.getWeek(sagyo_date, sagyo_time);
						((TextView) findViewById(R.id.txv_bikou)).setText(hiccyaku);
						
						 //特記事項 txv_tokki tokki
						((TextView) findViewById(R.id.txv_tokki)).setText(
							    Tools.jsonObjToString(json_data.get("tokki")));
						
						//品名：txv_hinmei
						((TextView) findViewById(R.id.txv_hinmei)).setText(
							    "品名：" + Tools.jsonObjToString(json_data.get("hinmei")));
						
						//荷姿 txv_ka
						((TextView) findViewById(R.id.txv_ka)).setText(
							    Tools.jsonObjToString(json_data.get("ka")));
						
						//配達指示 txv_siji
						((TextView) findViewById(R.id.txv_siji)).setText(
							    Tools.jsonObjToString(json_data.get("siji")));
						
						//個数 txv_kosuu
						((TextView) findViewById(R.id.txv_kosuu)).setText(
							    Tools.jsonObjToString(json_data.get("kosuu")) + "個");
						
						//容積重量 txv_jyuryo
						((TextView) findViewById(R.id.txv_jyuryo)).setText(
							    Tools.jsonObjToString(json_data.get("jyuryo")) + "KG");
						
						//保険金額：０ txv_hoken
						String kingaku = Tools.jsonObjToString(json_data.get("hoken"));
						if(!"".equals(kingaku)){
							kingaku = NumberFormat.getInstance().format(Integer.parseInt(kingaku));
						}
						((TextView) findViewById(R.id.txv_hoken)).setText(
							    "保険金額：" + kingaku);
						
						//
						if(isMissionOver()){
							String overdateFrom = Tools.jsonObjToString(json_data.get("over_date"));
							SimpleDateFormat formatterFrom = new SimpleDateFormat ("yyyy-MM-dd HH:mm:ss");
							SimpleDateFormat formatterTo = new SimpleDateFormat ("yyyy年MM月dd日 HH時mm分");
							try {
								Date overdate = formatterFrom.parse(overdateFrom);
								String overdateTo = formatterTo.format(overdate);
								((TextView) findViewById(R.id.txv_overdate)).setText(overdateTo);
								((TextView) findViewById(R.id.txv_overstr)).setText("上記貨物確かに受領しました。");
							} catch (ParseException e) {
								e.printStackTrace();
							}  
						}else{
//							((TextView) findViewById(R.id.txv_overdate)).setText("");
//							((TextView) findViewById(R.id.txv_overstr)).setText("");
						}
						// end try
					} catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
						waitDialog.dismiss();
						Toast toast = Toast.makeText(Act_Sagyo.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
				 		toast.setGravity(Gravity.CENTER, 0, 0);
				 		toast.show();
					}
				// end for
		 		}
		 		waitDialog.dismiss();
	    	}else{
	    		waitDialog.dismiss();
	    		Toast toast = Toast.makeText(Act_Sagyo.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }
	
	//保存ボタン押下処理
	public void btnclick_save(View v) {
		new DoSaveTask().execute(null,null,null);;
	}
	
	//戻るボタン押下処理
	public void btnclice_cancle(View v) {
		this.finish();
	}

	private class DoSaveTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_Sagyo.this, "", "UpLoading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 RemoteUtility rul = new RemoteUtility(Act_Sagyo.this);
	    	 //エラーが出ないように、コメントアウトした。2015/01/03
	    	 if(rul.doFileUpload(SignPicPathName,SystemSettings.getUrl_Upload(Act_Sagyo.this))){
	    		 String updateSql = "";
	    		 updateSql += "UPDATE mission ";
	    		 updateSql += "SET mission_status = '2',over_date = now(),fileover = '" + MISSION_ID + "_" + MISSION_ID2 + "_sign.jpeg" + "' ";
	    		 updateSql += "WHERE mission_id = '" + MISSION_ID + "' ";
	    		 updateSql += "AND   mission_id2 = '" + MISSION_ID2 + "' ";

	    		 rul.doupdate(updateSql);
	    		 rul.sendMail(SystemSettings.FromEmail,SystemSettings.ToEmail,MISSION_ID,MISSION_ID2);
	    		 
//	 	  		//========================================================================
//		      	 try {
//		      		 Mail m = new Mail(); 
//		      	 
//		      		 String[] toArr = {"yuexutao@gmail.com"}; 
//		      		 m.setTo(toArr); 
//		      		 m.setFrom(SystemSettings.FromEmail); 
//		      		 m.setSubject("【任務完了】"); 
//		      		String body = "【" + SystemSettings.LoginID + "】が【" + MISSION_ID + "】-【" + MISSION_ID2 + "】を完了しました。";
//		      		 m.setBody(body);
//		      		 m.send();
//		      	 } catch (Exception e) {
//		   				// TODO Auto-generated catch block
//		   				e.printStackTrace();
//		   			}
//		      	 //========================================================================
	    		 return (long) 1;
	    	 }else{
	    		 return (long) 0;
	    	 }
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	if(result == (long)1){
		 		waitDialog.dismiss();
		 		// Prepare data intent 
		 		Intent data = new Intent();
		 		data.putExtra("INDEX", INDEX);
		 		data.putExtra("MISSION_ID", MISSION_ID);
		 		data.putExtra("MISSION_ID2", MISSION_ID2);
		 		// Activity finished ok, return the data
		 		setResult(RESULT_OK, data);
		 		
		 		Act_Sagyo.this.finish();
		 		
	    	}else{
	    		waitDialog.dismiss();
	    		Toast toast = Toast.makeText(Act_Sagyo.this, "データ保存失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	     }
	 }
}
