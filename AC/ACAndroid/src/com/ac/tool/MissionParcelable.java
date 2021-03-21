package com.ac.tool;

import java.util.List;
import java.util.Map;

import android.os.Parcel;
import android.os.Parcelable;

public class MissionParcelable implements Parcelable {

	private List missionList;
	
	 public MissionParcelable(List save) { 
		 missionList = save;
	 }
	 
	@Override
	public int describeContents() {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public void writeToParcel(Parcel dest, int flags) {
		// TODO Auto-generated method stub
		dest.writeList(missionList);

	}
	
	public List<Map<String, Object>> getSavedMission(){
		return missionList;
	}

}
