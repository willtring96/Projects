package dev.revature.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import dev.revature.entities.Attraction;
import dev.revature.entities.Review;
import dev.revature.service.UserService;

@Component
@CrossOrigin(origins = "http://localhost:4200", allowCredentials = "true")
@RestController
public class AttractionsController {
	
		
		@Autowired
		@Qualifier("getUserService")
		UserService us;
		
		
		@RequestMapping(value="/attractions", method=RequestMethod.GET)
		public List<Attraction> getAllAttractions(){
			return us.getAllAttractions();
		}
		
		@RequestMapping(value="/attractions/id/{id}", method=RequestMethod.GET)
		public Attraction getAttractionByID(@PathVariable int id) {
			return us.getAttractionByID(id);
		}
		
		@RequestMapping(value="attractions/type/{type}",method=RequestMethod.GET)
		public List<Attraction> getAttractionByType(@PathVariable String type){
			return us.getAttractionByCatagory(type);
		}
		
		@RequestMapping(value="attractions/name/{name}",method=RequestMethod.GET)
		public List<Attraction> getAttracitonByName(@PathVariable String name){
			return us.getAttractionByName(name);
		}
		
		@RequestMapping(value="attractions/create",method=RequestMethod.POST)
		public Attraction createAttraction(String attraction_description, String attraction_location, String attraction_name,String attraction_type) {
			return us.createAttraction(new Attraction(0, attraction_name, attraction_location, attraction_description, attraction_type));
		}
		
		@RequestMapping(value="/attraction/review/{attractionID}",method=RequestMethod.GET)
		public List<Review> getReviewByAttraction(@PathVariable int attractionID){
			return us.getReviewByAttraction(attractionID);
		}
		
		//delete attraction by id
		@RequestMapping(value="/attraction/delete/{attractionID}",method=RequestMethod.GET)
		public boolean deleteAttraction(@PathVariable int attractionID){
			return us.deleteAttraction(attractionID);
		}
}
