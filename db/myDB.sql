CREATE TABLE user_account
(
    id SERIAL PRIMARY KEY,
    username VARCHAR (100) UNIQUE NOT NULL,
    email VARCHAR (355) UNIQUE NOT NULL,
    password VARCHAR (200) NOT NULL,
    password_salt VARCHAR(50) NOT NULL,
    password_hash_algorithm VARCHAR(50) NOT NULL,
    created_on TIMESTAMP NOT NULL DEFAULT NOW(),
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
	created_on TIMESTAMP NOT NULL DEFAULT NOW(),
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
	grant_date TIMESTAMP NOT NULL DEFAULT NOW(),
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

INSERT INTO user_account (id, username, email, password, password_salt, password_hash_algorithm, created_on, last_login) VALUES (DEFAULT, 'test1', 'test1@gmail.com', '$2y$10$iCHxn9pSkZDtfEb4Nyk1T.ICpKwjBfNFyBNTUkFhii3EWCpy.p4.a', 'something', 'PASSWORD_DEFAULT', DEFAULT, '2019-05-21 18:50:47.062000');
INSERT INTO user_account (id, username, email, password, password_salt, password_hash_algorithm, created_on, last_login) VALUES (DEFAULT, 'test2', 'test2@gmail.com', '$2y$10$fXkEEr2OjF5Bk4eF3g/smuAC97jSB.hwijEKyWBzR5bqGn1tf.fCW', 'something', 'PASSWORD_DEFAULT', DEFAULT, '2019-05-22 20:11:56.757000');
INSERT INTO public.user_bookmark (id, user_id, bookmark_name, bookmark_url, created_on, last_modified) VALUES (1, 1, 'db bookmark', 'https://data.heroku.com', '2019-05-21 18:51:38.391310', '2019-05-21 18:51:34.020000');