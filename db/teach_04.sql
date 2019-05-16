DROP TABLE users;
DROP TABLE speakers;
DROP TABLE conference;
DROP TABLE session;
DROP TABLE talk;
DROP TABLE note;


CREATE TABLE users (
    user_id SERIAL CONSTRAINT users_pk PRIMARY KEY,
    username VARCHAR(20),
    password VARCHAR(200),
    password_salt VARCHAR(50),
    email_address VARCHAR(30)
);

CREATE TABLE speakers (
    speaker_id SERIAL CONSTRAINT speakers_pk PRIMARY KEY,
    name VARCHAR(100),
    calling VARCHAR(200)
);

CREATE TABLE conference (
    conference_id SERIAL CONSTRAINT conference_pk PRIMARY KEY,
    year INT,
    month INT
);

CREATE TABLE session (
    session_id SERIAL CONSTRAINT session_pk PRIMARY KEY,
    session_name VARCHAR(200)
);

CREATE TABLE talk (
    talk_id SERIAL CONSTRAINT talk_pk PRIMARY KEY,
    speaker_id INT CONSTRAINT talk_speakers_speaker_id_fk REFERENCES speakers (speaker_id),
    conference_id INT CONSTRAINT talk_conference_conference_id_fk REFERENCES conference (conference_id),
    session_id INT CONSTRAINT talk_session_session_id_fk REFERENCES session (session_id),
    title VARCHAR(355)
);

CREATE TABLE note (
    note_id SERIAL CONSTRAINT note_id PRIMARY KEY,
    user_id INT CONSTRAINT note_users_user_id_fk REFERENCES users (user_id),
    talk_id INT CONSTRAINT note_talk_talk_id_fk REFERENCES talk (talk_id),
    note_text TEXT,
    create_date TIMESTAMP
);

INSERT INTO "users" ("user_id", "username", "password", "password_salt", "email_address") 
VALUES (DEFAULT, 'exaudeus', 'sdfao408ahsdvoh0w*($#)FS', 'u388eidrf39e', 'exaudeus@gmail.com');

INSERT INTO "speakers" ("speaker_id", "name", "calling") 
VALUES (DEFAULT, 'Ulisses Soares', 'Of the Quorum of the Twelve Apostles');
INSERT INTO "speakers" ("speaker_id", "name", "calling")
VALUES (DEFAULT, 'Becky Craven', 'Second Counselor in the Young Women General Presidency');
INSERT INTO "speakers" ("speaker_id", "name", "calling")
VALUES (DEFAULT, 'Brook P. Hales', 'Of the Seventy');

INSERT INTO "session" ("session_id", "session_name")
VALUES (DEFAULT, 'Saturday Morning');
INSERT INTO "session" ("session_id", "session_name")
VALUES (DEFAULT, 'Saturday Afternoon');
INSERT INTO "session" ("session_id", "session_name")
VALUES (DEFAULT, 'General Priesthood');
INSERT INTO "session" ("session_id", "session_name")
VALUES (DEFAULT, 'Sunday Morning');
INSERT INTO "session" ("session_id", "session_name")
VALUES (DEFAULT, 'Sunday Afternoon');

INSERT INTO "conference" ("conference_id", "year", "month")
VALUES (DEFAULT, 2019, 4);

INSERT INTO "talk" ("talk_id", "speaker_id", "conference_id", "session_id", "title")
VALUES (DEFAULT, 1, 1, 1, 'How Can I Understand?');
INSERT INTO "talk" ("talk_id", "speaker_id", "conference_id", "session_id", "title")
VALUES (DEFAULT, 2, 1, 1, 'Careful versus Casual');
INSERT INTO "talk" ("talk_id", "speaker_id", "conference_id", "session_id", "title")
VALUES (DEFAULT, 3, 1, 1, 'Answers to Prayer');

INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 1, 'Blah blah blah', '2019-05-15 23:18:45.575000');
INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 1, 'Bleh bleh bleh', '2019-05-15 23:18:59.656000');
INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 2, 'Bluh bluh bluh', '2019-05-15 23:19:15.999000');
INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 2, 'Blih blih blih', '2019-05-15 23:19:28.963000');
INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 3, 'Blyh blyh blyh', '2019-05-15 23:19:49.738000');
INSERT INTO "public"."note" ("note_id", "user_id", "talk_id", "note_text", "create_date")
VALUES (DEFAULT, 1, 3, 'Bloh bloh bloh', '2019-05-15 23:20:04.354000');

SELECT * FROM note where talk_id = 1;