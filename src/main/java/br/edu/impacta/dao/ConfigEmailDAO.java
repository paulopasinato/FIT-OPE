package br.edu.impacta.dao;

import java.io.Serializable;

import br.edu.impacta.entity.ConfigEmail;

public class ConfigEmailDAO extends GenericDAO<ConfigEmail> implements Serializable {

	private static final long serialVersionUID = 1L;

	public ConfigEmailDAO() {
		super(ConfigEmail.class);
	}
	
}
