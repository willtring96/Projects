import { Component, OnInit } from '@angular/core';
import { HttpParams, HttpClient } from '@angular/common/http';
import { UserService } from 'src/app/services/userserv.service';
import { Router } from '@angular/router';
import { review } from 'src/app/models/review';
import { Observable } from 'rxjs';
import { user } from 'src/app/models/user';

@Component({
  selector: 'app-user-profile',
  templateUrl: './user-profile.component.html',
  styleUrls: ['./user-profile.component.css']
})
export class UserProfileComponent implements OnInit {

  reviews:Array<review> = [];

  showing: boolean = false;

  show() {
    if (this.showing) {
     this.showing = false;
    } else {
      this.showing = true;
    }
  }

  constructor(private userv: UserService, private http: HttpClient, private router:Router) { 
  }
  user = JSON.parse(localStorage.getItem('currUser'));
  //These are variables for changing the user's password.
userUpdate:Observable<user>;

  ngOnInit() {
    if(this.user === null)
      this.router.navigate(['login']);
    this.userGetReviews();
  }

  changePassword(old:string, newp:string, confirm:string) {
    console.log(this.user.password);
    console.log(old)
      if(this.user.password == old) {
        if (newp == confirm) {
          console.log("beep boop bo working");
          this.user.password = newp;
          console.log("beep boop bo working");
          this.userUpdate = this.userv.updateUser(this.user)
          console.log("beep boop bo working");
          this.userUpdate.subscribe((response)=>{localStorage.setItem('currUser', JSON.stringify(response)); this.showing=false;}, (response)=>{console.log("Failed.")})
      }
    }
  }
  userGetReviews(){

    this.userv.userLoadReviews(this.user.user_id).subscribe(
      (response) => {
        //this.reviews = JSON.parse(response);
        //review_id:number,attraction_id:number,user_id:number,score:number,comments:string
        this.loadReviews(response);

      },
      (response) => {
        console.log("no data in the response");
      }
    );
  }
  loadReviews(response){
    for(let element of response){
      let temp = new review(element.review_id, element.attraction_id, element.user_id, element.score, element.comment);
      console.log(temp);
      this.reviews.push(temp);
    }
  }

}
