package dev.revature.controller;



import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;
import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
import dev.revature.entities.User;
import dev.revature.service.UserService;
import dev.revature.service.UserServiceImpl;

@Component
@CrossOrigin(origins = "http://localhost:4200", allowCredentials = "true")
@RestController
public class UserController {
	
	@Autowired
	@Qualifier("getUserService")
	UserService us;
	
//	@RequestMapping(value="/login/{username}/{password}", method=RequestMethod.GET)
//	public User loginWithUsernamePassword(@PathVariable String username, @PathVariable String password) {
//		System.out.println("In controller");
//		return us.validateLogin(username, password);
//	}
	
	@RequestMapping(value = "/login", method = RequestMethod.POST)
	public User loginWithUsernamePassword(String username, String password) {
		return us.validateLogin(username, password);
	}
	
	//return user with a given id
	@RequestMapping(value="/user/{ID}",method=RequestMethod.GET)
	public User getUser(@PathVariable int ID) {
		return us.getUser(ID);
	}
	
	@RequestMapping(value="user/reviews/{userID}",method=RequestMethod.GET)
	public List<Review> getReviewByUser(@PathVariable int userID){
		return us.getReviewByUser(userID);
	}
	
	//update user
	@RequestMapping(value="/user/update",method=RequestMethod.POST)
	public User updateUser(@RequestBody User user) {
		return us.updateUser(user);
	}
	
	@RequestMapping(value="/user/create",method=RequestMethod.POST)
	public User createUser(@RequestBody User user) {
		return us.createUser(user);
	}
}
