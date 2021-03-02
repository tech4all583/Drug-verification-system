package com.app.drugverification;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Developers extends AppCompatActivity {

    public List<Lists> mData = new ArrayList<>();
    public RecyclerView recyclerView;
    public RecyclerViewAdapters recyclerViewAdapters;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_developers);
        this.setTitle("About Developers");

        recyclerView = (RecyclerView) findViewById(R.id.my_recycler_view);
        recyclerViewAdapters = new RecyclerViewAdapters(mData);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(getApplicationContext());
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setAdapter(recyclerViewAdapters);

        String JSON_FILE = "{'error' : '1', " +
                "'0' : {'matric' : 'cs20180201106', 'name' : 'Adeyemo Adedokun B.', 'level' : 'ND 2 FT'}, " +
                "'1' : {'matric' : 'cs20180204864', name : 'Abdulrahmon Sodia O.', 'level' : 'ND 2 FT'}, " +
                "'2' : {'matric' : 'cs20180205cdd', name : 'Ayansipe Epaphras O.', 'level' : 'ND 2 FT'}}";

        String matric,name,level;

        try {


            JSONObject object = new JSONObject(JSON_FILE);

            for (int ii =0; ii < object.length(); ii++){
                matric = object.getJSONObject(Integer.toString(ii)).getString("matric").toUpperCase();
                name = object.getJSONObject(Integer.toString(ii)).getString("name");
                level = object.getJSONObject(Integer.toString(ii)).getString("level");

                mData.add(new Lists(matric,name +" \n \n"+level,"",Core.IMG_URL+matric+".jpg","0","false"));
            }

        }catch (JSONException e){
            e.printStackTrace();
        }
    }
}