export class attraction{
    public attraction_id:number;
    public name:string;
    public location:string;
    public description:string;
    public type:string;

    constructor(attraction_id:number,name:string,location:string,description:string,type:string){
        this.attraction_id=attraction_id;
        this.name=name;
        this.location=location;
        this.description=description;
        this.type=type;
    }
}
