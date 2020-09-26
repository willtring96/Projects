package Playground;

import java.util.ArrayList;
import java.util.List;

import dev.revature.daos.AttractionDAOImpl;
import dev.revature.daos.ReviewDAOImpl;
import dev.revature.daos.UserDAOImpl;
import dev.revature.entities.Attraction;
import dev.revature.entities.User;

public class app {
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		UserDAOImpl userdao = new UserDAOImpl();
		AttractionDAOImpl attrdao = new AttractionDAOImpl();
		ReviewDAOImpl revdao = new ReviewDAOImpl();
		
		/*User u = new User();
		u.setUsername("zberson");
		u.setPassword("testing");
		u.setFname("Zachary");
		u.setLname("Berson");

		userdao.createUser(u);*/
		
		
		/*List<User> ul = new ArrayList<User>();
		u = userdao.getUser("bgwhorley");
		System.out.println(u);*/
		
		//userdao.deleteUser(21);
		/*Attraction a = new Attraction();
		a.setName("DPD");
		a.setLocation("High Street");
		a.setDescription("Calzones");
		a.setType("Restaurant");
		attrdao.createAttraction(a);*/
		
		//attrdao.deleteAttraction(22);
		//Attraction a = attrdao.getAttraction("Subway");
		//System.out.println(a);
		
		/*List<Attraction> list = attrdao.getAllAttraction();
		System.out.println(list);*/
		
		Attraction attrupdate = new Attraction();
		//attrupdate.set
		
		//attrdao.updateAttraction(attraction);
		
	}

}
