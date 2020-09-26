import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor(private router: Router) { }

  ngOnInit() {
    this.checkUser();
  }

  user = JSON.parse(localStorage.getItem('currUser'));
  isUser:boolean = false;
  loggedIn:boolean = true;
  checkUser(){
    if(this.user!=null){
    this.isUser = true;
    this.loggedIn = false;
    }
    else{
      this.isUser = false;
      this.loggedIn=true;
    }
  }

  logOut(){
    localStorage.clear();
    this.router.navigate(['home']);
  }

}
