import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { UserService } from 'src/app/services/userserv.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private router: Router, private userservice:UserService) { }

  ngOnInit() {
    let user = JSON.parse(localStorage.getItem('currUser'));
    if(user != null)
      this.router.navigate(['all']);
  }
  message:string = "";

  
  login(user:string, pass:string){
    let username:string = user.toLowerCase();
    let currUser:Observable<any> = this.userservice.userLogin(username, pass);
    currUser.subscribe((response)=>{this.authenticate(response);}, (response)=>{console.log(response); this.message = "Invalid username or password.";});
    }

  authenticate(response){
    if(response === null)
      this.message = "Invalid username or password.";
    else{
      localStorage.setItem('currUser', JSON.stringify(response));
      // let user = JSON.parse(localStorage.getItem('currUser'));
      this.router.navigate(['all']);
    }
  }

}
