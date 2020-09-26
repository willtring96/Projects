package dev.revature.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.context.annotation.Bean;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;

import dev.revature.daos.AttractionDAO;
import dev.revature.daos.ReviewDAO;
import dev.revature.daos.UserDAO;
import dev.revature.daos.UserDAOImpl;
import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
import dev.revature.entities.User;
import oracle.net.aso.a;

@Component
@Service
public class UserServiceImpl implements UserService{

	@Autowired
	@Qualifier("getUserDAO")
	UserDAO ud;
	
	@Autowired
	@Qualifier("getReviewDAO")
	ReviewDAO rd;
	
	@Autowired
	@Qualifier("getAttractionDAO")
	AttractionDAO ad;
	
	
	//This method takes in a username and password
	//then returns the user id if the information is correct
	//if the password iSs invalid it returns -1
	public User validateLogin(String username, String password) {
		
		User user = ud.getUser(username);
		System.out.println(username);
		System.out.println(password);
		System.out.println(ud.getUser(username));
		if(user != null && user.getPassword().equals(password)) {
			return user;
		}else {
		return null;
		}
	}

	//returns a user by a given id
	public User getUser(int id) {
		//Waiting for get userByID in DAO
		return null;
	}

	//pass a review from controller to create review DAO method
	public Review createReview(Review review) {
		return rd.createReview(review);
	}

	//pass attraction object from controller to create attraction method in DAO
	public Attraction createAttraction(Attraction attraction) {
		return ad.createAttraction(attraction);
	}

	//return a list of all reviews made by a given user
	public List<Review> getReviewByUser(int userID) {
		
		return null;
	}

	//return a list of reviews for a given attraction id
	public List<Review> getReviewByAttraction(int attractionID) {
		return rd.getAttractionReviews(attractionID);
	}

	//return a list of all attractions in the database
	public List<Attraction> getAllAttractions() {
		return ad.getAllAttractions();
	}

	//return a list of all attractions of a given type
	public List<Attraction> getAttractionByCatagory(String type) {
		return ad.getAttractionByType(type);
	}

	//return a list of all attraction of a given name
	public List<Attraction> getAttractionByName(String name) {
		return ad.getAttraction(name);
	}

	//return attraction with a given id
	public Attraction getAttractionByID(int id) {
		return ad.getAttraction(id);
	}
	
	//return boolean as review with given id is deleted.
	public boolean deleteReviewByID(int id) {
		return rd.deleteReview(id);
	}

	//return the updated review of a given review
	public Review updateReview(Review review) {
		return rd.updateReview(review);
	}
	
	//delete an attraction by a given id
	public boolean deleteAttraction(int id) {
		return ad.deleteAttraction(id);
	}
	
	public User updateUser(User user) {
		return ud.updateUser(user);
	}
	
	public User createUser(User user) {
		System.out.println("Hello");
		return ud.createUser(user);
	}
}