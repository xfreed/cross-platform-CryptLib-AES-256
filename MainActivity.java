package com.michaelkunynets.simpleandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        String key = "MyKey", iv="Your IV", input = "Text to encrypt",result="";
        try
        {
            CryptLib crypto = new CryptLib();
            key = CryptLib.SHA256(key, 32);
            iv = CryptLib.generateRandomIV(16);
            /*
                  After first Crypt your IV will be added to end of your Text.
                 In second time you need call GetIv function
             */
            result = crypto.encrypt(input, key, iv);
            Toast.makeText(this,"Crypt: "+result+"\nDecrypt: "+crypto.decrypt(result, key, iv),Toast.LENGTH_LONG).show();
        }
        catch (Exception e){
            e.printStackTrace();

        }

    }
}
