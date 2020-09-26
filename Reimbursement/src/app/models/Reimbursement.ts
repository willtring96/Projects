export class Reimbursement{
    private rid:number;
    private reimb_type:string;
    private status:string;
    private amount:number;
    private date_time:string;
    private requestor:number;
    private manager:number;
    private req_comm:string;
    private man_comm:string;
    private docs:string;

    constructor(rid:number, reimb_type:string, status:string, amount:number, date_time:string, requestor:number, manager:number, req_comm:string, man_comm:string, docs:string){
        this.rid = rid;
        this.reimb_type = reimb_type;
        this.status = status;
        this.amount = amount;
        this.date_time = date_time;
        this.requestor = requestor;
        this.manager = manager;
        this.req_comm = req_comm;
        this.man_comm = man_comm;
        this.docs = docs;
    }
}