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
    this.checkManager();
  }

  user = JSON.parse(localStorage.getItem('currUser'));
  isManager:boolean = false;
  checkManager(){
    if(this.user.position=="Manager")
      this.isManager = true;
    else
      this.isManager = false;
  }

  logOut(){
    localStorage.clear();
    this.router.navigate(['login']);
  }
}
