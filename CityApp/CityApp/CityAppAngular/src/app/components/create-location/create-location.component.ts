import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';
import { AttractionService } from 'src/app/services/attraction.service';
import { attraction } from 'src/app/models/attraction';

@Component({
  selector: 'app-create-location',
  templateUrl: './create-location.component.html',
  styleUrls: ['./create-location.component.css']
})
export class CreateLocationComponent implements OnInit {

  constructor(private router: Router, private attService:AttractionService) { }
  

  ngOnInit() {
    // if(this.user == undefined){
    //   this.router.navigate(['login']);
    // }
  }

  user = JSON.parse(localStorage.getItem('currUser'));

  createRequest(lname: string, laddress: string, location_type: string, description: string) {
    if((lname !="") && (laddress != "") &&(location_type != "none")) {
    let str:string = '';
    str += 'attraction_description=' + description + '&';
    str += 'attraction_location=' + laddress + '&';
    str += 'attraction_name=' + lname + '&';
    str += 'attraction_type=' + location_type;
    // // str += "date_time="+date+"&";
    // str += 'requestor=' + this.user.eid + '&';
    // str += 'manager=0&';
    // str += 'man_comm= &';
    // str += 'docs=';
    console.log(str);
    this.createLocation(str);
    }
  }

  createLocation(params:string){
    let addLocal:Observable<attraction> = this.attService.createAttraction(params);
    addLocal.subscribe((response)=>{console.log(response);}, (response)=>{console.log('createLocation() subscribe failed'); console.log(response)});
    this.router.navigate(['all']);
  }
}
