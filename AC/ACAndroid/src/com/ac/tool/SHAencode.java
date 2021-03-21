package com.ac.tool;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

public class SHAencode {
	public byte[] getHash(String password) {
	       MessageDigest digest=null;
	    try {
	        digest = MessageDigest.getInstance("SHA-256");
	    } catch (NoSuchAlgorithmException e1) {
	        // TODO Auto-generated catch block
	        e1.printStackTrace();
	    }
	       digest.reset();
	       return digest.digest(password.getBytes());
	 }
	
	public String encrype(String str) {
        try {
            // Create MD5 Hash
            MessageDigest digest = java.security.MessageDigest.getInstance("SHA-256");
            digest.update(str.getBytes());
            byte messageDigest[] = digest.digest();
                        
            // Create HEX String 
            StringBuffer hexString = new StringBuffer();
            for (int i = 0; i < messageDigest.length; i++) {
            	String h = Integer.toHexString(0xFF & messageDigest[i]);
                while (h.length() < 2)
                    h = "0" + h;
                hexString.append(h);
//                hexString.append(Integer.toHexString(0xFF & messageDigest[i]));
            }
                        
            return hexString.toString();
        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }
                
        return "";
    }
}
