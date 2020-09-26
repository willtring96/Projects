import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { attraction } from '../models/attraction';
import { HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AttractionService {

  constructor(private http:HttpClient) { }

  private headers = new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'});

  getAllAttractions():Observable<attraction>{
    return this.http.get<attraction>("http://localhost:8080/project2/attractions");
  }

  //Used to filter attractions
  getAttractionsByType(type:string):Observable<attraction>{
    return this.http.get<attraction>(`http://localhost:8080/project2/attractions/type/${type}`);
  }

  //When user selects a single attraction
  getAttractionsByID(id:number):Observable<attraction>{
    return this.http.get<attraction>(`http://localhost:8080/project2/attractions/id/${id}`);
  }

  //For searching
  getAttractionByName(name:string):Observable<attraction>{
    return this.http.get<attraction>(`http://localhost:8080/project2/attractions/name/${name}`);
  }
  
  //create attraction
  createAttraction(params:string):Observable<attraction>{
    const body =  params;
    return this.http.post<attraction>(`http://localhost:8080/project2/attractions/create`,body, {headers: this.headers}).pipe(map(resp => resp as attraction));
  }

  deleteAttraction(id:number):Observable<any>{
    return this.http.get(`http://localhost:8080/project2/attractions/delete/${id}`);
  }
}
