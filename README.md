**Internshala National Wide Competition Runner up
**
Here's how to use expense manager created by Pragnya Ambekar.

Please download the entire  folder to the www folder in the wamp64
Create a database file "expense" in localhost/phpmyadmin
Import the expense.sql into expense database created above

Credentials are root and nothing

The database has the these components:

1) signup table:  id, name, email, phone, password

2) Plan  table:  id, title, from date, to date, Budget, Spent(Default 0), Number of people, creator's id(Foriegn key)

3) usernames table: id, names, plan_id(Foriegn Key)

4) expenses table: id, plan_id(Foriegn Key), Title, date, spent,person_id, img(Default NULL)

Budget Tracker components:

1) index.php: It is the main page where user comes first time.
2) styles.css: It has the CSS for the index.php 
3) about folder: It has the about.php and about.css files. They have content about the site.
4) bills folder: All the images uploaded by user in addexpense.php are stored here.
5) change_password folder: It has the change_password.php and change.css files. It changes the password of the user.
6) create folder: It contains the Add_new_plan.php and create.css. It creates a plan with budget and no.of people and send it to plan.php
7) expense_distribution: It shows the plan details and individual details of each person in the plan.
8) home: It has all the users plan in one place and a add button to add new plans
9) images : All the images used on this site are stored here.
10) includes : It contains the footers, headers are basic html code used in other php files
11) login: It has the login page and is used to verify user details before going to home
12) logout: It destroys the session when the user logs out
13) plan: It is used to add additional important details to the plan before sending it to the database
14) signup: It is used to add new users to the database with basic information about them
13) viewplan: Here, The user can view the details of a specific plan, Add new expenses to the plan or go to expense distribution page
