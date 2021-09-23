http://111.184.180.146/phpmyadmin/
http://111.184.180.146/final/
http://111.184.180.146/final/index.php
http://111.184.180.146/final/login.php

id/account/password/admin

1/admin /123456/admin

2/apple /123456/teacher
3/banana/123456/teacher
4/mango /123456/teacher

5/dog   /123456/student
6/cat   /123456/student
7/pig   /123456/student

時間代碼
[M] Mon [T] Tue [W] Wed [R] Thr [F] Fri [S] Sat
[1] 08:00 [2] 09:00 [3] 10:00 [4] 11:00 [n] 12:00
[5] 13:00 [6] 14:00 [7] 15:00 [8] 16:00 [9] 17:00
[a] 18:30 [b] 19:30 [c] 20:30
e.g. R4R7R8 = 四 14:00,15:00,16:00

CREATE VIEW 學生點名單 AS SELECT
    e.course_id,
    c.course_name,
    c.course_time,
    c.course_max,
    c.course_people,
    u.admin,
    e.id,
    u.name
FROM
    enrollment AS e
JOIN `course` AS c
ON
    e.course_id = c.course_id
JOIN `user` AS u
ON
    e.id = u.id
WHERE u.admin = 'student'
group BY e.id ASC

CREATE VIEW 教師開課1 AS SELECT
    e.id,
    u.name,
    e.course_id,
    c.course_name,
    c.course_time,
    c.course_max,
    c.course_people,
    c.classroom_id
FROM
    `enrollment` AS e
JOIN `course` AS c
ON
    e.course_id = c.course_id
JOIN `user` AS u
ON
    e.id = u.id
WHERE u.admin = 'teacher'
order BY e.id ASC

CREATE VIEW 課表_教師 AS SELECT
    e.id,
    u.name,
    e.course_id,
    c.course_name,
    c.course_time,
    c.course_max,
    c.course_people,
    c.classroom_id
FROM
    `enrollment` AS e
JOIN `course` AS c
ON
    e.course_id = c.course_id
JOIN `user` AS u
ON
    e.id = u.id
WHERE u.admin = 'student'
group BY e.id ASC
