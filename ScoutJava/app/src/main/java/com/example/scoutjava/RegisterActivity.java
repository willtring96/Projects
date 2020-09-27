package com.example.scoutjava;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    public static final String TAG = "TAG";
    EditText mfirstName, mlastName, mEmail, mPassword, mPasswordConf, mPhone;
    Button mBtn_sign_up;
    String userID;
    private FirebaseAuth fAuth;
    private FirebaseFirestore fStore;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        mfirstName = findViewById(R.id.firstName);
        mlastName = findViewById(R.id.lastName);
        mEmail = findViewById(R.id.username);
        mPassword = findViewById(R.id.password);
        mPasswordConf = findViewById(R.id.passwordconfirm);
        mPhone = findViewById(R.id.phone);
        mBtn_sign_up = findViewById(R.id.btn_sign_up);
        fAuth = FirebaseAuth.getInstance();
        fStore = FirebaseFirestore.getInstance();

        mBtn_sign_up.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String email = mEmail.getText().toString().trim();
                final String password = mPassword.getText().toString();
                String passwordConf = mPasswordConf.getText().toString();
                final String fname = mfirstName.getText().toString().trim();
                final String lname = mlastName.getText().toString().trim();
                final String phone = mPhone.getText().toString();

                if(TextUtils.isEmpty(email)) {
                    mEmail.setError("Email is required.");
                    return; }
                if(TextUtils.isEmpty(password)) {
                    mPassword.setError("Password is required.");
                    return; }
                if(TextUtils.isEmpty(fname)) {
                    mfirstName.setError("First name is required.");
                    return; }
                if(TextUtils.isEmpty(lname)) {
                    mlastName.setError("Last name is required.");
                    return; }
                if(password.length() < 6) {
                    mPassword.setError("Password must be >= 6 characters.");
                    return; }
                if(!(password.equals(passwordConf))){
                    mPassword.setError("Password does not match");
                    return; }
                if(phone.length() != 10){
                    mPhone.setError("Please enter a 10 digit phone number");
                    return; }

                fAuth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if(task.isSuccessful()){
                            Toast.makeText(RegisterActivity.this, "User created.", Toast.LENGTH_SHORT).show();
                            userID = fAuth.getCurrentUser().getUid();
                            DocumentReference documentReference = fStore.collection("users").document(userID);
                            Map<String, Object> user = new HashMap<>();
                            user.put("First Name", fname);
                            user.put("Last Name", lname);
                            user.put("Email", email);
                            user.put("Phone", phone);

                            documentReference.set(user).addOnSuccessListener(new OnSuccessListener<Void>() {
                                @Override
                                public void onSuccess(Void aVoid) {
                                    Log.d(TAG, "onSuccess: user profile is created for " + userID);
                                }
                            }).addOnFailureListener(new OnFailureListener() {
                                @Override
                                public void onFailure(@NonNull Exception e) {
                                    Log.d(TAG, "onFailure: " + e.toString());
                                }
                            });
                            //User is now logged in so instead of going back to Login it goes to Home
                            startActivity(new Intent(getApplicationContext(), LoginActivity.class));
                            finish(); }
                        else{
                            Toast.makeText(RegisterActivity.this, task.getException().getMessage(), Toast.LENGTH_SHORT).show(); }
                    }
                });
            }
        });
    }
}