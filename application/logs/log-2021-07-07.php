<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-07 05:54:27 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-07 09:57:50 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-07 09:57:53 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-07 12:56:55 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2021-07-07 13:34:50 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=64  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-07-07 13:34:50 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-07-07 14:12:17 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-07-07 14:12:17 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-07-07 18:54:26 --> 404 Page Not Found: Uploads/users
ERROR - 2021-07-07 18:54:26 --> 404 Page Not Found: Uploads/users
ERROR - 2021-07-07 18:54:27 --> 404 Page Not Found: Uploads/users
ERROR - 2021-07-07 22:44:52 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 137
ERROR - 2021-07-07 22:44:52 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
ERROR - 2021-07-07 22:44:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
