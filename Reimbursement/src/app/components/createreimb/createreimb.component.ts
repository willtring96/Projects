import { Component, OnInit } from '@angular/core';
import { ReimbursementsService } from 'src/app/services/reimbursements.service';
import { Observable } from 'rxjs';
import { Reimbursement } from 'src/app/models/Reimbursement';
import { Router } from '@angular/router';

@Component({
  selector: 'app-createreimb',
  templateUrl: './createreimb.component.html',
  styleUrls: ['./createreimb.component.css']
})
export class CreatereimbComponent implements OnInit {

  constructor(private reimbservice:ReimbursementsService, private router: Router) { }

  ngOnInit() {
    if(this.user == undefined){
      this.router.navigate(['login']);
    }
  }

  user = JSON.parse(localStorage.getItem('currUser'));

  createRequest(date:string, reimb_type:string, amount:number, comments:string){
    if((date!="") && (reimb_type!="none") && (amount!=0)){
    let str:string = "";
    str += "reimb_type="+reimb_type+"&";
    str += "status=pending&";
    str += "amount="+amount+"&";
    str += "date_time="+date+"&";
    str += "requestor="+this.user.eid+"&";
    str += "manager=0&";
    str += "req_comm="+comments+"&";
    str += "man_comm= &";
    str += "docs=";
    console.log(str);
    this.sendReimb(str);
    }
  }

  sendReimb(params:string){
    let Reimb:Observable<Reimbursement> = this.reimbservice.createReimb(params);
    Reimb.subscribe((response)=>{console.log(response);}, (response)=>{console.log('createReimb() subscribe failed'); console.log(response)});
    this.router.navigate(['menu']);
  }
}
