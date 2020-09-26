package dev.revature.daos;

import java.util.List;
import dev.revature.entities.Review;

public interface ReviewDAO {
	Review createReview(Review review);
	boolean deleteReview(int reviewID);
	Review getReview(int reviewID);
	Review updateReview(int reviewID);
	public List<Review> getReviews();
}
