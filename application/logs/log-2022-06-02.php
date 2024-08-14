<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-02 10:02:04 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 31
ERROR - 2022-06-02 10:02:04 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '43.229.12.234', '2022-06-02 10:02:04', NULL, 'Login')
ERROR - 2022-06-02 10:02:04 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 137
ERROR - 2022-06-02 10:02:04 --> Severity: Notice --> Undefined index: QuickMenu /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 177
ERROR - 2022-06-02 10:02:04 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 177
ERROR - 2022-06-02 10:02:04 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 194
ERROR - 2022-06-02 10:02:04 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 194
ERROR - 2022-06-02 11:42:47 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 11:42:55 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 11:45:24 --> 404 Page Not Found: Student/UserProfile
ERROR - 2022-06-02 11:48:40 --> 404 Page Not Found: Student/UserProfile
ERROR - 2022-06-02 12:12:13 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:12:24 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:26 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:29 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:30 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:30 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:31 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:15:57 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:16:04 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:20:58 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:21:03 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:21:07 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:21:10 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:21:19 --> 404 Page Not Found: Student/UserProfile
ERROR - 2022-06-02 12:25:34 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:25:40 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:26:10 --> 404 Page Not Found: Auth/PublicLogin
ERROR - 2022-06-02 12:26:44 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:27:56 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:28:09 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:28:27 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:28:47 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 12:46:31 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-06-02 14:39:29 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-06-02 16:22:06 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-06-02 16:22:06 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 261
ERROR - 2022-06-02 16:22:41 --> 404 Page Not Found: Dist/js
ERROR - 2022-06-02 16:34:55 --> Severity: Notice --> Undefined variable: Result /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 171
ERROR - 2022-06-02 16:34:55 --> Severity: Notice --> Trying to get property 'AllDetail' of non-object /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 171
ERROR - 2022-06-02 16:37:33 --> 404 Page Not Found: Dist/js
ERROR - 2022-06-02 16:58:51 --> Severity: Notice --> Undefined variable: Result /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 171
ERROR - 2022-06-02 16:58:51 --> Severity: Notice --> Trying to get property 'AllDetail' of non-object /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 171
ERROR - 2022-06-02 16:59:02 --> 404 Page Not Found: Dist/js
