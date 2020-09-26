export class review{
    
    public review_id:number;
    public attraction_id:number;
    public user_id:number;
    public score:number;
    public comments:string;

    constructor(review_id:number,attraction_id:number,user_id:number,score:number,comments:string){
        this.review_id=review_id;
        this.attraction_id=attraction_id;
        this.user_id=user_id;
        this.score=score;
        this.comments=comments;
    }
}