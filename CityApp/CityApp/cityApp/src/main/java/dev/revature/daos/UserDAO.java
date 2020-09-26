package dev.revature.daos;

import java.util.List;

import dev.revature.entities.User;

public interface UserDAO {
	//User createUser(String username, String pass, String fname, String lname);
	public User createUser(User user);
	public User getUser(String username);
	public User getUser(int id);
	public boolean deleteUser(int userID);
	public User updateUser(User user);
}
