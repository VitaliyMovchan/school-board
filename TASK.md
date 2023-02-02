SCHOOL BOARD TEST

Description:
	You have to design a system that is responsible for the managing the grades for a list
of students.
	You should be able to calculate the average of the grades for a given student,
identify if he has passed or failed and return the student’s statistic.
	Each school board can have a different rule to calculate if he has passed or not and
in which format (JSON, XML) it return results.

Notes:
- A student is registered with only one school board.
- A student can have 1 to 4 grades.
- Implement two school boards, CSM and CSMB.
- CSM considers pass if the average is bigger or equal to 7 and fail otherwise. Returns
  JSON format.
- CSMB discards the lowest grade, if you have more than 2 grades, and considers pass if
  his biggest grade is bigger than 8. Returns XML format.
- Each student result, either XML or JSON, will contain the student id, name, list of
  grades, average and final result (Fail, Pass).
- You can use SQLite (MySQl, PostreSQL, ...) if you want, for the persistence (provide the SQL file).
- Entry point of your app should be through HTTP request. If I type:

	domain-of-your-app.test/students/1
		or
 	domain-of-your-app.test?student=1

 	(whatever you want of these two)


It should return repot of student with ID of 1 for example? with the fields provided above.

Guidelines:
1. You MUST use plain PHP (you can use libraries, only if added via composer)
2. Use composer loader
3. Please send a github repo with the code.
4. Make sure the code actually runs. By that, I mean fork a fresh copy of the project from
github, run composer install (if needed), import database file (provided in github) and then test the app.
5. Don't have the entire project in one git commit. have multiple commits for different changes. It'll be even better (but optional) if very small feature has its own branch that is merged back into develop (git flow).
6. It would be superb if OOP and SOLID standards are satisfied.

Predicted time tom work this test is 5 hours.