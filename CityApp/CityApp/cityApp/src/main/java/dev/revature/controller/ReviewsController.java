package dev.revature.controller;

import java.util.List;

import org.hibernate.annotations.Parameter;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import dev.revature.entities.Review;
import dev.revature.service.UserService;

@Component
@CrossOrigin(origins = "http://localhost:4200", allowCredentials = "true")
@RestController
public class ReviewsController {

	
	@Autowired
	@Qualifier("getUserService")
	UserService us;
	
	@RequestMapping(value="/reviews/attraction/{attractionID}",method=RequestMethod.GET)
	public List<Review> getReviewByAttraction(@PathVariable int attractionID){
		return us.getReviewByAttraction(attractionID);
	}
	
	//returns boolean if review was deleted
	@RequestMapping(value="/reviews/delete/{id}",method=RequestMethod.GET)
	public boolean deleteReviewByID(@PathVariable int id) {
		return us.deleteReviewByID(id);
	}
	
	//returns review after being updated.
		@RequestMapping(value="/reviews/update",method=RequestMethod.POST)
		public Review updateReview(@RequestBody Review review) {
			return us.updateReview(review);
		}
	
	@RequestMapping(value="/reviews/create",method=RequestMethod.POST)
	public Review createReview(int attraction_id, int user_id, double score, String comments){
		System.out.println(attraction_id);
		return us.createReview(new Review(0, attraction_id, user_id, score, comments));
	}	
}
