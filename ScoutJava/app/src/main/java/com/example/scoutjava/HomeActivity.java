package com.example.scoutjava;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;

public class HomeActivity extends AppCompatActivity {
    TextView fullName, emailAddress, phoneNumber;
    FirebaseAuth fAuth;
    FirebaseFirestore fStore;
    String userID;
    String firstName;
    String lastName;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        fullName = findViewById(R.id.name);
        emailAddress = findViewById(R.id.email);
        phoneNumber = findViewById(R.id.phone);

        fAuth = FirebaseAuth.getInstance();
        fStore = FirebaseFirestore.getInstance();
        userID = fAuth.getCurrentUser().getUid();

        DocumentReference documentReference = fStore.collection("users").document(userID);
        documentReference.addSnapshotListener(this, new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot documentSnapshot, @Nullable FirebaseFirestoreException e) {
                firstName = documentSnapshot.getString("First Name");
                lastName = documentSnapshot.getString("Last Name");
                fullName.setText(firstName + " " + lastName);
                phoneNumber.setText(documentSnapshot.getString("Phone"));
                emailAddress.setText(documentSnapshot.getString("Email"));
            }
        });


    }

    public void signout(View view) {
        FirebaseAuth.getInstance().signOut();
        startActivity(new Intent(getApplicationContext(), LoginActivity.class));
        finish();
    }

    public void gotoMaps(View view) {
        startActivity(new Intent(getApplicationContext(), MapsActivity.class));
    }
}