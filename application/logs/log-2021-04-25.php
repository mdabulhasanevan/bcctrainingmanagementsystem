<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-25 10:58:51 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-04-25 10:58:59 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-04-25 14:24:19 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-04-25 18:16:49 --> 404 Page Not Found: StudentOpen/index
ERROR - 2021-04-25 19:38:15 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 19:43:18 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 19:45:27 --> Severity: Notice --> Undefined property: stdClass::$MCQ3 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 63
ERROR - 2021-04-25 19:45:27 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 19:58:55 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:01:11 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:07:19 --> Severity: Notice --> Undefined property: stdClass::$MCQ3 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 63
ERROR - 2021-04-25 20:07:19 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:17:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 1 - Invalid query: Insert into mcqandans(MCQ,QId,Answer)values('<img href="mylage.gif" alt="mylage"/>',556,)
ERROR - 2021-04-25 20:18:26 --> Severity: Notice --> Undefined property: stdClass::$MCQ3 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 63
ERROR - 2021-04-25 20:18:26 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:23:57 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:25:00 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:35:58 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:38:17 --> Severity: Notice --> Undefined property: stdClass::$MCQ4 /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 64
ERROR - 2021-04-25 20:49:26 --> 404 Page Not Found: Dist/css
ERROR - 2021-04-25 23:02:36 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-04-25 23:02:36 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
