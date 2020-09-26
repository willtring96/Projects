package dev.revature.daos;

import java.util.ArrayList;
import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.Restrictions;

import dev.revature.entities.User;

import dev.revature.util.HibernateUtil;

public class UserDAOImpl implements UserDAO {
	
	SessionFactory sf = HibernateUtil.getSessionFactory();

	public User createUser(User user) {
		
		Session sess = sf.openSession();
		try {
			sess.beginTransaction();
			
			sess.save(user);
			
			sess.getTransaction().commit();
			sess.close();
			return user;
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}

	public User getUser(String username) {
		
		Session sess = sf.openSession();
		try {
			sess.beginTransaction();
				
			Criteria crit = sess.createCriteria(User.class);
			crit.add(Restrictions.eq("username", username));
	
			User user = (User)crit.list().get(0);
	
			sess.getTransaction().commit();
			sess.close();
			
			return user;
		} catch (HibernateException h) {
			h.printStackTrace();
			sess.close();
			return null;
		}
	}

	public boolean deleteUser(int userID) {

		Session sess = sf.openSession();		
		try {
			sess.beginTransaction();
			
			User u = new User();
		    u = (User)sess.load(User.class,userID);

			sess.delete(u);
			
			sess.getTransaction().commit();
			sess.close();
				
			return true;
			
		} catch(HibernateException h) {
			h.printStackTrace();
			sess.close();
			return false;
		}
	}

}
