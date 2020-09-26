package dev.revature.daos;

import java.util.ArrayList;
import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.Restrictions;

import dev.revature.entities.Attraction;
import dev.revature.entities.User;
import dev.revature.util.HibernateUtil;

public class AttractionDAOImpl implements AttractionDAO {
	
	SessionFactory sf = HibernateUtil.getSessionFactory();

	public Attraction createAttraction(Attraction attraction) {
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
			
			sess.save(attraction);
			
			sess.getTransaction().commit();
			sess.close();
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public boolean deleteAttraction(int id) {
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
			
			Attraction a = new Attraction();
		    a = (Attraction)sess.load(Attraction.class,id);

			sess.delete(a);
			
			sess.getTransaction().commit();
			sess.close();
				
			return true;
			
		}catch(HibernateException h) {
			h.printStackTrace();
			return false;
		}
	}
	
	public Attraction getAttraction(int id) {
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("id", id));
	
			Attraction attraction = (Attraction)crit.list().get(0);
	
			sess.getTransaction().commit();
			sess.close();
			
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public Attraction getAttraction(String att_name) {
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("name", att_name));
	
			Attraction attraction = (Attraction)crit.list().get(0);
	
			sess.getTransaction().commit();
			sess.close();
			
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public Attraction getAttractionByType(String type) {
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("type", type));
	
			Attraction attraction = (Attraction)crit.list().get(0);
	
			sess.getTransaction().commit();
	
			sess.close();
			
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public List<Attraction> getAllAttractions() {  
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
	
			List<Attraction> attractions = crit.list();
	
			sess.getTransaction().commit();
			sess.close();
			
			return attractions;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	
	//return boolean since it doesn't make sense to return an object
	public boolean updateAttraction(Attraction attraction) {
		
		Session sess = sf.openSession();
		try {			

			sess.update(attraction);
			
			sess.getTransaction().commit();
			sess.close();
			return true;
			
		} catch (HibernateException e) {
			e.printStackTrace();
			return false;
		} finally {
			sess.close();
		}
	}
}
