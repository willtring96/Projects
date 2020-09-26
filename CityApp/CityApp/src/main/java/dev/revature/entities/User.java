package dev.revature.entities;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.*;

@Entity
@Table(name = "USERS", uniqueConstraints= {
@UniqueConstraint(columnNames = "user_username")})
public class User {
	
	@Id
	@GeneratedValue
	private int user_id;
	
	@Column(name="user_username", nullable=false)
	private String username;
	
	@Column(name="user_password", nullable=false)
	private String password;
	
	@Column(name="user_fname", nullable=false)
	private String fname;
	
	@Column(name="user_lname", nullable=false)
	private String lname;
	
	@OneToMany (cascade = CascadeType.ALL, fetch = FetchType.EAGER)
	private List<Review> reviews = new ArrayList<Review>();
	
	public User(int id, String username, String password, String fname, String lname) {
		super();
		this.user_id = id;
		this.username = username;
		this.password = password;
		this.fname = fname;
		this.lname = lname;
	}

	public User() {
		super();
	}

	public int getId() {
		return user_id;
	}

	public void setId(int id) {
		this.user_id = id;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getFname() {
		return fname;
	}

	public void setFname(String fname) {
		this.fname = fname;
	}

	public String getLname() {
		return lname;
	}

	public void setLname(String lname) {
		this.lname = lname;
	}

	public int getUser_id() {
		return user_id;
	}

	public void setUser_id(int user_id) {
		this.user_id = user_id;
	}

	public List<Review> getReviews() {
		return reviews;
	}

	public void setReviews(List<Review> reviews) {
		this.reviews = reviews;
	}

	@Override
	public String toString() {
		return "User [user_id=" + user_id + ", username=" + username + ", password=" + password + ", fname=" + fname
				+ ", lname=" + lname + ", reviews=" + reviews + "]";
	}
	
	
	
}
