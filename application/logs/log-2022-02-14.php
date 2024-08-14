<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-14 12:53:07 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-02-14 12:53:20 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-02-14 15:13:23 --> Query error: Unknown column 'BatchID2' in 'field list' - Invalid query: INSERT INTO `setexam` (`Status`, `BatchID2`, `BatchID`, `ExamNameID`, `ExamCollectionID`, `Time`, `MCQMarks`, `PracticalMarks`, `ExDate`, `TheoryMarks`) VALUES ('1', '68', '68', '7', '14', '45', '30', '70', '2022-02-17', '0')
ERROR - 2022-02-14 15:19:24 --> 404 Page Not Found: Student/UserProfile
ERROR - 2022-02-14 15:20:25 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-02-14 15:20:28 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-02-14 15:20:32 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-02-14 16:30:25 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 31
ERROR - 2022-02-14 16:30:25 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '59.153.18.174', '2022-02-14 16:30:25', NULL, 'Login')
ERROR - 2022-02-14 16:30:25 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 137
ERROR - 2022-02-14 16:30:25 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
ERROR - 2022-02-14 16:30:25 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
ERROR - 2022-02-14 16:45:47 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=68  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-02-14 16:45:47 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 260
ERROR - 2022-02-14 16:46:07 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=68  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-02-14 16:46:07 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 260
ERROR - 2022-02-14 16:56:39 --> 404 Page Not Found: Student/UserProfile
ERROR - 2022-02-14 16:57:09 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-02-14 16:57:15 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2022-02-14 23:31:21 --> Severity: error --> Exception: Too few arguments to function User_Model::StudentExamAttendHistory(), 1 passed in /home/expresstechbd/public_html/bcc/application/controllers/StudentOpen.php on line 58 and exactly 2 expected /home/expresstechbd/public_html/bcc/application/models/User_Model.php 73
ERROR - 2022-02-14 23:32:38 --> Query error: Column 'GEO' cannot be null - Invalid query: INSERT INTO `StudentExamAttendHistory` (`SID`, `ExamID`, `Date`, `IP`, `GEO`) VALUES ('50', '15', '2022-02-14 23:32:38', '103.230.107.17', NULL)
ERROR - 2022-02-14 23:33:48 --> 404 Page Not Found: Dist/js
ERROR - 2022-02-14 23:40:32 --> 404 Page Not Found: Dist/js
ERROR - 2022-02-14 23:41:53 --> 404 Page Not Found: Dist/js
ERROR - 2022-02-14 23:42:48 --> Query error: Column 'GEO' cannot be null - Invalid query: INSERT INTO `StudentExamAttendHistory` (`SID`, `ExamID`, `Date`, `IP`, `GEO`) VALUES ('50', '15', '2022-02-14 23:42:48', '103.230.107.17', NULL)
ERROR - 2022-02-14 23:43:09 --> Query error: Column 'GEO' cannot be null - Invalid query: INSERT INTO `StudentExamAttendHistory` (`SID`, `ExamID`, `Date`, `IP`, `GEO`) VALUES ('50', '15', '2022-02-14 23:43:09', '103.230.107.17', NULL)
ERROR - 2022-02-14 23:57:51 --> 404 Page Not Found: Dist/js
ERROR - 2022-02-14 23:58:59 --> 404 Page Not Found: Dist/js
