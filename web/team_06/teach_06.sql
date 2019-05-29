CREATE TABLE scripture
(
	id SERIAL
		CONSTRAINT scripture_pk
			PRIMARY KEY,
	book CHAR(50) NOT NULL,
	chapter INT NOT NULL,
	verse INT NOT NULL,
	content TEXT NOT NULL
);

INSERT INTO "other"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO "other"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'D&C', 88, 49, 'The light shineth in darkness');
INSERT INTO "other"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'D&C', 93, 28, 'He that keepeth his commandments receiveth truth and light');
INSERT INTO "other"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'Mosiah', 16, 9, 'He is the light and the life of the world; yea');


create table other.topic
(
	id serial
		constraint topic_pk
			primary key,
	name char(30) not null
);

create unique index topic_name_uindex
	on other.topic (name);

INSERT INTO "topic" ("id", "name") VALUES (DEFAULT, 'Faith');
INSERT INTO "topic" ("id", "name") VALUES (DEFAULT, 'Sacrifice');
INSERT INTO "topic" ("id", "name") VALUES (DEFAULT, 'Charity');

create table scripture_topic
(
	id serial
		constraint scripture_topic_pk
			primary key,
	scripture_id int not null
		constraint scripture_topic_scripture_id_fk
			references scripture (id),
	topic_id int not null
		constraint scripture_topic_topic_id_fk
			references topic
);