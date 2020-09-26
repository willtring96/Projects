import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { review } from 'src/app/models/review';


@Injectable({
  providedIn: 'root'
})
export class ReviewService {
  
  constructor(private http:HttpClient) { }
  private headers = new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'});

  //return list of reviews by a given attraction
  getReviewByAttraction(id:number):Observable<review>{
    return this.http.get<review>(`http://localhost:8080/project2/reviews/attraction/${id}`);
  }

  //delete a given review by id
  deleteReview(id:number):Observable<any>{
    return this.http.get(`http://localhost:8080/project2/review/delete/${id}`);
  }

  //update review
  updateReview(params:string):Observable<review>{
    const body =  params;
    return this.http.post<review>(`http://localhost:8080/project2/review/update`,body, {headers: this.headers}).pipe(map(resp => resp as review));
  }

  createReview(attraction_id:number, user_id:number, score:number, comments:string):Observable<review>{
    let body = `attraction_id=${attraction_id}&user_id=${user_id}&score=${score}&comments=${comments}`;
    return this.http.post('http://localhost:8080/project2/reviews/create', body, {headers: this.headers}).pipe(map(resp => resp as review));
  }
}
