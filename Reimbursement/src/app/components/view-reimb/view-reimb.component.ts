import { Component, OnInit } from '@angular/core';
import { ReimbursementsService } from 'src/app/services/reimbursements.service';
import { Observable } from 'rxjs';
import { Reimbursement } from 'src/app/models/Reimbursement';
import { Router } from '@angular/router';
import { paramKey } from 'blocking-proxy/built/lib/webdriver_commands';

@Component({
  selector: 'app-view-reimb',
  templateUrl: './view-reimb.component.html',
  styleUrls: ['./view-reimb.component.css']
})
export class ViewReimbComponent implements OnInit {

  constructor(private reimbservice:ReimbursementsService, private router: Router) { }
  user = JSON.parse(localStorage.getItem('currUser'));
  Reimb:Observable<Reimbursement>;

  ngOnInit() {
    if(this.user == undefined){
      this.router.navigate(['login']);
    }
    this.viewReimbursements();
  }
  // sort:string = "date_time desc";
  allReimb:Array<Reimbursement> = [];
  // user = new Employee(this.temp.eid, this.temp.fname, this.temp.lname, this.temp.username, this.temp.password, this.temp.position);
  viewReimbursements(){
    this.Reimb = this.reimbservice.viewReimb();
    this.Reimb.subscribe((response)=>{this.displayAll(response);}, (response)=>{console.log('failed');});
  }

  findReimb(rid:number){
    this.Reimb = this.reimbservice.findReimb(rid);
    this.Reimb.subscribe((response)=>{this.displayOne(response);}, (response)=>{console.log('failed');});
  }

  displayAll(response){
    for(let element of response){
      let temp = new Reimbursement(element.rid, element.reimb_type, element.status, element.amount, element.date_time, element.requestor, element.manager, element.req_comm, element.man_comm, element.docs);
      console.log(temp);
      this.allReimb.push(temp);
    };
  }
  
  displayOne(element){
    let one = new Reimbursement(element.rid, element.reimb_type, element.status, element.amount, element.date_time, element.requestor, element.manager, element.req_comm, element.man_comm, element.docs);
    localStorage.setItem('Reimb', JSON.stringify(one));
    this.router.navigate(['detail']);
  }


  // filterReimb(col:string, filter:string){
  //   let filtered:Array<Reimbursement> = [];
  //   switch (col){
  //     case ""
  //   for(let element of this.allReimb){
  //     if(element.)
  //   }
  // }
  // }
}
