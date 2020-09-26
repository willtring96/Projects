package dev.revature.daos;

import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.Restrictions;

import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
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

			sess.delete(r);
			
			sess.getTransaction().commit();
			sess.close();
				
			return true;
			
		}catch(HibernateException h) {
			h.printStackTrace();
			return false;
		}
	}

	public Review getReview(int reviewID) {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Review.class);
			crit.add(Restrictions.eq("id", reviewID));
	
			Review review = (Review)crit.list().get(0);
	
			sess.getTransaction().commit();
			sess.close();
			
			return review;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}
	
	public List<Review> getReviews() {
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Review.class);
	
			List<Review> reviews = crit.list();
	
			sess.getTransaction().commit();
			sess.close();
			
			return reviews;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public Review updateReview(int reviewID) {
		// TODO Auto-generated method stub
		return null;
	}

}
