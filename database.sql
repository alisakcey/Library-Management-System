CREATE DATABASE Libary;
USE Libary;

-- DROP DATABASE Libary;

CREATE TABLE Book(
isbn VARCHAR(15) UNIQUE NOT NULL,
title TEXT,
author VARCHAR(30) NOT NULL,
copies INT NOT NULL
);

INSERT INTO Book(isbn, title, author, copies) VALUES
('6900152484440', 'V for Vendetta', 'Alan Moore', 13),
('9782616052277', 'X-Men: God Loves, Man Kills', 'Chris',  33),
('9783161484100', 'Mike Tyson : Undisputed Truth', 'Larry Sloman, Mike Tyson', 19),
('9789996245442', 'When Breath Becomes Air', 'Paul Kalanithi', 9),
('9885691200700', 'The Great Gatsby', 'F. Scott Fitzgerald', 20);

UPDATE Book SET title='Math', author='Parsuram Sir',copies=20 WHERE isbn='978-93-856';
SELECT * FROM Book;

/*DROP TABLE Book;*/

DELETE FROM Book WHERE isbn="6900152484440";
UPDATE Book SET copies='10' WHERE 'isbn'='354335436';
CREATE TABLE users(
name VARCHAR(20),
email VARCHAR(50),
password VARCHAR(50));

INSERT INTO users VALUES 
("Alisa Kunwar","alishakunwar611@gmail.com","dddf0ac818211584c38514bd95eca175"), /*password : alisha */
("Subash Pandey","pandeysubash404@gmail.com","b4caefa3d450d0e36e183160d17aba24"); /*password : subash */

SELECT * FROM users;

/*DROP TABLE users;*/

CREATE TABLE `students` (
  `id` int(11)  PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);

INSERT INTO students VALUES 
("3307","Alisa Kc","alishakunwar611@gmail.com"),
("3301","Suvas Pandey","pandeysubash404@gmail.com");

SELECT * FROM students;

/*DROP TABLE students;*/

CREATE TABLE `book_taken` (
  `id` int(11)  PRIMARY KEY AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `taken_date` date NOT NULL,
  `due_date` date NOT NULL,
  FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  FOREIGN KEY (`isbn`) REFERENCES `Book` (`isbn`)
);

INSERT INTO book_taken VALUES 
("1","3307","9789996245442","2023-2-8","2023-2-20"),
("2","3301",'9782616052277',"2023-2-5","2023-2-15");

SELECT * FROM book_taken;

/*drop table book_taken;*/

