
/*
----------------
-- create DATABASE 
----------------
*/
CREATE DATABASE IF NOT  EXISTS school_system 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

use `school_system`; 


/*
-----------------
-- create Table 
-----------------
*/


-- Students

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Instructors

CREATE TABLE instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(20),
    specialization VARCHAR(50),
    salary DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Courses

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    instructor_id INT NOT NULL,
   CONSTRAINT fk_instructor_id FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE CASCADE ON UPDATE CASCADE
);



-- Enrollments

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    grade VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_student_id FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_course_id FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE (student_id, course_id)
);


/*
------------------
-- insert Data 
------------------
*/

-- Students Data

INSERT INTO students(fname, lname, email, phone) VALUES
('ahmed','yousef','ahmed@gmail.com','01227544236'),
('amr','yousef','amr@gmail.com','01227554236'),
('omar','yousef','omar@gmail.com','01225554216'),
('tarek','yousef','tarek@gmail.com','01236454426'),
('amir','yousef','amir@gmail.com','01252544236');

-- Instructors Data
INSERT INTO instructors(fname, lname, email, phone, specialization, salary) VALUES 
('Mohamed','Said','mohamed@school.com','01001112223','PHP Web Development',8500),
('Ibrahim','Adel','ibrahim@school.com','01223334445','Database Design',9000),
('Fatma','Zaki','fatma@school.com','01115556667','UI/UX Design',7500);

-- Courses Data
INSERT INTO courses(title, description, price, instructor_id) VALUES 
('PHP Fundamentals','Learn the basics of PHP',1500,1),
('Database Design','Master ERD and SQL',2000,2),
('UI/UX Design','Design modern interfaces',1200,3),
('Advanced PHP','OOP & MVC',2500,1);

-- Enrollments Data
INSERT INTO enrollments(student_id, course_id, grade) VALUES 
(1,1,'A'),
(2,1,'B+'),
(3,2,'A-'),
(4,3,'B'),
(5,2,'C+');
