package dev.revature.entities;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Table;

@Entity
@Table(name = "ATTRACTION")
public class Attraction {
	@Id @GeneratedValue
	@Column(name="attraction_id")
	private int attraction_id;
	
	@Column(name="attraction_name", nullable=false)
	private String name;
	
	@Column(name="attraction_location", nullable=false)
	private String location;
	
	@Column(name="attraction_description", nullable=false)
	private String description;
	
	@Column(name="attraction_type", nullable=false)
	private String type;
	
	/*@Column(name="review_id")
	private Review review;*/
	
	public Attraction(int id, String name, String location, String description, String type) {
		super();
		this.attraction_id = id;
		this.name = name;
		this.location = location;
		this.description = description;
		this.type = type;
	}

	public Attraction() {
		super();
	}

	public int getId() {
		return attraction_id;
	}

	public void setId(int id) {
		this.attraction_id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getLocation() {
		return location;
	}

	public void setLocation(String location) {
		this.location = location;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	@Override
	public String toString() {
		return "Attraction [attraction_id=" + attraction_id + ", name=" + name + ", location=" + location
				+ ", description=" + description + ", type=" + type + "]";
	}
	
	
}
