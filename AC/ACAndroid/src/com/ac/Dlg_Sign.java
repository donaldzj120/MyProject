package com.ac;


import java.io.File;

import android.R.color;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.Environment;
import android.view.View;
import android.widget.LinearLayout;
import com.ac.tool.*;

public class Dlg_Sign extends Activity {
	
	private String SignPicPathName;
	
	private SignView sv;
	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
		Intent intent = getIntent();
		SignPicPathName = intent.getStringExtra("SignPicPathName");
    	
	    super.onCreate(savedInstanceState);
	
	    this.setContentView(R.layout.sign);
	    // TODO Auto-generated method stub
	    
	    LinearLayout ll_sign = (LinearLayout)findViewById(R.id.ll_sign);
	    ll_sign.setBackgroundColor(color.background_light);
	    sv = new SignView(Dlg_Sign.this);
	    ll_sign.addView(sv);
	    
	    
	}

	public void btn_save_Handler(View v) {
		
		sv.saveTojpeg(SignPicPathName);
//		RemoteUtility rul = new RemoteUtility(Dlg_Sign.this);
		//rul.doFileUpload(fileName,Information.getUrl_Upload());
		
//		String itemName = "";
//		switch(signType){
//			case 1:
//				itemName = "SETUMEISHA_SAIN_PATH";
//				break;
//			case 2:
//				itemName = "HONIN_SAIN_PATH";
//				break;
//			case 3:
//				itemName = "KAZOKU_SAIN_PATH";
//				break;
//		}
//		String sql = "";
//		sql +="Update dtb_rhbr_jisshi_keikaku2 ";
//		sql +="   set " + itemName + " = '" +  Information.getSignPicNameWithoutPath(plan2ID, signType) + "' ";
//		sql +=" where ID = '" + plan2ID + "'";
//		
//		rul.doupdate(sql);
		
		this.finish();
	}
	
	public void btn_clear_Handler(View v) {
		sv.clean();
	}
	
	public void btn_cancle_Handler(View v) {
		this.finish();
	}
}
