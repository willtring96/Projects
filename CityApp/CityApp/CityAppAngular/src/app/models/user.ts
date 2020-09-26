export class user{
    public user_id:number;
    public username:string;
    public password:string;
    public fname:string;
    public lname:string;
    public reviews:Array<number>;

    constructor(user_id:number, username:string, password:string, fname:string, lname:string, reviews:Array<number>){
        this.user_id=user_id;
        this.username=username;
        this.password=password;
        this.fname=fname;
        this.lname=lname;
        this.reviews=reviews;
    }
}