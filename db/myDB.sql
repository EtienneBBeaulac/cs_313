CREATE TABLE user_account
(
    id SERIAL PRIMARY KEY,
    username VARCHAR (100) UNIQUE NOT NULL,
    email VARCHAR (355) UNIQUE NOT NULL,
    password VARCHAR (200) NOT NULL,
    password_salt VARCHAR(50) NOT NULL,
    password_hash_algorithm VARCHAR(50) NOT NULL,
    created_on TIMESTAMP NOT NULL,
    last_login TIMESTAMP
);

CREATE TABLE user_bookmark
(
	id SERIAL
		CONSTRAINT user_bookmark_pk
			PRIMARY KEY,
	user_id INT NOT NULL
		CONSTRAINT user_bookmark_user_id_fk
			REFERENCES user_account,
	bookmark_name VARCHAR(200) NOT NULL,
	bookmark_url TEXT NOT NULL,
	created_on TIMESTAMP NOT NULL,
	last_modified TIMESTAMP NOT NULL
);

CREATE TABLE role
(
	id SERIAL
		CONSTRAINT role_pk
			PRIMARY KEY,
	role_name VARCHAR(30) NOT NULL
);

CREATE unique index role_role_name_uindex
	ON role (role_name);

CREATE TABLE user_account_role
(
	user_id INT,
	role_id INT,
	grant_date TIMESTAMP NOT NULL,
	PRIMARY KEY (user_id, role_id),
	CONSTRAINT user_account_role_role_id_fkey 
        FOREIGN KEY (role_id)
        REFERENCES role (id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT user_account_role_user_id_fkey 
        FOREIGN KEY (user_id)
        REFERENCES user_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION
);

