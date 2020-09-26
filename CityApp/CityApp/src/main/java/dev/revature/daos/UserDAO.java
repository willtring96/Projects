package dev.revature.daos;

import java.util.List;

import dev.revature.entities.User;

public interface UserDAO {
	//User createUser(String username, String pass, String fname, String lname);
	User createUser(User user);
	User getUser(String username);
	boolean deleteUser(int userID);
}
