package com.example.yh.smallhome;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    private WebView objWebView;
    Button btnReload;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        objWebView = (WebView)findViewById(R.id.webView);
        objWebView.getSettings().setJavaScriptEnabled(true);

        load();
        btnReload = (Button) findViewById(R.id.btnReload);
        btnReload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                load();
            }
        });


    }

    void load(){
        objWebView.loadUrl("http://wh9721.iptime.org:2222/index.php");

    }
}
