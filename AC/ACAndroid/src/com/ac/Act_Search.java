package com.ac;

import java.net.URL;
import java.security.PublicKey;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.ac.tool.MissionParcelable;
import com.ac.tool.RemoteUtility;
import com.ac.tool.SystemSettings;
import com.ac.tool.Tools;

public class Act_Search extends Activity {
	private int REQUEST_CODE = 123;
	private int selectCount = 11;
	private int maxCount = 10;
	private ProgressDialog waitDialog;
	
	//private int toRefreshIndex = 0;
	//private String toRefreshMission = "";
	//private String toRefreshMission2 = "";
	private String strSearchKey="";
	
	private EditText searchKey = null;
	
	private final List<Map<String, Object>> lst_search = new ArrayList<Map<String, Object>>();
	private SimpleAdapter adpSearchList;
	
	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	
	    // TODO Auto-generated method stub
	    setContentView(R.layout.layout_searchlist);
	    //住所のリスト
	    ListView lsvSearch = (ListView)findViewById(R.id.lsv_search);
	    adpSearchList = new SimpleAdapter(this,lst_search,R.layout.layout_search_item,
	                                    new String[]{"DISPLAY_ID", "DISPLAY_JYUSHO", "DISPLAY_BIKOU"},
	                                    new int[]{R.id.txv_id, R.id.txv_jyusho,R.id.txv_jyusho_bikou});
	    View listFooter = this.getLayoutInflater().inflate(R.layout.layout_searchfooter, null);
	    lsvSearch.addFooterView(listFooter);
	    lsvSearch.setAdapter(adpSearchList);

	    Intent intent = getIntent();
	    strSearchKey = intent.getStringExtra("searchKey");
	    
	    searchKey = (EditText)findViewById(R.id.searchKey);
	    if(!"".equals(strSearchKey)) {
	    	searchKey.setText(strSearchKey);
	    } else {
	    	strSearchKey = searchKey.getText().toString();
	    }
	    
		//初期化の場合
		if(savedInstanceState == null){
			new GetDateTask().execute(null,null,null);
		//スリープから戻る　及び　方向変化
	    }else{
	    	MissionParcelable misiionToSave = savedInstanceState.getParcelable("misiionToSave");
	    	lst_search.clear();
	    	List<Map<String, Object>> missions = misiionToSave.getSavedMission();
	    	for(int index = 0; index < missions.size();index++){
	    		lst_search.add(missions.get(index));
	    	}
	    	adpSearchList.notifyDataSetChanged();
	    	
	    	Button btnFooter = (Button)findViewById(R.id.btn_footer);
	    	if(savedInstanceState.getBoolean("btnFooter")){
	    		btnFooter.setClickable(true);
//	    		btnFooter.setAlpha(255); 
	    		btnFooter.setText("次の10件を見る");
	    		btnFooter.setTextColor(Color.BLACK);
	    		adpSearchList.notifyDataSetChanged();
	    	}else{
	    		btnFooter.setClickable(false);
//	    		btnFooter.setAlpha(75); 
	    		btnFooter.setText("最後である");
	    		btnFooter.setTextColor(Color.GRAY);
	    		adpSearchList.notifyDataSetChanged();
	    	}
	    }
		
		Button returnButton = (Button) findViewById(R.id.return_button);
		returnButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            	finish();
            }
        });
		Button btn = (Button)findViewById(R.id.btn_search);
		btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // インテントへのインスタンス生成
        		//Intent itn_toSearchList = new Intent(getApplication(), Act_Search.class);		
        		//startActivityForResult(itn_toSearchList, REQUEST_CODE);
                //　インテントに値をセット
        		//itn_toSearchList.putExtra("searchKey", searchKey.getText().toString());
                // サブ画面の呼び出し
                //startActivity(itn_toSearchList);
            	strSearchKey = searchKey.getText().toString();
            	lst_search.clear();
            	new GetDateTask().execute(null,null,null);
            }
		});
		
		Button btnAdd = (Button)findViewById(R.id.btn_add);
		btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // インテントへのインスタンス生成
        		Intent itn_toSearchList = new Intent(getApplication(), Act_AddJyusho.class);		
        		//startActivityForResult(itn_toSearchList, REQUEST_CODE);
                //　インテントに値をセット
        		//itn_toSearchList.putExtra("searchKey", searchKey.getText().toString());
        		itn_toSearchList.putExtra("JYUSHOID", "0");
        		itn_toSearchList.putExtra("viewFlag", "0");
                // サブ画面の呼び出し
                startActivity(itn_toSearchList);
            }
		});
	}
//	@Override
//	public void onResume() {
//		super.onResume();
//		lst_missions.clear();
//		new GetDateTask().execute(null,null,null);
//	}
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		if (resultCode == RESULT_OK && requestCode == REQUEST_CODE) {
			//toRefreshIndex = data.getIntExtra("INDEX", -1);
			//toRefreshMission = data.getStringExtra("MISSION_ID");
			//toRefreshMission2 = data.getStringExtra("MISSION_ID2");
			new RefreshTask().execute(null,null,null);
		}
	}
	
	@Override
    public void onSaveInstanceState(Bundle outState) {
        //Store state
//		Bundle map = new Bundle();
		//MissionParcelable misiionToSave = new MissionParcelable(this.lst_search);
		//outState.putParcelable("misiionToSave", misiionToSave);
		
		Button btnFooter = (Button)findViewById(R.id.btn_footer);
		outState.putBoolean("btnFooter", btnFooter.isClickable());
//        outState.putBundle("SavedState", map);
    }
	
	public void btn_footer_click(View v) {
		new GetDateTask().execute(null,null,null);
	 }	
	/*
	 * 確認ボタン
	 */
	public void btn_conform_click(View v) {
		
		LinearLayout ll_par1 = (LinearLayout)v.getParent();
		TextView txv_id = (TextView) ll_par1.getChildAt(0);
		String jyushoID = txv_id.getText().toString();
		
		Intent itn_toJyusho = new Intent();
		//itn_toJyusho.putExtra("INDEX", index);
		itn_toJyusho.putExtra("JYUSHOID", jyushoID);
		itn_toJyusho.putExtra("viewFlag", "1");
		itn_toJyusho.setClass(Act_Search.this, Act_AddJyusho.class);
		Act_Search.this.startActivityForResult(itn_toJyusho, REQUEST_CODE);
		/*
		for(int index = 0;index<lst_search.size();index++){
			Map<String,Object> dataMap = lst_search.get(index);
			String ID = dataMap.get("ID").toString();
			if (jyushoID.equals(ID)){
				Intent itn_toJyusho = new Intent();
				itn_toJyusho.putExtra("INDEX", index);
				itn_toJyusho.putExtra("JYUSHOID", ID);
				itn_toJyusho.setClass(Act_Search.this, Act_AddJyusho.class);
				Act_Search.this.startActivityForResult(itn_toJyusho, REQUEST_CODE);
			}
		}
		*/
	}
	
	private class RefreshTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			 waitDialog = ProgressDialog.show(Act_Search.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 /**
	    	  * 0 : エラー
	    	  * 1 : 正常
	    	  */
	    	 Long result = (long) 0;
	    	 
	    	 String querySelect = "";
	    	 querySelect += "Select * from jyusho"; 
	    	 if(!"".equals(strSearchKey)) {
	    		 querySelect += " Where JYUSHO like '%" + strSearchKey + "%'";
	    	 }
	    	 querySelect += "   LIMIT " + lst_search.size() + "," + selectCount;
	    	 
	 		//サーバーからデータを取る
	 		RemoteUtility rul = new RemoteUtility(Act_Search.this);
	 		JSONArray resultjArray = rul.doquery(querySelect);
	 		
	 		for (int index = 0; index < resultjArray.length(); index++) {
	 			JSONObject json_data;
				try {
					Map<String, Object> dataMap = new HashMap<String, Object>();
					
					json_data = resultjArray.getJSONObject(index);
					
					String ID = Tools.jsonObjToString(json_data.get("ID"));
					String Jyusho = Tools.jsonObjToString(json_data.get("JYUSHO"));
					String Bikou = Tools.jsonObjToString(json_data.get("BIKOU"));
					dataMap.put("DISPLAY_ID", ID);
					dataMap.put("DISPLAY_JYUSHO", Jyusho);
					dataMap.put("DISPLAY_BIKOU", Bikou);
					
					lst_search.add(dataMap);
					// end try
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
					lst_search.clear();
					return (long) 0;
				}
				// end for
	 		}
	 		return result;
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	waitDialog.dismiss();
	    	
	    	if(result == (long)1){
	    		adpSearchList.notifyDataSetChanged();
	    	}else{
	    		Toast toast = Toast.makeText(Act_Search.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }
	
	private class GetDateTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			 adpSearchList.notifyDataSetChanged();
			 waitDialog = ProgressDialog.show(Act_Search.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 /**
	    	  * 0 : エラー
	    	  * 1 : 正常、データまだある
	    	  * 2 : 正常、データもうない
	    	  */
	    	 Long result = (long) 0;
	    	 
	    	 String querySelect = "";
	    	 querySelect += "Select * from jyusho"; 
	    	 if(!"".equals(strSearchKey)) {
	    		 querySelect += " Where JYUSHO like '%" + strSearchKey + "%'";
	    	 }
	    	 querySelect += "   LIMIT " + lst_search.size() + "," + selectCount;
	    	 
	 		//サーバーからデータを取る
	 		RemoteUtility rul = new RemoteUtility(Act_Search.this);
	 		JSONArray resultjArray = rul.doquery(querySelect);
	 		//毎回最大１０件を表示
	 		int resultCount = resultjArray.length();
	 		int showCount = 0;
	 		if(resultCount > maxCount){
	 			showCount = maxCount;
	 			result = (long) 1;
	 		}else{
	 			showCount = resultCount;
	 			result = (long) 2;
	 		}
	 		for (int index = 0; index < showCount; index++) {
				JSONObject json_data;
				try {
					Map<String, Object> dataMap = new HashMap<String, Object>();
					
					json_data = resultjArray.getJSONObject(index);
					
					String ID = Tools.jsonObjToString(json_data.get("ID"));
					String Jyusho = Tools.jsonObjToString(json_data.get("JYUSHO"));
					String Bikou = Tools.jsonObjToString(json_data.get("BIKOU"));
					dataMap.put("DISPLAY_ID", ID);
					dataMap.put("DISPLAY_JYUSHO", Jyusho);
					dataMap.put("DISPLAY_BIKOU", Bikou);
					
					lst_search.add(dataMap);
					// end try
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
					lst_search.clear();
					return (long) 0;
				}
				// end for
	 		}
	 		return result;
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	waitDialog.dismiss();
	    	
	    	if(result == (long)1){
	    		Button btnFooter = (Button)findViewById(R.id.btn_footer);
	    		btnFooter.setClickable(true);
//	    		btnFooter.setAlpha(255); 
	    		btnFooter.setText("次の10件を見る");
	    		btnFooter.setTextColor(Color.BLACK);
	    		adpSearchList.notifyDataSetChanged();
	    	}else if(result == (long)2){
	    		Button btnFooter = (Button)findViewById(R.id.btn_footer);
	    		btnFooter.setClickable(false);
//	    		btnFooter.setAlpha(75); 
	    		btnFooter.setText("最後である");
	    		btnFooter.setTextColor(Color.GRAY);
	    		adpSearchList.notifyDataSetChanged();
	    	}else{
	    		Toast toast = Toast.makeText(Act_Search.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }

}
