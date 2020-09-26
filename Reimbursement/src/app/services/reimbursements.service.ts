import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'; //this will allow us to generate http calls
import { Observable } from 'rxjs';
import { Reimbursement } from '../models/Reimbursement';

@Injectable({
  providedIn: 'root'
})
export class ReimbursementsService {

  constructor(private http:HttpClient) { }

  getReimb(eid:number):Observable<Reimbursement>{
    return this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/getReimb.do?eid="+eid);
  }

  findReimb(rid:number):Observable<Reimbursement>{
    return this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/findReimb.do?rid="+rid);
  }

  updateReimb(params:string):Observable<Reimbursement>{
    // console.log("updateParams: "+params);
    return this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/updateReimb.do?" + params);
  }

  createReimb(params:string):Observable<Reimbursement>{
    // console.log("createParams: "+params);
    // console.log(this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/createReimb.do?" + params));
    return this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/createReimb.do?" + params);
  }

  viewReimb():Observable<Reimbursement>{
    return this.http.get<Reimbursement>("http://localhost:8080/ExpenseReimbursement/viewReimb.do?");
  }
}