<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-12 03:31:31 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 26
ERROR - 2022-10-12 03:31:31 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '103.230.107.6', '2022-10-12 03:31:31', NULL, '')
ERROR - 2022-10-12 03:31:32 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 138
ERROR - 2022-10-12 03:31:32 --> Severity: Notice --> Undefined index: QuickMenu /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2022-10-12 03:31:32 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2022-10-12 03:31:32 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2022-10-12 03:31:32 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2022-10-12 04:13:01 --> 404 Page Not Found: Wordpress/index
ERROR - 2022-10-12 04:48:29 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-12 04:48:29 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-12 10:23:23 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-12 10:23:46 --> 404 Page Not Found: App_adstxt/index
ERROR - 2022-10-12 10:23:46 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-10-12 11:48:47 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 26
ERROR - 2022-10-12 11:48:47 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '59.153.18.174', '2022-10-12 11:48:47', NULL, '')
ERROR - 2022-10-12 11:48:48 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 138
ERROR - 2022-10-12 11:48:48 --> Severity: Notice --> Undefined index: QuickMenu /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2022-10-12 11:48:48 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2022-10-12 11:48:48 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2022-10-12 11:48:48 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2022-10-12 16:17:26 --> 404 Page Not Found: Wordpress/index
ERROR - 2022-10-12 21:25:24 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-12 21:25:24 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
ERROR - 2022-10-12 21:40:47 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-12 21:40:47 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
ERROR - 2022-10-12 21:51:16 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-12 21:51:16 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
