package activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.ntd.shopping.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import util.CheckInternetConnection;
import util.Sever;

public class CustomerInfo extends AppCompatActivity {

    EditText edtCustomerName,edtEmail,edtPhoneNumber;
    Button btnConfirm,btnBack;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_info);
        Anhxa();
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        if(CheckInternetConnection.haveNetworkConnection(getApplicationContext())){
            EventButton();
        }else{
            CheckInternetConnection.ShowToast_Short(getApplicationContext(),"Ban Hay kiem tra lai ket noi");
        }
    }

    private void EventButton() {
        btnConfirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String Name = edtCustomerName.getText().toString().trim();
                final String Phone = edtPhoneNumber.getText().toString().trim();
                final String email = edtEmail.getText().toString().trim();
                if(Name.length()>0&& Phone.length()>0&&email.length()>0){
                    RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
                    StringRequest stringRequest = new StringRequest(Request.Method.POST, Sever.billlink, new Response.Listener<String>() {
                        @Override
                        public void onResponse(final String madonhang) {
                            Log.d("Ma don hang",madonhang);
                            if(Integer.parseInt(madonhang)>0){
                                RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
                                StringRequest request = new StringRequest(Request.Method.POST, Sever.orderdetaillink, new Response.Listener<String>() {
                                    @Override
                                    public void onResponse(String response) {
                                        if(response.equals("1")) {
                                            MainActivity.arrCart.clear();
                                            CheckInternetConnection.ShowToast_Short(getApplicationContext(),"Ban da them du lieu gio hang thanh cong");
                                            Intent intent = new Intent(getApplicationContext(),MainActivity.class);
                                            startActivity(intent);
                                            CheckInternetConnection.ShowToast_Short(getApplicationContext(),"Moi ban tiep tuc mua sam");
                                        }else{
                                            CheckInternetConnection.ShowToast_Short(getApplicationContext(),"Du lieu gio hang da bi loi");
                                        }
                                    }
                                }, new Response.ErrorListener() {
                                    @Override
                                    public void onErrorResponse(VolleyError error) {

                                    }
                                }){
                                    @Override
                                    protected Map<String, String> getParams() throws AuthFailureError {
                                        JSONArray jsonArray = new JSONArray();
                                        for(int i=0;i<MainActivity.arrCart.size();i++)
                                        {
                                            JSONObject jsonObject = new JSONObject();
                                            try {
                                                jsonObject.put("OrderCode",madonhang);
                                                jsonObject.put("ProductID",MainActivity.arrCart.get(i).getProductId());
                                                jsonObject.put("ProductName",MainActivity.arrCart.get(i).getProductName());
                                                jsonObject.put("Price",MainActivity.arrCart.get(i).getPrice());
                                                jsonObject.put("Number",MainActivity.arrCart.get(i).getProductNumber());

                                            } catch (JSONException e) {
                                                e.printStackTrace();
                                            }
                                            jsonArray.put(jsonObject);
                                        }
                                        HashMap<String,String> hashMap = new HashMap<String, String>();
                                        hashMap.put("json",jsonArray.toString());
                                        return hashMap;
                                    }
                                };
                                queue.add(request);
                            }
                        }
                    }, new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {

                        }
                    }){
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            HashMap<String,String> hashMap= new HashMap<String,String>();
                            hashMap.put("customername",Name);
                            hashMap.put("phonenumber",Phone);
                            hashMap.put("email",email);
                            return hashMap;
                        }
                    };
                    requestQueue.add(stringRequest);
                }else{
                    CheckInternetConnection.ShowToast_Short(getApplicationContext(),"Kiem Tra Lai Du Lieu");
                }
            }
        });
    }

    private void Anhxa() {
        edtCustomerName = findViewById(R.id.edittextcustomername);
        edtEmail  =findViewById(R.id.edittextemail);
        edtPhoneNumber = findViewById(R.id.edittextphonenumber);
        btnConfirm = findViewById(R.id.buttonvertify);
        btnBack = findViewById(R.id.buttonback);
    }
}
