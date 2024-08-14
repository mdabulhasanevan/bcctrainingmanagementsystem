<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-15 02:43:51 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-15 02:43:52 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-06-15 02:43:52 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-06-15 02:43:52 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-06-15 02:43:52 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-06-15 11:28:41 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-15 11:29:03 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-15 12:34:50 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-06-15 12:34:50 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-06-15 12:34:50 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-06-15 12:34:50 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-06-15 15:05:12 --> 404 Page Not Found: Env/index
ERROR - 2021-06-15 15:09:11 --> 404 Page Not Found: Env/index
ERROR - 2021-06-15 20:11:32 --> 404 Page Not Found: Env/index
ERROR - 2021-06-15 20:46:46 --> 404 Page Not Found: Env/index
ERROR - 2021-06-15 20:48:35 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 20:48:52 --> 404 Page Not Found: Env/index
ERROR - 2021-06-15 20:49:09 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 20:58:23 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 20:58:29 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 20:59:16 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 20:59:21 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 21:00:28 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 21:00:31 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuStudent.php 137
ERROR - 2021-06-15 21:23:32 --> 404 Page Not Found: StudentOpen/eet.google.com
ERROR - 2021-06-15 21:24:14 --> 404 Page Not Found: StudentOpen/meet.google.com
ERROR - 2021-06-15 21:25:59 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-06-15 21:25:59 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
