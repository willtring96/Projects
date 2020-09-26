package dev.revature.daos;

import java.util.ArrayList;
import java.util.List;

import dev.revature.entities.Attraction;

public interface AttractionDAO {
	public Attraction createAttraction(Attraction attraction);
	public boolean deleteAttraction(int id);
	//public Boolean deleteAttraction(String att_name);
	public boolean updateAttraction(Attraction attraction);
	public Attraction getAttraction(int id);
	public Attraction getAttraction(String att_name);
	public Attraction getAttractionByType(String type);
	public List<Attraction> getAllAttractions();

}
