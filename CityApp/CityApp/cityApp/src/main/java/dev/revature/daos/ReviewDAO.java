package dev.revature.daos;

import java.util.List;
import dev.revature.entities.Review;

public interface ReviewDAO {
	public Review createReview(Review review);
	public boolean deleteReview(int reviewID);
	public Review getReview(int reviewID);
	public List<Review> getUserReviews(int user_id);
	public Review updateReview(Review review);
	public List<Review> getAllReviews();
	public List<Review> getAttractionReviews(int attraction_id);
}
