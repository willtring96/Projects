package dev.revature.service;

import java.util.List;

import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
import dev.revature.entities.User;

public interface UserService {
	
	public User validateLogin(String username, String password);
	public User getUser(int id);
	public Review createReview(Review review);
	public Attraction createAttraction(Attraction attraction);
	public List<Review> getReviewByUser(int userID);
	public List<Review> getReviewByAttraction(int attractionID);
	public List<Attraction> getAllAttractions();
	public List<Attraction> getAttractionByCatagory(String cat);
	public List<Attraction> getAttractionByName(String name);
	public Attraction getAttractionByID(int id);
	public boolean deleteReviewByID(int id);
	public Review updateReview(Review review);
	public boolean deleteAttraction(int id);
	public User updateUser(User user);
	public User createUser(User user);
	
	
}
