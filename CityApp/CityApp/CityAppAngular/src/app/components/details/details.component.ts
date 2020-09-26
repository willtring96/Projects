import { Component, OnInit } from '@angular/core';
import { review } from 'src/app/models/review';
import { HttpParams, HttpClient } from '@angular/common/http';
import { ReviewService } from 'src/app/services/review.service';
import { UserService } from 'src/app/services/userserv.service';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { user } from 'src/app/models/user';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {

  constructor(private reviewService:ReviewService, private userService:UserService, private http: HttpClient, private router:Router) { }
  attraction = JSON.parse(localStorage.getItem('Attraction'));
  currUser = JSON.parse(localStorage.getItem('currUser'));
  ngOnInit() {
    this.showReviews();
  }

  reviews:Array<review> = [];
  Rev:Observable<review>;
  user:Observable<user>;
  Usernames:Map<number, string> = new Map();
  count:number=0;
  total:number=0;

  showReviews(){
    this.Rev = this.reviewService.getReviewByAttraction(this.attraction.attraction_id);
    this.Rev.subscribe((response)=>{console.log(response); this.displayAll(response);});
  }
  displayAll(response){
    this.reviews = [];
    let sum:number=0;
    this.count = 0;
    for(let element of response){
      let temp = new review(element.review_id, element.attraction_id, element.user_id, element.score, element.comments);
      this.reviews.push(temp);
      sum += element.score;
      this.count += 1;
    }
    this.total = sum/this.count;
    this.matchUsernames();
  }

  getUser(id:number){
    this.user = this.userService.getUser(id);
    this.user.subscribe((response)=>{this.Usernames.set(id, response.username);})
  }
  matchUsernames(){
    for(let element of this.reviews){
      this.getUser(element.user_id);
    }
  }

  submit(score:number, comments:string){
    this.Rev = this.reviewService.createReview(this.attraction.attraction_id, this.currUser.user_id, score, comments);
    this.Rev.subscribe((response)=>{console.log(response)});
    this.showReviews();
  }
}
