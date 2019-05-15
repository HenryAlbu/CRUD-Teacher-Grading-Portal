# CRUD Teacher Grading Portal

Gradester is a portal that both students and teaches can you to organize and keep track of  assignment grades for their class. Teachers will have the ability to select specific students and add  grades. Students will be able to access the portal to see the grades that have been added. The portal will react differently based on whether the user logged in is a teacher or student. For example students will not be able to edit or see other students grades. The teacher side of the portal they will be able to see all the students that have registered on the system and will be able to add their grades and add assignments to a particular student. The portal will also have a create account button that will allow the registration of new teachers and students. The system will also allow the allocation of a student into a class.
<a target="_blank" href="https://github.com/HenryAlbu/CRUD-Teacher-Grading-Portal/blob/master/project.pdf">Documentation</a>
<br>
<p><b> INDEX.PHP </b></p>
<img src="https://i.imgur.com/HdU6FZF.png" width="50%"/>

<p><b>TEACHERS.PHP</b></p>
<img src="https://i.imgur.com/CgJaQlQ.png" width="50%" />

<p><b>CONTROLLER.PHP</b></p>
<img src="https://i.imgur.com/RprlhAk.png" width="50%" />

<h1>Step 1</h1>
<p>create a mysql database named "C354_balbuquerque" and import the C354_balbuquerque.sql file</p>

<h1>Step 2</h1>
<p>Edit line 2 of model.php to reflect your mysql information</p>

```php
$conn = mysqli_connect('localhost', 'balbuquerque', 'balbuquerque', 'C354_balbuquerque');
```
