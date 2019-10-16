-- CREATE DATABASE scriptures_ta05;

CREATE TABLE scriptures (
  id SERIAL PRIMARY KEY NOT NULL,
  book VARCHAR(80) NOT NULL,
  chapter INT NOT NULL,
  verse INT NOT NULL,
  content VARCHAR(4000) NOT NULL
  );