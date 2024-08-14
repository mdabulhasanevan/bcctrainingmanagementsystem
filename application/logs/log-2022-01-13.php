<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-13 13:07:06 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-01-13 21:56:02 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=69  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-01-13 21:56:02 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 260
ERROR - 2022-01-13 22:02:04 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2022-01-13 22:02:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=68 and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2022-01-13 22:02:04 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2022-01-13 22:22:22 --> Severity: Notice --> Undefined variable: slide /home/expresstechbd/public_html/bcc/application/views/Include/Header.php 68
ERROR - 2022-01-13 22:22:22 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:22:22 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:22:22 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:22:22 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:22:22 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:22:22 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:22:24 --> 404 Page Not Found: Home/images
ERROR - 2022-01-13 22:22:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:22:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:23:07 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:23:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:23:07 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:23:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:23:07 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:23:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:23:08 --> 404 Page Not Found: Home/images
ERROR - 2022-01-13 22:23:08 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:23:08 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:24:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:24:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:24:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:24:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:24:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:24:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:24:24 --> 404 Page Not Found: Home/images
ERROR - 2022-01-13 22:24:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:24:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:25:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:25:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2022-01-13 22:25:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:25:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2022-01-13 22:25:23 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:25:23 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2022-01-13 22:25:24 --> 404 Page Not Found: Home/images
ERROR - 2022-01-13 22:25:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:25:24 --> 404 Page Not Found: Home/img
ERROR - 2022-01-13 22:28:00 --> Severity: Compile Error --> Cannot redeclare Webview::PrivacyPolicy() /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 140
ERROR - 2022-01-13 22:28:27 --> Severity: Compile Error --> Cannot redeclare Webview::PrivacyPolicy() /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 140
ERROR - 2022-01-13 22:29:22 --> Severity: Compile Error --> Cannot redeclare Webview::PrivacyPolicy() /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 140
ERROR - 2022-01-13 22:30:41 --> Severity: Compile Error --> Cannot redeclare Webview::PrivacyPolicy() /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 139
