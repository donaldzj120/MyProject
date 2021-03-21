package com.ac;

import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.ac.R;
import com.ac.tool.MissionParcelable;
import com.ac.tool.RemoteUtility;
import com.ac.tool.SystemSettings;
import com.ac.tool.Tools;
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

public class Act_MissionList extends Activity {
	private int REQUEST_CODE = 123;
	private int selectCount = 11;
	private int maxCount = 10;
	private int selectMissionStatus = 3;
	private ProgressDialog waitDialog;
	
	private int toRefreshIndex = 0;
	private String toRefreshMission = "";
	private String toRefreshMission2 = "";
	//private EditText searchKey = null;
	
	private final List<Map<String, Object>> lst_missions = new ArrayList<Map<String, Object>>();
	private SimpleAdapter adpMission;
	
	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	
	    // TODO Auto-generated method stub
	    setContentView(R.layout.layout_missionlist);
	    
	    //
	    ListView lsvMissions = (ListView)findViewById(R.id.lsv_missions);
	    adpMission = new SimpleAdapter(this,lst_missions,R.layout.layout_mission_item,
                                    new String[]{"DISPLAY_HAISOU_STATUS","DISPLAY_MISSION_ID","DISPLAY_FENPEI_DATE","DISPLAY_OVER_DATE"},
                                    new int[]{R.id.txv_mission_status,R.id.txv_mission_id,R.id.txv_fenpei_date,R.id.txv_over_date});
	    View listFooter = this.getLayoutInflater().inflate(R.layout.layout_missionfooter, null);
	    lsvMissions.addFooterView(listFooter);
	    lsvMissions.setAdapter(adpMission);

		//searchKey = (EditText)findViewById(R.id.searchKey);
		Button btn = (Button)findViewById(R.id.btn_search);
		btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // インテントへのインスタンス生成
        		Intent itn_toSearchList = new Intent(getApplication(), Act_Search.class);		
        		//startActivityForResult(itn_toSearchList, REQUEST_CODE);
                //　インテントに値をセット
        		//itn_toSearchList.putExtra("searchKey", searchKey.getText().toString());
        		itn_toSearchList.putExtra("searchKey", "");
                // サブ画面の呼び出し
                startActivity(itn_toSearchList);
            }
		});
		//初期化の場合
		if(savedInstanceState == null){
		    btn_show1_click(null);
		//スリープから戻る　及び　方向変化
	    }else{
	    	MissionParcelable misiionToSave = savedInstanceState.getParcelable("misiionToSave");
	    	lst_missions.clear();
	    	List<Map<String, Object>> missions = misiionToSave.getSavedMission();
	    	for(int index = 0; index < missions.size();index++){
	    		lst_missions.add(missions.get(index));
	    	}
	    	adpMission.notifyDataSetChanged();
	    	
	    	Button btnFooter = (Button)findViewById(R.id.btn_footer);
	    	if(savedInstanceState.getBoolean("btnFooter")){
	    		btnFooter.setClickable(true);
//	    		btnFooter.setAlpha(255); 
	    		btnFooter.setText("次の10件を見る");
	    		btnFooter.setTextColor(Color.BLACK);
	    		adpMission.notifyDataSetChanged();
	    	}else{
	    		btnFooter.setClickable(false);
//	    		btnFooter.setAlpha(75); 
	    		btnFooter.setText("最後である");
	    		btnFooter.setTextColor(Color.GRAY);
	    		adpMission.notifyDataSetChanged();
	    	}
	    }
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
			toRefreshIndex = data.getIntExtra("INDEX", -1);
			toRefreshMission = data.getStringExtra("MISSION_ID");
			toRefreshMission2 = data.getStringExtra("MISSION_ID2");
			new RefreshTask().execute(null,null,null);
		}
	}
	
	@Override
    public void onSaveInstanceState(Bundle outState) {
        //Store state
//		Bundle map = new Bundle();
		MissionParcelable misiionToSave = new MissionParcelable(this.lst_missions);
		outState.putParcelable("misiionToSave", misiionToSave);
		
		Button btnFooter = (Button)findViewById(R.id.btn_footer);
		outState.putBoolean("btnFooter", btnFooter.isClickable());
//        outState.putBundle("SavedState", map);
    }
	
	//ボタン押下処理
	public void btn_show1_click(View v) {
		selectMissionStatus = 1;
		lst_missions.clear();
		new GetDateTask().execute(null,null,null);
	 }
	public void btn_show2_click(View v) {
		//adpMission.notifyDataSetChanged();
		selectMissionStatus = 2;
		lst_missions.clear();
		new GetDateTask().execute(null,null,null);
	 }
	public void btn_show3_click(View v) {
		//adpMission.notifyDataSetChanged();
		selectMissionStatus = 3;
		lst_missions.clear();
		new GetDateTask().execute(null,null,null);
	 }	
	public void btn_footer_click(View v) {
		//adpMission.notifyDataSetChanged();
		lst_missions.clear();
		new GetDateTask().execute(null,null,null);
	 }

	public void btn_conform_click(View v) {
		
		LinearLayout ll_par1 = (LinearLayout)v.getParent();
		TextView txv_mission_id = (TextView) ll_par1.getChildAt(1);
		String missionID = txv_mission_id.getText().toString();
		
		for(int index = 0;index<lst_missions.size();index++){
			Map<String,Object> dataMap = lst_missions.get(index);
			String MISSION_ID = dataMap.get("MISSION_ID").toString();
			String MISSION_ID2 = dataMap.get("MISSION_ID2").toString();
			String DISPLAY_HAISOU_STATUS = dataMap.get("DISPLAY_HAISOU_STATUS").toString();
			if (missionID.equals(MISSION_ID+"-"+MISSION_ID2)){
				Intent itn_toSagyo = new Intent();
				itn_toSagyo.putExtra("INDEX", index);
				itn_toSagyo.putExtra("MISSION_ID", MISSION_ID);
				itn_toSagyo.putExtra("MISSION_ID2", MISSION_ID2);
				itn_toSagyo.putExtra("DISPLAY_HAISOU_STATUS", DISPLAY_HAISOU_STATUS);
				itn_toSagyo.setClass(Act_MissionList.this, Act_Sagyo.class);
				Act_MissionList.this.startActivityForResult(itn_toSagyo, REQUEST_CODE);
			}
		}
	}
	
	private class RefreshTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			 adpMission.notifyDataSetChanged();
			 waitDialog = ProgressDialog.show(Act_MissionList.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 /**
	    	  * 0 : エラー
	    	  * 1 : 正常
	    	  */
	    	 Long result = (long) 0;
	    	 
	    	 String querySelect = "";
	    	 querySelect += "Select * from mission"; 
	    	 querySelect += " Where del_status = 0"; 
	    	 querySelect += "   And zhixing_id = '" + SystemSettings.LoginID + "'"; 
	    	 querySelect += "   And MISSION_ID = '" + toRefreshMission + "'"; 
	    	 querySelect += "   And MISSION_ID2 = '" + toRefreshMission2 + "'"; 
	    	 
	 		//サーバーからデータを取る
	 		RemoteUtility rul = new RemoteUtility(Act_MissionList.this);
	 		JSONArray resultjArray = rul.doquery(querySelect);
	 		
	 		for (int index = 0; index < resultjArray.length(); index++) {
				JSONObject json_data;
				try {
//					Map<String, Object> dataMap = new HashMap<String, Object>();
					Map<String, Object> dataMap = lst_missions.get(toRefreshIndex);
					json_data = resultjArray.getJSONObject(index);
					
					String mission_status = Tools.jsonObjToString(json_data.get("mission_status"));
					String DISPLAY_HAISOU_STATUS = "";
					if("1".equals(mission_status)){
						DISPLAY_HAISOU_STATUS = "手配中";
					}else if("2".equals(mission_status)){
						DISPLAY_HAISOU_STATUS = "配送済";
					}
					dataMap.put("DISPLAY_HAISOU_STATUS", DISPLAY_HAISOU_STATUS);
					
					String  MISSION_ID = Tools.jsonObjToString(json_data.get("mission_id"));
					String  MISSION_ID2 = Tools.jsonObjToString(json_data.get("mission_id2"));
					String  DISPLAY_MISSION_ID = MISSION_ID + "-" + MISSION_ID2;
					
					dataMap.put("MISSION_ID", MISSION_ID);
					dataMap.put("MISSION_ID2", MISSION_ID2);
					dataMap.put("DISPLAY_MISSION_ID", DISPLAY_MISSION_ID);
					
					dataMap.put("DISPLAY_FENPEI_DATE", Tools.jsonObjToString(json_data.get("fenpei_date")));
					dataMap.put("DISPLAY_OVER_DATE", Tools.jsonObjToString(json_data.get("over_date")));
					
					result = (long) 1;
					// end try
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
					lst_missions.clear();
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
	    		adpMission.notifyDataSetChanged();
	    	}else{
	    		Toast toast = Toast.makeText(Act_MissionList.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }
	
	private class GetDateTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			 adpMission.notifyDataSetChanged();
			 waitDialog = ProgressDialog.show(Act_MissionList.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 /**
	    	  * 0 : エラー
	    	  * 1 : 正常、データまだある
	    	  * 2 : 正常、データもうない
	    	  */
	    	 Long result = (long) 0;
	    	 
	    	 String querySelect = "";
	    	 querySelect += "Select * from mission"; 
	    	 querySelect += " Where del_status = 0"; 
	    	 querySelect += "   And zhixing_id = '" + SystemSettings.LoginID + "'"; 
	    	 
	    	 if(selectMissionStatus == 1){
	    		 querySelect += "   And mission_status = 1";
	    		 querySelect += " Order By fenpei_date desc";
	    	 }else if(selectMissionStatus == 2){
	    		 querySelect += "   And mission_status = 2";
	    		 querySelect += " Order By over_date desc";
	    	 }else if(selectMissionStatus == 3){
	    		 querySelect += "   And (mission_status = 1 or mission_status = 2)";
	    		 querySelect += " Order By recv_date desc,mission_status desc";
	    	 }
	    	 
	    	 querySelect += "   LIMIT " + lst_missions.size() + "," + selectCount;
	    	 
	 		//サーバーからデータを取る
	 		RemoteUtility rul = new RemoteUtility(Act_MissionList.this);
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
					
					String mission_status = Tools.jsonObjToString(json_data.get("mission_status"));
					String DISPLAY_HAISOU_STATUS = "";
					if("1".equals(mission_status)){
						DISPLAY_HAISOU_STATUS = "手配中";
					}else if("2".equals(mission_status)){
						DISPLAY_HAISOU_STATUS = "配送済";
					}
					dataMap.put("DISPLAY_HAISOU_STATUS", DISPLAY_HAISOU_STATUS);
					
					
					String  MISSION_ID = Tools.jsonObjToString(json_data.get("mission_id"));
					String  MISSION_ID2 = Tools.jsonObjToString(json_data.get("mission_id2"));
					String  DISPLAY_MISSION_ID = MISSION_ID + "-" + MISSION_ID2;
					
					dataMap.put("MISSION_ID", MISSION_ID);
					dataMap.put("MISSION_ID2", MISSION_ID2);
					dataMap.put("DISPLAY_MISSION_ID", DISPLAY_MISSION_ID);
					
					dataMap.put("DISPLAY_FENPEI_DATE", Tools.jsonObjToString(json_data.get("fenpei_date")));
					dataMap.put("DISPLAY_OVER_DATE", Tools.jsonObjToString(json_data.get("over_date")));
					
					lst_missions.add(dataMap);
					// end try
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
					lst_missions.clear();
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
	    		adpMission.notifyDataSetChanged();
	    	}else if(result == (long)2){
	    		Button btnFooter = (Button)findViewById(R.id.btn_footer);
	    		btnFooter.setClickable(false);
//	    		btnFooter.setAlpha(75); 
	    		btnFooter.setText("最後である");
	    		btnFooter.setTextColor(Color.GRAY);
	    		adpMission.notifyDataSetChanged();
	    	}else{
	    		Toast toast = Toast.makeText(Act_MissionList.this, "データ取得失敗しました。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }

}
