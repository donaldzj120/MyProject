package com.ac.tool;

import android.app.Activity;
import android.content.SharedPreferences;

public class SystemSettings {
	public static final String Key_DB_USER = "DB_USER";
	public static final String Key_DB_PSW = "DB_PSW";
	public static final String Key_DB_NAME = "DB_NAME";
	public static final String Key_URL_HOST = "URL_HOST";
	
	private static final String PREFS_NAME = "MyPrefsFile";
	
	private static final String DB_USER = "te21130_AC";
//	private static final String DB_USER = "root";
	
	private static final String DB_PSW = "ac091122";
//	private static final String DB_PSW = "root";
	
	private static final String DB_NAME = "te21130_ac";
	
//	private static final String URL_HOST = "http://server40.joeswebhosting.net/~te21130/test/index.php";
	private static final String URL_HOST = "https://www.ac-system.co.jp/index.php";
//	private static final String URL_HOST = "http://192.168.10.111:8080/AC/index.php";
	
	private static final String AppName = "NONE";
	
	public static String LoginID = "";
	public static String FromEmail = "";
	public static String ToEmail = "";
	
	public static int NetWorkSattus = -1;
	
	public static String getSetting(Activity conten ,String key){
		String value = "";
		
		SharedPreferences settings = conten.getSharedPreferences(PREFS_NAME, 0);
		value = settings.getString(key, "");
		
		if("".equals(value)){
			if(Key_DB_USER.equals(key)){
				value = DB_USER;
			}else if(Key_DB_PSW.equals(key)){
				value = DB_PSW;
			}else if(Key_DB_NAME.equals(key)){
				value = DB_NAME;
			}else if(Key_URL_HOST.equals(key)){
				value = URL_HOST;
			}
		}
	       
		return value;
	}
	
	public static void setSetting(Activity content ,String key,String value){
		SharedPreferences settings = content.getSharedPreferences(PREFS_NAME, 0);
	      SharedPreferences.Editor editor = settings.edit();
	      editor.putString(key, value);
	      // Commit the edits!
	      editor.commit();
	}
	
	public static String getUrl_Check(Activity content){
		String value = getSetting(content,Key_URL_HOST) + "/PDACheckUser";
//		String value = getSetting(content,Key_URL_HOST) + "/ACcheckUser.php";
		return value;
	}
	
	public static String getUrl_Select(Activity content){
		return getSetting(content,Key_URL_HOST) + "/PDADoQuery";
//		return getSetting(content,Key_URL_HOST) + "/ACdoquery.php";
	}
	
	public static String getUrl_Update(Activity content){
		return getSetting(content,Key_URL_HOST) + "/PDADoUpdate";
//		return getSetting(content,Key_URL_HOST) + "/ACdoupdate.php";
	}	
	public static String getUrl_Upload(Activity content){
		return getSetting(content,Key_URL_HOST)  + "/PDAUploadFile";
//		return getSetting(content,Key_URL_HOST)  + "/ACuploadfile.php";
	}

	public static String getUrl_sendEmail(Activity content){
		return getSetting(content,Key_URL_HOST) + "/PDADoMail";
	}	

	public static String getUrl_DownLoad(Activity content){
		return getSetting(content,Key_URL_HOST) + "/ACdownloadfile.php";
	}

	public static String getUrl_UploadHyouka(Activity content){
		return getSetting(content,Key_URL_HOST)  + "/AChyoukaupload.php";
	}
	
	public static String getUrl_DownloadApk(Activity content){
		return getSetting(content,Key_URL_HOST)  + "/" + AppName;
	}
}
