



--------------------------------------------
 1- Students إدخال بيانات تجريبية في جدول 
--------------------------------------------      

INSERT INTO students (fname,lname,email,password,phone)
VALUES ('osama','ahmed','osama@gmail.com','123456','01227155698'),
 ('zeyad','ibrahim','zeyad@gmail.com','123456','01228137608'),
 ('islam','mostafa','islam@gmail.com','123456','01200155378');
 



-----------------------------------------------
 2- Instructors إدخال بيانات تجريبية في جدول 
-----------------------------------------------    
 INSERT INTO instructors (fname,lname,email,password,phone,specialization,salary)
VALUES ('islam','kabbry','islam@gmail.com','123456','0122736365698','laravel deveeloper',1000),
 ('zeyad','mohamed','zeyad@gmail.com','123456','012105137608','fullstack',1000);



--------------------------------------------
 3- تحديث البريد الإلكتروني لأحد الطلاب
--------------------------------------------    

 UPDATE students SET email ="zeyadmohamed59@gmail.com" WHERE fname="zeyad";



 
--------------------------------------------
 4- Courses إدخال بيانات تجريبية في جدول 
--------------------------------------------  

INSERT INTO courses (title,description,instructor_id,price)
VALUES ('introduction to MySQL','fundmantals php',4,5000),
 ('full stack','frontend with back end',5,1000);



-------------------------------------------------------------
 5- ( Enrollments إدخال سجل في جدول ) تسجيل طالب في كورس 
-------------------------------------------------------------   


 INSERT INTO enrollments (student_id,course_id,grade)
VALUES (5,5,"A+"), (2,6,"A");




----------------------------------------------------
 6-  ( Enrollments  حذف سجل من )  حذف عملية تسجيل 
----------------------------------------------------    


 DELETE FROM enrollments WHERE id=3;



 

----------------------------------------------------
 7-  جلب عدد الطلاب الكلي في قاعدة البيانات 
----------------------------------------------------    


  SELECT COUNT(*) AS total_student FROM students;





-------------------------------------------------------------
 8-   Introduction to MySQL  عرض كل الطلاب المسجلين في كورس 
-------------------------------------------------------------    


 SELECT (SELECT concat(fname," ",lname) from students s 
 WHERE s.id = e.student_id ) AS student_name FROM enrollments e
 WHERE e.course_id = (SELECT id FROM courses  WHERE title= "introduction to MySQL");
  

  -- Another solution using JOIN


SELECT
    CONCAT(fname, " ", lname),
    c.title course_name
FROM
    students s
JOIN enrollments e ON
    s.id = e.student_id
JOIN courses c ON
    c.id = e.course_id
WHERE
    c.title = "introduction to MySQL";




-------------------------------------------------------------------------
 9-  (فقط  Subquery باستخدام ) عرض كل الكورسات مع اسم المدرس المسؤول 
-------------------------------------------------------------------------


 SELECT title AS course_name , (SELECT concat(fname," ",lname) FROM instructors WHERE instructors.id = courses.instructor_id ) AS instructor_name FROM courses;



  -- Another solution using JOIN


SELECT
    CONCAT(fname, " ", lname) instructor_name,
    c.title course_name
FROM
    instructors i
JOIN courses c ON
    i.id = c.instructor_id;





-------------------------------------------------------------------------------
 10- ( GROUP BY أو Subquery باستخدام )  حساب عدد الطلاب المسجلين في كل كورس 
-------------------------------------------------------------------------------  


 SELECT  (SELECT title FROM courses WHERE courses.id = enrollments.course_id ) student_course , COUNT(student_id) AS student_count  FROM enrollments
 GROUP BY course_id;


 -- Another solution using JOIN


SELECT
    c.title course_name,COUNT(e.student_id) AS total_student
FROM
    students s
JOIN enrollments e ON
    s.id = e.student_id
JOIN courses c ON
    c.id = e.course_id
GROUP BY
    e.course_id;



---------------------------------------------------------------------
 11- (بناءً على اسمه) عرض قائمة الكورسات التي سجل فيها طالب محدد 
---------------------------------------------------------------------



 SELECT (SELECT title FROM courses WHERE courses.id = enrollments.course_id ) student_course  FROM enrollments
WHERE enrollments.student_id =  (SELECT id FROM students WHERE fname ="amr" AND lname="yousef");


 -- Another solution using JOIN

SELECT
    CONCAT(s.fname, " ", s.lname) student_name,
    c.title course_name
FROM
    students s
JOIN enrollments e ON
    s.id = e.student_id
JOIN courses c ON
    c.id = e.course_id
WHERE
    s.fname = "amir" AND s.lname = "yousef";




-------------------------------------------------------
 12- عرض كل المدرسين الذين يدرّسون أكثر من كورس واحد 
-------------------------------------------------------


 
 SELECT (SELECT concat(fname,' ' ,lname) FROM instructors WHERE id =courses.instructor_id) instructor_name , COUNT(instructor_id) AS course_count FROM courses   
 GROUP BY instructor_id  HAVING course_count > 1;



 -- Another solution using JOIN

SELECT
    CONCAT(i.fname, " ", i.lname) instructor_name,
     COUNT(c.instructor_id) course_count
FROM
    instructors i
JOIN courses c ON
    i.id = c.instructor_id
GROUP BY
    c.instructor_id
HAVING
     course_count > 1;





--------------------------------------------
 13- عرض الطلاب الذين لم يسجلوا في أي كورس 
--------------------------------------------


SELECT concat(fname," ",lname) AS student_name from students WHERE id NOT IN (SELECT student_id FROM enrollments );




-------------------------------------------------------
 14- عرض كل المدرسين الذين يدرّسون أكثر من كورس واحد 
-------------------------------------------------------


SELECT
    (
    SELECT
        CONCAT(i.fname, " ", i.lname) 
    FROM
        instructors i
    WHERE
        id = c.instructor_id
) AS instructor_name ,
COUNT(c.instructor_id) course_count
FROM
    courses c
GROUP BY
    c.instructor_id;



 -- Another solution using JOIN


SELECT
    CONCAT(i.fname, " ", i.lname) instructor_name,
     COUNT(c.instructor_id) course_count
FROM
    instructors i
JOIN courses c ON
    i.id = c.instructor_id
GROUP BY
    c.instructor_id;






-------------------------------------------------------
 15- حساب متوسط عدد الطلاب في الكورس الواحد
-------------------------------------------------------


SELECT
    AVG(student_count) AS avg_students_per_course
FROM
    (
    SELECT
        COUNT(e.student_id) AS student_count
    FROM
        courses c
    LEFT JOIN enrollments e ON
        c.id = e.course_id
    GROUP BY
        e.student_id
) AS students_per_course;





