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
			if(attraction.equals(null)) {
				return null;
			}
			System.out.println("Attraction: "+attraction);
			Session sess = sf.openSession();
			sess.beginTransaction();
			System.out.println(attraction);
			sess.save(attraction);
			System.out.println("after save");
			sess.getTransaction().commit();
			sess.close();
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	public boolean deleteAttraction(int id) {

		Session sess = sf.openSession();
		
		try {
			sess.beginTransaction();
			
			Attraction a = new Attraction();
		    a = (Attraction)sess.load(Attraction.class,id);

		    if(a.equals(null)) {
		    	sess.close();
		    	return false;
		    }
		    
			sess.delete(a);
			
			sess.getTransaction().commit();
			sess.close();
				
			return true;
			
		} catch(HibernateException h) {
		
			h.printStackTrace();
			sess.close();
			return false;
		}
	}
	
	public Attraction getAttraction(int id) {
		
		Session sess = sf.openSession();
		
		try {
			
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("id", id));
	
			Attraction attraction = (Attraction)crit.list().get(0);
	
			if(attraction.equals(null)) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
			sess.close();
			
			return attraction;
			
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}

	public List<Attraction> getAttraction(String att_name) {
		
		Session sess = sf.openSession();
		
		try {
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("name", att_name));
	
			List<Attraction> attraction = crit.list();
	
			if(attraction.equals(null)) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
			sess.close();
			
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}

	public List<Attraction> getAttractionByType(String type) {
		
		Session sess = sf.openSession();
		
		try {
			
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
			crit.add(Restrictions.eq("type", type));
	
			List<Attraction> attraction = crit.list();;
	
			if(attraction.equals(null)) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
	
			sess.close();
			
			return attraction;
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}

	public List<Attraction> getAllAttractions() {  
		
		try {
			Session sess = sf.openSession();
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(Attraction.class);
	
			List<Attraction> attractions = crit.list();
	
			if(attractions.equals(null)) {
				sess.close();
				return null;
			}
			
			sess.getTransaction().commit();
			sess.close();
			
			return attractions;
		} catch (HibernateException h) {
			h.printStackTrace();
			return null;
		}
	}

	
	public boolean updateAttraction(Attraction attraction) {
		
		Session sess = sf.openSession();
		
		try {			
	
			if(attraction.equals(null)) {
				return false;
			}
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
