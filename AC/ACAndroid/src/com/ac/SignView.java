package com.ac;

import java.io.FileOutputStream;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Path;
import android.view.MotionEvent;
import android.view.View;

public class SignView extends View {
	
//    private static final float MINP = 0.25f;
//    private static final float MAXP = 0.75f;
    
    private final Paint       mPaint;
//    private MaskFilter  mEmboss;
//    private MaskFilter  mBlur;
    
    private final Bitmap  mBitmap;
    private final Canvas  mCanvas;
    private final Path    mPath;
    private final Paint   mBitmapPaint;
    
    public SignView(Context c) {
        super(c);
                
	    mPaint = new Paint();
	    mPaint.setAntiAlias(true);
	    mPaint.setDither(true);
	    mPaint.setColor(Color.BLACK);
	    mPaint.setStyle(Paint.Style.STROKE);
	    mPaint.setStrokeJoin(Paint.Join.ROUND);
	    mPaint.setStrokeCap(Paint.Cap.ROUND);
	    mPaint.setStrokeWidth(5);
	    
//	    mEmboss = new EmbossMaskFilter(new float[] { 1, 1, 1 },
//	                                   0.4f, 6, 3.5f);
//
//	    mBlur = new BlurMaskFilter(8, BlurMaskFilter.Blur.NORMAL);
	    
        
        //mBitmap = Bitmap.createBitmap(600, 250, Bitmap.Config.ARGB_8888);
	    mBitmap = Bitmap.createBitmap(1800, 600, Bitmap.Config.ARGB_8888);
        mCanvas = new Canvas(mBitmap);
        mCanvas.drawColor(0xFFFFFFFF);
        mPath = new Path();
        mBitmapPaint = new Paint(Paint.DITHER_FLAG);
    }

    @Override
    protected void onSizeChanged(int w, int h, int oldw, int oldh) {
        super.onSizeChanged(w, h, oldw, oldh);
    }
    
    @Override
    protected void onDraw(Canvas canvas) {
    	//white
        canvas.drawColor(0xFFFFFFFF);
        
        canvas.drawBitmap(mBitmap, 0, 0, mBitmapPaint);
        
        canvas.drawPath(mPath, mPaint);
    }
    
    private float mX, mY;
    private static final float TOUCH_TOLERANCE = 4;
    
    private void touch_start(float x, float y) {
        mPath.reset();
        mPath.moveTo(x, y);
        mX = x;
        mY = y;
    }
    private void touch_move(float x, float y) {
        float dx = Math.abs(x - mX);
        float dy = Math.abs(y - mY);
        if (dx >= TOUCH_TOLERANCE || dy >= TOUCH_TOLERANCE) {
            mPath.quadTo(mX, mY, (x + mX)/2, (y + mY)/2);
            mX = x;
            mY = y;
        }
    }
    private void touch_up() {
        mPath.lineTo(mX, mY);
        // commit the path to our offscreen
        mCanvas.drawPath(mPath, mPaint);
        // kill this so we don't double draw
        mPath.reset();
    }
    
    @Override
    public boolean onTouchEvent(MotionEvent event) {
        float x = event.getX();
        float y = event.getY();
        
        switch (event.getAction()) {
            case MotionEvent.ACTION_DOWN:
                touch_start(x, y);
                invalidate();
                break;
            case MotionEvent.ACTION_MOVE:
                touch_move(x, y);
                invalidate();
                break;
            case MotionEvent.ACTION_UP:
                touch_up();
                invalidate();
                break;
        }
        return true;
    }
    
    /**
     * サインをクリア
     */
    public void clean(){
    	mPath.reset();
    	mCanvas.drawColor(0xFFFFFFFF);
    	invalidate();
    }
    
    /**
     * JPEGでSDCardに保存す�?
     */
    public void saveTojpeg(String fileName){
    	try 
    	{
    	    FileOutputStream out = new FileOutputStream(fileName);
    	    mBitmap.compress(Bitmap.CompressFormat.JPEG, 90, out);
    	    out.flush();
    	    out.close();
    	} catch (Exception e) {
    	       e.printStackTrace();
    	}
    }
}
