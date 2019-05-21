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

INSERT INTO "public"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO "public"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'D&C', 88, 49, 'The light shineth in darkness');
INSERT INTO "public"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'D&C', 93, 28, 'He that keepeth his commandments receiveth truth and light');
INSERT INTO "public"."scripture" ("id", "book", "chapter", "verse", "content")
VALUES (DEFAULT, 'Mosiah', 16, 9, 'He is the light and the life of the world; yea');
