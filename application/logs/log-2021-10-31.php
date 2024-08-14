<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-31 09:53:37 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 09:57:39 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 09:59:47 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 389
ERROR - 2021-10-31 10:00:06 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 389
ERROR - 2021-10-31 10:00:16 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 389
ERROR - 2021-10-31 10:31:35 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 10:32:11 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 10:32:21 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 10:32:41 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 10:49:55 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 10:50:00 --> Severity: error --> Exception: Call to undefined method Exam_Model::RealtimeExamInfo() /home/expresstechbd/public_html/bcc/application/controllers/Exam.php 190
ERROR - 2021-10-31 10:50:12 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 13:40:13 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:00:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'in(0,1)  order by Id desc' at line 1 - Invalid query: SELECT * from batch where batch.isPublic=in(0,1)  order by Id desc
ERROR - 2021-10-31 14:00:56 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 22
ERROR - 2021-10-31 14:08:27 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:09:14 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:42:19 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:44:19 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:45:47 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:47:01 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:47:15 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 14:48:31 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 15:20:17 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 15:20:36 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 16:22:34 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 16:22:43 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 16:23:23 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 19:41:50 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 21:08:53 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:18:08 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:18:34 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:20:15 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:21:05 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:24:42 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:27:42 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:28:06 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:34:02 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 22:45:06 --> 404 Page Not Found: Dist/js
ERROR - 2021-10-31 23:33:22 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=69  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-10-31 23:33:22 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 259
