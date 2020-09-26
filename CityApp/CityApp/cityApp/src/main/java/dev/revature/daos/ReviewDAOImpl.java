package dev.revature.daos;

import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.Restrictions;

import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
import dev.revature.entities.User;
import dev.revature.util.HibernateUtil;

public class ReviewDAOImpl implements ReviewDAO {
	
	SessionFactory sf = HibernateUtil.getSessionFactory();

	public Review createReview(Review review) {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
			
			sess.save(review);
			
			sess.getTransaction().commit();
			sess.close();
			return review;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public boolean deleteReview(int reviewID) {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
			
			Review r = new Review();
		    r = (Review)sess.load(Review.class,reviewID);

		    if(r.equals(null)) {
		    	return false;
		    }
		    
			sess.delete(r);
			
			sess.getTransaction().commit();
			sess.close();
				
			return true;
			
		}catch(HibernateException h) {
			h.printStackTrace();
			return false;
		}
	}

	//return the review with a given id
	public Review getReview(int reviewID) {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Review.class);
			crit.add(Restrictions.eq("id", reviewID));
				
			Review reviews = (Review) crit.list().get(0);
	
			if(reviews.equals(null)) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
			sess.close();
			
			return reviews;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}
	
	public List<Review> getAllReviews() {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Review.class);
	
			List<Review> reviews = crit.list();
	
			if(reviews.isEmpty()) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
			sess.close();
			
			return reviews;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}
	
	public List<Review> getAttractionReviews(int attraction_id) {
		
		Session sess = sf.openSession();
		try {
			sess.beginTransaction();
					
			Criteria crit = sess.createCriteria(Review.class);
			crit.add(Restrictions.eq("attraction_id", attraction_id));
			
			List<Review> reviews = (List<Review>)crit.list();	
			
			if(reviews.isEmpty()) {
				sess.close();
				return null;
			}
			
			sess.getTransaction();
			sess.close();
			
			return reviews;
			
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}
	
	public List<Review> getUserReviews(int user_id) {
		
		Session sess = sf.openSession();
		try {
			
			sess.beginTransaction();
			
			Criteria crit = sess.createCriteria(Review.class);
			crit.add(Restrictions.eq("user_id", user_id));
			
			List<Review> reviews = (List<Review>)crit.list();
			if(reviews.isEmpty()) {
				sess.close();
				return null;
			}
			
			sess.getTransaction();
			sess.close();
			
			return reviews;
			
		} catch (HibernateException h) {
			
			h.printStackTrace();
			return null;
		}
		
	}

	public Review updateReview(Review review) {
		
		Session sess = sf.openSession();
		try {
			
			sess.beginTransaction();
		
			sess.update(review);
			
			sess.getTransaction().commit();
			sess.close();
			return review;
			
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
			
	}

}
