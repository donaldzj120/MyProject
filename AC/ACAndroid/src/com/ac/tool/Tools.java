package com.ac.tool;

import java.util.Calendar;

import org.json.JSONException;

public class Tools {
	/*����*/
	private static final int I_HEISEI= 1989;
	private static final int I_HEISEI_M= 1;
	private static final int I_HEISEI_D= 8;
	
	//JsonObject�̕�������Ƃ�
	public static String jsonObjToString(Object obj){
		String strRst = "";
		
		if(obj !=null && !"null".equals(obj.toString())){
			strRst = obj.toString();
		}
		
		return strRst;
	}
	
	public static String getwariYMD(String yyyy,String mm,String dd){
		String wariYMD = "";
		try{
			int intYY = Integer.parseInt(yyyy);
			int wariYY = intYY - I_HEISEI + 1;
			wariYMD = "����"+ String.valueOf(wariYY) + "�N" 
			          + mm + "��" 
					  + dd + "��";
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			wariYMD = "";
		}
		
		return wariYMD;
		
	}
	
	public static String getWeek(String sagyo_date,String sagyo_time){
		
		if("".equals(sagyo_date) || sagyo_date.length()<10){
			return "";
		}
		
		String yyyy = "";
		String mm = "";
		String dd = "";
		String Strdate = "";
		
		yyyy = sagyo_date.substring(0,4);
		mm = sagyo_date.substring(5,7);
		dd = sagyo_date.substring(8,10);
		
		Calendar calendar = Calendar.getInstance();
		calendar.set(Integer.parseInt(yyyy), Integer.parseInt(mm)-1, Integer.parseInt(dd));
		int week = calendar.get(Calendar.DAY_OF_WEEK);
		String youbi= "";
		switch(week){
		case 1:
			youbi = "(��)";
			break;
		case 2:
			youbi = "(��)";
			break;
		case 3:
			youbi = "(��)";
			break;
		case 4:
			youbi = "(��)";
			break;
		case 5:
			youbi = "(��)";
			break;
		case 6:
			youbi = "(��)";
			break;
		case 7:
			youbi = "(�y)";
			break;
		default:
			youbi = "";
		}
		
		if("0:00".equals(sagyo_time)){
			Strdate = mm +"��" + dd + "��" + youbi + " �K��";
		}else{
			Strdate = mm +"��" + dd + "��" + youbi + sagyo_time + " �K��";
		}
		
		return Strdate;
	}
}
