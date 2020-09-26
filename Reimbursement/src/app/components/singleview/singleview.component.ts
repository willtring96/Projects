import { Component, OnInit } from '@angular/core';
import { ReimbursementsService } from 'src/app/services/reimbursements.service';
import { Observable } from 'rxjs';
import { Reimbursement } from 'src/app/models/Reimbursement';
import { Router } from '@angular/router';
import { LoginService } from 'src/app/services/login-service.service';
import { Employee } from 'src/app/models/Employee';
import { MenuComponent } from 'src/app/components/menu/menu.component';
import { element } from '@angular/core/src/render3';
import { strictEqual } from 'assert';
import { stringify } from '@angular/core/src/util';

@Component({
  selector: 'app-singleview',
  templateUrl: './singleview.component.html',
  styleUrls: ['./singleview.component.css']
})
export class SingleviewComponent implements OnInit {

  constructor(private reimbservice:ReimbursementsService, private router: Router, private loginservice:LoginService) { }
  ngOnInit() {
    if(this.user == undefined){
      this.router.navigate(['login']);
    }

    this.findManager();
    this.findReqName();
    console.log(this.element);
    this.checkPos();
    this.needApp();
    this.hasDocs();
    this.ifApproved();
  }


  element = JSON.parse(localStorage.getItem('Reimb'));
  user = JSON.parse(localStorage.getItem('currUser'));

  disabledReq:string = "disabled";
  editReq(){
    if(this.disabledReq == "disabled")
      this.disabledReq = null;
    this.showReq = true;
    this.requestor = false;
  }
  saveReq(){
    if(this.disabledReq == null)
      this.disabledReq = "disabled";
    this.showReq = false;
    this.requestor = true;
    this.updateReimb();
  }

  disabled:string = "disabled";
  edit(){
    if(this.disabled == "disabled")
      this.disabled = null;
    this.showMan = true;
    this.manager = false;
  }
  save(){
    if(this.disabled == null)
      this.disabled = "disabled";
    this.showMan = false;
    this.manager = true;
    this.updateReimb();
  }
  
  requestor:boolean = false;
  manager:boolean = false;
  canApprove:boolean = false;
  hasUploads:boolean = false;
  showReq:boolean = false;
  showMan:boolean = false;

  ifApproved(){
    if(this.element.status == "Approved")
      this.requestor = false;
  }
  checkPos(){
    if(this.user.eid == this.element.requestor)
      this.requestor=true;
    if(this.user.position == "Manager")
      this.manager=true;
  }

  needApp(){
    if(this.element.status != "Approved" && this.user.position == "Manager"){
      this.canApprove = true;
    }
    else
      this.canApprove = false;
    // if(this.element.status == "pending" && this.user.position == "Manager"){
    //   this.canApprove = true;
    // }
  }

  hasDocs(){
    if(this.element.docs != null){
      this.hasUploads = true;
    }
  }

  updateReimb(){
    let params:string = this.makeParams();
    let Reimb:Observable<Reimbursement> = this.reimbservice.updateReimb(params);
    Reimb.subscribe((response)=>{console.log(response);}, (response)=>{console.log('updateReimb() subscribe failed'); console.log(response)});
    this.needApp();
    this.ifApproved();
    this.managerName = "";
    this.EmployeeName = "";
    this.findManager();
    this.findReqName();
  }

  makeParams():string{
    let str:string = "";
    str += "rid="+this.element.rid+"&";
    str += "reimb_type="+this.element.reimb_type+"&";
    str += "status="+this.element.status+"&";
    str += "amount="+this.element.amount+"&";
    str += "date_time="+this.element.date_time+"&";
    str += "requestor="+this.element.requestor+"&";
    str += "manager="+this.element.manager+"&";
    str += "req_comm="+this.element.req_comm+"&";
    str += "man_comm="+this.element.man_comm+"&";
    str += "docs="+this.element.docs;
    return str;
  }

  managerName:string = "";
  EmployeeName:string = "";

  findManager(){
    let str:string = "manager";
    let Emp:Observable<Employee> = this.loginservice.findEmp(this.element.manager);
    Emp.subscribe((response)=>{this.setName(str, response);}, (response)=>{console.log(response);});
  }
  findReqName(){
    let str:string = "requestor";
    let Emp:Observable<Employee> = this.loginservice.findEmp(this.element.requestor);
    Emp.subscribe((response)=>{this.setName(str, response);}, (response)=>{console.log(response);});
  }

  setName(str:string ,response){
    if(str == "manager"){
      if(response.lname!=undefined)
        this.managerName += response.fname + " " + response.lname;
      else
        this.managerName += response.fname;
    }
    else
      this.EmployeeName += response.fname + " " + response.lname;
  }
}
