package com.ac;

import java.io.File;
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
import android.widget.EditText;
import android.widget.Toast;

import com.ac.tool.RemoteUtility;
import com.ac.tool.SystemSettings;
import com.ac.tool.Tools;

public class Act_Login extends Activity {

	private ProgressDialog waitDialog;
	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	
	    setContentView(R.layout.layout_login);
	    
	    new IniSystemTask().execute(null, null, null);
	    
	}
	
    private void initEnviroment(){
    	File f = new File(getString(R.string.Dir_home));
    	if(!f.exists()){
    		f.mkdir();
    	}
    }
    
	//ログインボタン押下処理
	public void btn_login_click(View v) {
		new CheckUserOnlineTask().execute(null,null,null);
	 }
	public void btn_cancle_click(View v) {
		Act_Login.this.finish();
	 }
	
	private class IniSystemTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_Login.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	 initEnviroment();
	         return (long) 0;
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	 waitDialog.dismiss();
	     }
	 }
	 
	private class CheckUserOnlineTask extends AsyncTask<URL, Integer, Long> {
		 protected void onPreExecute (){
			waitDialog = ProgressDialog.show(Act_Login.this, "", "Loading...");
		 }
	     protected Long doInBackground(URL... urls) {
	    	//医者ID
	 		EditText edt_userid = (EditText)findViewById(R.id.edt_userid);
	 		String userid = edt_userid.getText().toString();
	 		
	 		SystemSettings.LoginID = userid;
	 		
	 		//パスワード
	 		EditText LoginID= (EditText)findViewById(R.id.edt_password);
	 		String password = LoginID.getText().toString();
	 		
//	 		SHAencode SHA = new SHAencode();
	 		
//	 		String pass_SHA = SHA.encrype(password);
	 		
	 		Boolean usercheck = false;
	 		//サーバーからデータを取る
	 		RemoteUtility ru = new RemoteUtility(Act_Login.this);
	 		usercheck = ru.checkUser(userid, password);
	 		
	 		if (usercheck){
	 			String sql = "";
//	 			sql += " Select F.email AS EmailFrom,";
//	 			sql += "        T.email AS EmailTo";
//	 			sql += " From   users AS F";
//	 			sql += " Left Join users AS T";
//	 			sql += " On F.jyouiID = T.id";
//	 			sql += " Where     F.user_id = '" + userid + "'";
	 			
	 			sql += " Select F.user_id AS EmailFrom,";
	 			sql += "        T.user_id AS EmailTo";
	 			sql += " From   users AS F";
	 			sql += " Left Join users AS T";
	 			sql += " On F.jyouiID = T.id";
	 			sql += " Where     F.user_id = '" + userid + "'";
	 			
	 			JSONArray results = ru.doquery(sql);
	 			for(int index = 0;index < results.length();index++){
	 				JSONObject json_data;
	 				try {
						json_data = results.getJSONObject(index);
						SystemSettings.FromEmail = Tools.jsonObjToString(json_data.get("EmailFrom"));
						SystemSettings.ToEmail = Tools.jsonObjToString(json_data.get("EmailTo"));
					} catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
	 			}
	 			
	 			return (long) 1;
	 		}
	 		else{
	 			return (long) 0;
	 		}
	         
	     }

	     protected void onProgressUpdate(Integer... progress) {
	     }

	     protected void onPostExecute(Long result) {
	    	waitDialog.dismiss();
	    	
	    	if(result == (long)1){
	    		Intent itn_toMissionList = new Intent();
	    		itn_toMissionList.setClass(Act_Login.this, Act_MissionList.class);
				Act_Login.this.startActivity(itn_toMissionList);
	    	}else{
	    		Toast toast = Toast.makeText(Act_Login.this, "ユーザーＩＤ又はパスワードが間違います。", Toast.LENGTH_LONG);
		 		toast.setGravity(Gravity.CENTER, 0, 0);
		 		toast.show();
	    	}
	    	
	     }
	 }
}
