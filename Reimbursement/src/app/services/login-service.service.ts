import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'; //this will allow us to generate http calls
import { Observable } from 'rxjs';
import { Employee } from '../models/Employee';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private http:HttpClient) { }
  
  getEmp(uname:string, pass:string):Observable<Employee>{
    return this.http.get<Employee>("http://localhost:8080/ExpenseReimbursement/login.do?username="+uname+"&password="+pass); //?username=will&password=pass
  }

  findEmp(eid:number):Observable<Employee>{
    return this.http.get<Employee>("http://localhost:8080/ExpenseReimbursement/getEmp.do?eid="+eid);
  }
}