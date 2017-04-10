USE ecnchurch;
DROP TABLE IF EXISTS bulletins;
DROP TABLE IF EXISTS programs;
DROP TABLE IF EXISTS members;
DROP TABLE IF EXISTS missions;

CREATE TABLE missions (
  missionsId INT UNSIGNED AUTO_INCREMENT NOT NULL,
  address1 VARCHAR (32) NOT NULL,
  address2 VARCHAR (32) NOT NULL,
  city VARCHAR (32) NOT NULL,
  email VARCHAR(128) NOT NULL,
  images VARCHAR (64) NOT NULL,
  name VARCHAR(32) NOT NULL,
  phone VARCHAR(16) NOT NULL,
  pic VARCHAR(32) NOT NULL,
  serviceTime VARCHAR (128) NOT NULL,
  state VARCHAR (2) NOT NULL,
  zip VARCHAR (32) NOT NULL,
  UNIQUE(email),
  PRIMARY KEY(missionsId)
);


CREATE TABLE members (
  membersId INT UNSIGNED AUTO_INCREMENT NOT NULL,
  missionsId INT UNSIGNED NOT NULL,
  activation CHAR(16),
  email VARCHAR(128) NOT NULL,
  firstName VARCHAR(32) NOT NULL,
  hash CHAR(128) NOT NULL,
  lastName VARCHAR(32) NOT NULL,
  phone VARCHAR(32) NOT NULL,
  position VARCHAR(32) NOT NULL,
  zip VARCHAR (32) NOT NULL,
  state VARCHAR (2) NOT NULL,
  city VARCHAR (32) NOT NULL,
  address1 VARCHAR (32) NOT NULL,
  address2 VARCHAR (32) NOT NULL,
  gender VARCHAR (32) NOT NULL,
  dob DATE NOT NULL,
  salt CHAR(64) NOT NULL,
  INDEX(missionsId),
  FOREIGN KEY(missionsId) REFERENCES missions(missionsId),
  PRIMARY KEY(membersId)

);

CREATE TABLE programs (
  programsId INT UNSIGNED AUTO_INCREMENT NOT NULL,
  missionsId INT UNSIGNED NOT NULL,
  progDate DATE NOT NULL,
  description VARCHAR(160) NOT NULL,
  location VARCHAR(32) NOT NULL,
  programName VARCHAR(32) NOT NULL,
  progTime VARCHAR(15) NOT NULL,
  INDEX(missionsId),
  FOREIGN KEY(missionsId) REFERENCES missions(missionsId),
  PRIMARY KEY(programsId)

);

CREATE TABLE bulletins (
  bulletinId INT UNSIGNED AUTO_INCREMENT NOT NULL,
  membersId INT UNSIGNED NOT NULL,
  missionsId INT UNSIGNED NOT NULL,
  category VARCHAR(32) NOT NULL,
  message TEXT NOT NULL,
  timeStamp TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX (membersId),
  INDEX(missionsId),
  FOREIGN KEY (membersId) REFERENCES members(membersId),
  FOREIGN KEY (missionsId) REFERENCES missions(missionsId),
  PRIMARY KEY(bulletinId)

);