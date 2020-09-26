import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';
import { AttractionService } from 'src/app/services/attraction.service';
import { attraction } from 'src/app/models/attraction';

@Component({
  selector: 'app-all',
  templateUrl: './all.component.html',
  styleUrls: ['./all.component.css']
})
export class AllComponent implements OnInit {

  constructor(private router: Router, private attService:AttractionService) { }
  user = JSON.parse(localStorage.getItem('currUser'));
  Att:Observable<attraction>;
  Attractions:Array<attraction> = [];
  ngOnInit() {
    this.allAttractions();
    console.log("Refresh All");
  }
  
  allAttractions(){
    this.Att = this.attService.getAllAttractions();
    this.Att.subscribe((response)=>{this.displayAll(response);});
  }
  displayAll(response){
    this.Attractions = [];
    for(let element of response){
      let temp = new attraction(element.attraction_id, element.name, element.location, element.description, element.type);
      console.log(temp);
      this.Attractions.push(temp);
    }
  }

  attractionByID(attraction_id:number){
    console.log("attraction_id="+attraction_id);
    this.Att = this.attService.getAttractionsByID(attraction_id);
    this.Att.subscribe((response)=>{console.log(response); this.displayOne(response);});
  }
  displayOne(element){
    let temp = new attraction(element.attraction_id, element.name, element.location, element.description, element.type);
    localStorage.setItem('Attraction', JSON.stringify(temp));
    this.router.navigate(['details']);
  }

  attractionByType(type:string){
    console.log(type);
    this.Att = this.attService.getAttractionsByType(type);
    this.Att.subscribe((response)=>this.display(response));
  }
  attractionByName(name:string){
    console.log("attraction name="+name);
    this.Att = this.attService.getAttractionByName(name);
    this.Att.subscribe((response)=>{this.display(response)});
  }
  display(response){
    this.Attractions = [];
    for(let element of response){
      let temp = new attraction(element.attraction_id, element.name, element.location, element.description, element.type);
      console.log(temp);
      this.Attractions.push(temp);
    }
  }


}
