package dev.revature.util;

import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

public class HibernateUtil {

	//SessionFactory is an object designed to create sessions that will interact with our database
	private static SessionFactory sf;
	
	private HibernateUtil() {
		
	}

	public static SessionFactory getSessionFactory() {
		if(sf == null) {
			//Configuration is an 'interface' that will instruct us how to connect to our database
			//it tells SessionFactory how to connect to a database
			//in reality, Configuration is a CLASS, NOT an interface
			Configuration cfg = new Configuration();
			sf = cfg.configure().buildSessionFactory();
		}
		return sf;
		
	}
	
	
}
