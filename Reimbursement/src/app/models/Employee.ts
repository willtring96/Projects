export class Employee{
	private eid:number;
	private fname:string;
	private lname:string;
	private username:string;
	private password:string;
	private position:string;

    constructor(eid:number, fname:string, lname:string, username:string, password:string, position:string){
        this.eid=eid;
        this.fname=fname;
        this.lname=lname;
        this.username=username;
        this.password=password;
        this.position=position;
    }
}