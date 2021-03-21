package com.ac.tool;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpConnectionParams;
import org.apache.http.params.HttpParams;
import org.apache.http.util.ByteArrayBuffer;
import org.json.JSONArray;
import org.json.JSONException;

import android.app.Activity;
import android.util.Log;

public class RemoteUtility {
	

	private Activity content;
	public RemoteUtility(Activity active) {
		super();
		// TODO Auto-generated constructor stub
		content = active;
	}

	/**
	 * Check User and Password
	 * @param userid
	 * @param pwd
	 * @return Success or Not
	 */
	public boolean checkUser(String userid,String pwd){
		
		boolean check = false;
		
		String result = "";
		InputStream is = null;
		//the year data to send
		ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		nameValuePairs.add(new BasicNameValuePair("DB_User",SystemSettings.getSetting(content, SystemSettings.Key_DB_USER)));
		nameValuePairs.add(new BasicNameValuePair("DB_Password",SystemSettings.getSetting(content, SystemSettings.Key_DB_PSW)));
		nameValuePairs.add(new BasicNameValuePair("DB_Name",SystemSettings.getSetting(content, SystemSettings.Key_DB_NAME)));
		nameValuePairs.add(new BasicNameValuePair("user",userid));
		nameValuePairs.add(new BasicNameValuePair("password",pwd));
		
		//http post
		try{
			HttpParams httpParameters = new BasicHttpParams();
			// Set the timeout in milliseconds until a connection is established.
			// The default value is zero, that means the timeout is not used. 
			int timeoutConnection = 3000;
			HttpConnectionParams.setConnectionTimeout(httpParameters, timeoutConnection);
			// Set the default socket timeout (SO_TIMEOUT) 
			// in milliseconds which is the timeout for waiting for data.
			int timeoutSocket = 5000;
			HttpConnectionParams.setSoTimeout(httpParameters, timeoutSocket);
			
			HttpClient httpclient = new DefaultHttpClient(httpParameters);
			HttpPost httppost = new HttpPost(SystemSettings.getUrl_Check(content));
			httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
			HttpResponse response = httpclient.execute(httppost);
			HttpEntity entity = response.getEntity();
			is = entity.getContent();
		}catch(Exception e){
		        Log.e("log_tag", "Error in http connection "+e.toString());
		}
		
		
		//convert response to string
		try{
	        BufferedReader reader = new BufferedReader(new InputStreamReader(is,"UTF-8"),8);
	        StringBuilder sb = new StringBuilder();
	        String line = null;
	        while ((line = reader.readLine()) != null) {
            sb.append(line);
        }
	        is.close();
		 
	        result=sb.toString();
	        
//	        if(result.equals("OK")){
	        if(result.startsWith("OK")){
	        	check = true;
	        }
		}catch(Exception e){
	        Log.e("log_tag", "Error converting result "+e.toString());
		}
		
//		//parse json data
//		try{
//	        JSONArray jArray = new JSONArray(result);
//	        for(int i=0;i<jArray.length();i++){
//                JSONObject json_data = jArray.getJSONObject(i);
//                Log.i("log_tag","id: "+json_data.getInt("id")+
//                      ", name: "+json_data.getString("name")+
//                      ", sex: "+json_data.getInt("sex")+
//	                  ", birthyear: "+json_data.getInt("birthyear")
//		              );
//		     }
//		}
//		}catch(JSONException e){
//		        Log.e("log_tag", "Error parsing data "+e.toString());
//		}
		
		return check;
		
	}
	
	/**
	 * Select Data from Server MySql
	 * @param sql
	 * @return JSON data
	 */
	public JSONArray doquery(String sql){
		String result = "";
		JSONArray jArray = null;
		
		InputStream is = null;
		//the year data to send
		ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		nameValuePairs.add(new BasicNameValuePair("DB_User",SystemSettings.getSetting(content, SystemSettings.Key_DB_USER)));
		nameValuePairs.add(new BasicNameValuePair("DB_Password",SystemSettings.getSetting(content, SystemSettings.Key_DB_USER)));
		nameValuePairs.add(new BasicNameValuePair("DB_Name",SystemSettings.getSetting(content, SystemSettings.Key_DB_NAME)));
		nameValuePairs.add(new BasicNameValuePair("DB_Query",sql));
		
		//http post
		try{
			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(SystemSettings.getUrl_Select(content));
			//httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
			//httppost.setHeader("Content-Type", "application/json; charset=UTF-8");
			httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs, "UTF-8"));
			HttpResponse response = httpclient.execute(httppost);
			HttpEntity entity = response.getEntity();
			is = entity.getContent();
			
			SystemSettings.NetWorkSattus = 0;
		}catch(Exception e){
		        Log.e("log_tag", "Error in http connection "+e.toString());
		        SystemSettings.NetWorkSattus = 0;
		}
		
		
		//convert response to string
		try{
	        BufferedReader reader = new BufferedReader(new InputStreamReader(is,"ISO-8859-1"),8);
	        StringBuilder sb = new StringBuilder();
	        String line = null;
	        while ((line = reader.readLine()) != null) {
            sb.append(line);
        }
	        is.close();
		 
	        result=sb.toString();
	        
		}catch(Exception e){
	        Log.e("log_tag", "Error converting result "+e.toString());
		}
		
		//parse json data
		try{
	        jArray = new JSONArray(result);
		}catch(JSONException e){
			Log.e("log_tag", "Error parsing data "+e.toString());
		}
		
		return jArray;
	}

	public void doupdate(String sql){
		String result = "";
		
		InputStream is = null;
		//the year data to send
		ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		nameValuePairs.add(new BasicNameValuePair("DB_User",SystemSettings.getSetting(content, SystemSettings.Key_DB_USER)));
		nameValuePairs.add(new BasicNameValuePair("DB_Password",SystemSettings.getSetting(content, SystemSettings.Key_DB_USER)));
		nameValuePairs.add(new BasicNameValuePair("DB_Name",SystemSettings.getSetting(content, SystemSettings.Key_DB_NAME)));
		nameValuePairs.add(new BasicNameValuePair("DB_Query",sql));
		
		//http post
		try{
			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(SystemSettings.getUrl_Update(content));
			//httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
			httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs, "UTF-8"));
			HttpResponse response = httpclient.execute(httppost);
			HttpEntity entity = response.getEntity();
			is = entity.getContent();
		}catch(Exception e){
		        Log.e("log_tag", "Error in http connection "+e.toString());
		        SystemSettings.NetWorkSattus = 0;
		}
		
		
		//convert response to string
		try{
	        BufferedReader reader = new BufferedReader(new InputStreamReader(is,"ISO-8859-1"),8);
	        StringBuilder sb = new StringBuilder();
	        String line = null;
	        while ((line = reader.readLine()) != null) {
            sb.append(line);
        }
	        is.close();
		 
	        result=sb.toString();
	        Log.i("DBOperRslt", result);
		}catch(Exception e){
	        Log.e("log_tag", "Error converting result "+e.toString());
		}
		
	}

	public void sendMail(String from,String to,String missionid,String missionid2){
		String result = "";
		
		InputStream is = null;
		//the year data to send
		ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		nameValuePairs.add(new BasicNameValuePair("from",from));
		nameValuePairs.add(new BasicNameValuePair("to",to));
		nameValuePairs.add(new BasicNameValuePair("sagyo_id1",missionid));
		nameValuePairs.add(new BasicNameValuePair("sagyo_id2",missionid2));
		
		//http post
		try{
			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(SystemSettings.getUrl_sendEmail(content));
			httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
			HttpResponse response = httpclient.execute(httppost);
			HttpEntity entity = response.getEntity();
			is = entity.getContent();
		}catch(Exception e){
		        Log.e("log_tag", "Error in http connection "+e.toString());
		        SystemSettings.NetWorkSattus = 0;
		}
		
		
		//convert response to string
		try{
	        BufferedReader reader = new BufferedReader(new InputStreamReader(is,"ISO-8859-1"),8);
	        StringBuilder sb = new StringBuilder();
	        String line = null;
	        while ((line = reader.readLine()) != null) {
            sb.append(line);
        }
	        is.close();
		 
	        result=sb.toString();
	        Log.i("DBOperRslt", result);
		}catch(Exception e){
	        Log.e("log_tag", "Error converting result "+e.toString());
		}
		
	}

	
	/**
	 * Upload File to Server
	 */
	public boolean doFileUpload(String filename,String strUrl){
        HttpURLConnection conn = null;
        DataOutputStream dos = null;
        DataInputStream inStream = null;
        String existingFileName = filename;
        
        File audioFile = new File(existingFileName);
		if(!audioFile.exists()){
			return false;
		}
        
        String lineEnd = "\r\n";
        String twoHyphens = "--";
        String boundary =  "*****";
        int bytesRead, bytesAvailable, bufferSize;
        byte[] buffer;
        int maxBufferSize = 1*1024*1024;
        //String responseFromServer = "";
        //String urlString = "http://mywebsite.com/directory/upload.php";
        try
        {
         //------------------ CLIENT REQUEST
        FileInputStream fileInputStream = new FileInputStream(new File(existingFileName) );
         // open a URL connection to the Servlet
         URL url = new URL(strUrl);
         // Open a HTTP connection to the URL
         conn = (HttpURLConnection) url.openConnection();
         // Allow Inputs
         conn.setDoInput(true);
         // Allow Outputs
         conn.setDoOutput(true);
         // Don't use a cached copy.
         conn.setUseCaches(false);
         // Use a post method.
         conn.setRequestMethod("POST");
         conn.setRequestProperty("Connection", "Keep-Alive");
         conn.setRequestProperty("Content-Type", "multipart/form-data;boundary="+boundary);
         dos = new DataOutputStream( conn.getOutputStream() );
         dos.writeBytes(twoHyphens + boundary + lineEnd);
         dos.writeBytes("Content-Disposition: form-data; name=\"uploadedfile\";filename=\"" + existingFileName + "\"" + lineEnd);
         dos.writeBytes(lineEnd);
         // create a buffer of maximum size
         bytesAvailable = fileInputStream.available();
         bufferSize = Math.min(bytesAvailable, maxBufferSize);
         buffer = new byte[bufferSize];
         // read file and write it into form...
         bytesRead = fileInputStream.read(buffer, 0, bufferSize);
         while (bytesRead > 0)
         {
          dos.write(buffer, 0, bufferSize);
          bytesAvailable = fileInputStream.available();
          bufferSize = Math.min(bytesAvailable, maxBufferSize);
          bytesRead = fileInputStream.read(buffer, 0, bufferSize);
         }
         // send multipart form data necesssary after file data...
         dos.writeBytes(lineEnd);
         dos.writeBytes(twoHyphens + boundary + twoHyphens + lineEnd);
         // close streams
         Log.e("Debug","File is written");
         fileInputStream.close();
         dos.flush();
         dos.close();
        }
        catch (MalformedURLException ex)
        {
             Log.e("Debug", "error: " + ex.getMessage(), ex);
             return false;
        }
        catch (IOException ioe)
        {
             Log.e("Debug", "error: " + ioe.getMessage(), ioe);
             return false;
        }
        //------------------ read the SERVER RESPONSE
        try {
              inStream = new DataInputStream ( conn.getInputStream() );
              String str;

              while (( str = inStream.readLine()) != null)
              {
                   Log.e("Debug","Server Response "+str);
                   if("NG".equals(str)){
                	   return false;
                   }
              }
              inStream.close();

        }
        catch (IOException ioex){
             Log.e("Debug", "error: " + ioex.getMessage(), ioex);
             return false;
        }
        
        return true;
      }
	
	public void dodownload(String filePathName , String filename){
		
		InputStream is = null;
		//the year data to send
//		ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
//		nameValuePairs.add(new BasicNameValuePair("FILENAME",filename));
		
		//http post
		try{
	              
			HttpURLConnection urlConn = null;  
			URL url = new URL(SystemSettings.getUrl_DownLoad(content)+"?FILENAME="+filename );  
            urlConn = (HttpURLConnection)url.openConnection();  
            is = urlConn.getInputStream(); 
            
			File file = new File(filePathName);
			
			BufferedInputStream bis = new BufferedInputStream(is);
			 
             /*
              * Read bytes to the Buffer until there is nothing more to read(-1).
              */
             ByteArrayBuffer baf = new ByteArrayBuffer(50);
             int current = 0;
             while ((current = bis.read()) != -1) {
                     baf.append((byte) current);
             }

             /* Convert the Bytes read to a String. */
             FileOutputStream fos = new FileOutputStream(file);
             fos.write(baf.toByteArray());
             fos.close();
		}catch(Exception e){
		        Log.e("log_tag", "Error in http connection "+e.toString());
		}
	}
}
