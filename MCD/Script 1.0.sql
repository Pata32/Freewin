#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id       Int  Auto_increment  NOT NULL ,
        email    Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        name     Varchar (50) NOT NULL ,
        surname  Varchar (50) NOT NULL ,
        cash     Varchar (50) NOT NULL ,
        roul_1   Date NOT NULL ,
        roul_2   Date NOT NULL ,
        roul_3   Date NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tag
#------------------------------------------------------------

CREATE TABLE tag(
        id       Int  Auto_increment  NOT NULL ,
        tag_name Varchar (50) NOT NULL
	,CONSTRAINT tag_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: possess
#------------------------------------------------------------

CREATE TABLE possess(
        id      Int NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT possess_PK PRIMARY KEY (id,id_user)

	,CONSTRAINT possess_tag_FK FOREIGN KEY (id) REFERENCES tag(id)
	,CONSTRAINT possess_user0_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

