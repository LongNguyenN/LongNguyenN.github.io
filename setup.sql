-- Author: Danhiel Vu
-- Last updated: 12/4/2019
-- Section: AA - Austin Jenchi, Chao Hsu Lin
-- Creates a new HW5 Database, dropping the old one if it exists, and creating
-- a Pokedex table for it, also dropping it if it existed before.
DROP DATABASE IF EXISTS akinator;

CREATE DATABASE akinator;
USE akinator;

DROP TABLE IF EXISTS Questions;

CREATE TABLE Questions(
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(100),
  yes INTEGER,
  no INTEGER
);

INSERT INTO Questions VALUES (1, "Computer", null, null);
