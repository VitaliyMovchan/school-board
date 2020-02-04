BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "grades" (
	"student_id"	INTEGER,
	"grade"	INTEGER,
	FOREIGN KEY("student_id") REFERENCES "student"("id") ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS "student" (
	"id"	INTEGER,
	"name"	TEXT,
	"school_board"	INTEGER DEFAULT 0,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "grades" VALUES (1,8);
INSERT INTO "grades" VALUES (1,9);
INSERT INTO "grades" VALUES (1,9);
INSERT INTO "grades" VALUES (2,9);
INSERT INTO "grades" VALUES (2,9);
INSERT INTO "grades" VALUES (3,8);
INSERT INTO "grades" VALUES (3,7);
INSERT INTO "grades" VALUES (4,6);
INSERT INTO "grades" VALUES (4,5);
INSERT INTO "grades" VALUES (4,6);
INSERT INTO "grades" VALUES (4,7);
INSERT INTO "grades" VALUES (5,6);
INSERT INTO "grades" VALUES (5,7);
INSERT INTO "grades" VALUES (6,8);
INSERT INTO "grades" VALUES (6,6);
INSERT INTO "grades" VALUES (6,7);
INSERT INTO "grades" VALUES (6,9);
INSERT INTO "grades" VALUES (7,8);
INSERT INTO "grades" VALUES (8,4);
INSERT INTO "grades" VALUES (8,6);
INSERT INTO "grades" VALUES (9,8);
INSERT INTO "grades" VALUES (9,9);
INSERT INTO "grades" VALUES (9,8);
INSERT INTO "grades" VALUES (10,6);
INSERT INTO "grades" VALUES (10,6);
INSERT INTO "grades" VALUES (11,10);
INSERT INTO "grades" VALUES (11,9);
INSERT INTO "grades" VALUES (12,6);
INSERT INTO "grades" VALUES (12,7);
INSERT INTO "student" VALUES (1,'Vasiliy',1);
INSERT INTO "student" VALUES (2,'Yuliya',2);
INSERT INTO "student" VALUES (3,'Tatyana',1);
INSERT INTO "student" VALUES (4,'Sergej',2);
INSERT INTO "student" VALUES (5,'Evgenij',2);
INSERT INTO "student" VALUES (6,'Anastasiya',1);
INSERT INTO "student" VALUES (7,'Kseniya',1);
INSERT INTO "student" VALUES (8,'Aleksej',2);
INSERT INTO "student" VALUES (9,'Olya',1);
INSERT INTO "student" VALUES (10,'Bogdan',2);
INSERT INTO "student" VALUES (11,'Oleg',1);
INSERT INTO "student" VALUES (12,'Masha',2);
COMMIT;
