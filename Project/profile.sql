-- Create the "Save Food" database
CREATE DATABASE `Save_Food`;

-- Select the "Save Food" database to use it
USE `Save_Food`;

-- Create the profile table
CREATE TABLE profile (
    user VARCHAR(50) PRIMARY KEY,
    filename VARCHAR(100) UNIQUE
);

-- Insert data into the profile table
INSERT INTO profile (user, filename) VALUES
('mary', 'mary.jpg'),
('tom', 'tom.jpg');