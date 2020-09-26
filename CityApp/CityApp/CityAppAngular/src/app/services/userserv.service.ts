import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { user } from 'src/app/models/user';
import { review } from 'src/app/models/review';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http:HttpClient, private router: Router) { }

  private headers = new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'});

  userLogin(user:string, pass:string):Observable<user>{
    let body =  `username=${user}&password=${pass}`;
    return this.http.post("http://localhost:8080/project2/login", body, {headers: this.headers}).pipe(map(resp => resp as user));
  }
  userLoadReviews(userid:number):Observable<review>{
    let body = `user_id=${userid}`;
    return this.http.get<review>(`http://localhost:8080/project2/user/reviews/${userid}`);
  }

  updateUser(user:user):Observable<user>{
    const body = user;
    return this.http.post<user>(`http://localhost:8080/project2/user/update`,user);
  }

  getUser(id:number):Observable<user>{
    return this.http.get<user>("http://localhost:8080/project2/user/"+id);
  }
  createUser(newuser:user):Observable<user>{
    return this.http.post<user>(`http://localhost:8080/project2/user/create`, newuser);
  }  
}