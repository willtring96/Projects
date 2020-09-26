import { Component, OnInit } from '@angular/core';
import { UserService } from 'src/app/services/userserv.service';
import { user } from 'src/app/models/user';
import { Observable } from 'rxjs';
import { review } from 'src/app/models/review';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  reviews:Array<number>=[];
  createduser:user;

  constructor(private ouruserService:UserService, private router: Router) { }
  user = JSON.parse(localStorage.getItem('currUser'));
  ngOnInit() {
    if(this.user != null)
      this.router.navigate(['all']);
  }

  createUser(fname:string,lname:string,username:string,password:string){
    this.createduser = new user(0,username,password,fname,lname,this.reviews);
    let creatinguser:Observable<user> = this.ouruserService.createUser(this.createduser);
    creatinguser.subscribe((response)=>{console.log("User created"); this.router.navigate(['login']);},(response)=>{console.log("Failed")})
  }


}
