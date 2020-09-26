package dev.revature.entities;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

@Entity
@Table(name = "REVIEW")
public class Review {

	@Id @GeneratedValue
	@Column(name="review_id")	
	private int review_id;

	@Override
	public String toString() {
		return "Review [review_id=" + review_id + ", attraction_id=" + attraction_id + ", user_id=" + user_id
				+ ", score=" + score + ", comments=" + comments + "]";
	}

	@JoinColumn(name="attraction_id", nullable=false)
	private int attraction_id;

	@JoinColumn(name="user_id", nullable=false)
	private int user_id;
	
	@Column(name="review_score", nullable=false)
	private double score;
	
	@Column(name="review_comments", nullable=false)
	private String comments;
	
	public Review(int id, int attraction_id, int user, double score, String comments) {
		super();
		this.review_id = id;
		this.attraction_id = attraction_id;
		this.user_id = user;
		this.score = score;
		this.comments = comments;
	}

	public Review() {
		super();
	}

	public int getId() {
		return review_id;
	}

	public void setId(int id) {
		this.review_id = id;
	}

	public int getAttraction_id() {
		return attraction_id;
	}

	public void setAttraction_id(int attraction_id) {
		this.attraction_id = attraction_id;
	}

	public int getUser_id() {
		return user_id;
	}

	public void setUser_id(int user_id) {
		this.user_id = user_id;
	}

	public double getScore() {
		return score;
	}

	public void setScore(double score) {
		this.score = score;
	}

	public String getComments() {
		return comments;
	}

	public void setComments(String comments) {
		this.comments = comments;
	}
	
	
}
