import { Component, OnInit } from '@angular/core';
import { LoginService } from 'src/app/services/login-service.service';
import { Employee } from 'src/app/models/Employee';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';




@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private loginservice:LoginService, private router: Router) { }

  ngOnInit() {
    let user = JSON.parse(localStorage.getItem('currUser'));
    if(user.eid != null){
      this.router.navigate(['menu']);
    }
  }
  
  message:string = "";

  
  login(uname:string, password:string){
    let user:string = uname.toLowerCase();
    let Emp:Observable<Employee> = this.loginservice.getEmp(user, password);
    Emp.subscribe((response)=>{this.authenticate(response)}, (response)=>{console.log(response); this.message = "Invalid username or password.";});
    }

  authenticate(response){
    if(response === null)
      this.message = "Invalid username or password.";
    else{
      // let e = new Employee(response.eid, response.fname, response.lname, response.username, response.password, response.position);
      // console.log(response);

      localStorage.setItem('currUser', JSON.stringify(response));
      // let user = JSON.parse(localStorage.getItem('currUser'));
      
      this.router.navigate(['menu']);
    }
  }

}