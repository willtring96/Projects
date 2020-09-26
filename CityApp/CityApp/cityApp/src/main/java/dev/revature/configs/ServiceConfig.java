package dev.revature.configs;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.stereotype.Component;

import dev.revature.daos.AttractionDAO;
import dev.revature.daos.AttractionDAOImpl;
import dev.revature.daos.ReviewDAO;
import dev.revature.daos.ReviewDAOImpl;
import dev.revature.daos.UserDAO;
import dev.revature.daos.UserDAOImpl;
import dev.revature.service.UserService;
import dev.revature.service.UserServiceImpl;

@Component
@Configuration
public class ServiceConfig {
	
	@Bean
	public UserService getUserService() {
		return new UserServiceImpl();
	}
	
	@Bean
	public UserDAO getUserDAO() {
		return new UserDAOImpl();
	}
	
	@Bean
	public AttractionDAO getAttractionDAO() {
		return new AttractionDAOImpl();
	}
	
	@Bean
	public ReviewDAO getReviewDAO() {
		return new ReviewDAOImpl();
	}
	
}
