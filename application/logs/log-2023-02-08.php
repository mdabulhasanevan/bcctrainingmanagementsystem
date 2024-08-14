<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-08 00:03:37 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 00:04:11 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2023-02-08 00:04:11 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 305
ERROR - 2023-02-08 00:04:18 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2023-02-08 00:04:18 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 305
ERROR - 2023-02-08 01:32:29 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-08 04:09:41 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-08 04:09:48 --> 404 Page Not Found: Sitemapxml/index
ERROR - 2023-02-08 08:01:23 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-08 08:53:00 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-08 16:10:44 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 16:12:00 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 16:15:35 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 16:16:13 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 21:15:32 --> 404 Page Not Found: Dist/img
ERROR - 2023-02-08 21:15:32 --> 404 Page Not Found: Dist/img
ERROR - 2023-02-08 22:42:21 --> Severity: Warning --> Use of undefined constant m - assumed 'm' (this will throw an Error in a future version of PHP) /home/expresstechbd/public_html/bcc/application/models/News_model.php 59
ERROR - 2023-02-08 22:54:21 --> Severity: Notice --> Undefined variable: Info /home/expresstechbd/public_html/bcc/application/views/WebView/Index.php 178
ERROR - 2023-02-08 22:54:21 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/WebView/Index.php 178
ERROR - 2023-02-08 22:57:45 --> Severity: Notice --> Undefined property: Webview::$NM /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 33
ERROR - 2023-02-08 22:57:45 --> Severity: error --> Exception: Call to a member function GetAllNewsAndNotice() on null /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 33
ERROR - 2023-02-08 22:57:45 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2023-02-08 22:58:24 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=images order by BrId DESC
ERROR - 2023-02-08 22:58:24 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 22:58:24 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 22:58:24 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 22:58:24 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 22:58:24 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:03:30 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=images order by BrId DESC
ERROR - 2023-02-08 23:03:30 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:03:30 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 23:03:30 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:03:31 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 23:03:31 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:07:37 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=images order by BrId DESC
ERROR - 2023-02-08 23:07:37 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:07:37 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 23:07:37 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:07:37 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2023-02-08 23:07:37 --> Severity: error --> Exception: Call to a member function row() on bool /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2023-02-08 23:11:41 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/controllers/Webview.php:247) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2023-02-08 23:11:41 --> Severity: Compile Error --> Cannot redeclare Webview::NoticeOpen() /home/expresstechbd/public_html/bcc/application/controllers/Webview.php 247
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Undefined variable: MyNews /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 9
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Trying to get property 'Headline' of non-object /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 9
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Undefined variable: MyNews /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 10
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Trying to get property 'Date' of non-object /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 10
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Undefined variable: MyNews /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 12
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 12
ERROR - 2023-02-08 23:12:12 --> Severity: Notice --> Undefined variable: MyNews /home/expresstechbd/public_html/bcc/application/views/WebView/NoticeOpen.php 14
ERROR - 2023-02-08 23:17:04 --> Severity: Warning --> Use of undefined constant m - assumed 'm' (this will throw an Error in a future version of PHP) /home/expresstechbd/public_html/bcc/application/models/News_model.php 59
ERROR - 2023-02-08 23:19:42 --> 404 Page Not Found: AdmissionReg/index
ERROR - 2023-02-08 23:20:05 --> 404 Page Not Found: AdmissionReg/index
ERROR - 2023-02-08 23:32:44 --> Severity: Notice --> Undefined index: Photo /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:32:44 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:33:11 --> Severity: Notice --> Undefined index: Photo /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:33:11 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:35:44 --> Severity: Notice --> Undefined index: Photo /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:35:44 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:36:04 --> Severity: Notice --> Undefined property: stdClass::$Photo /home/expresstechbd/public_html/bcc/application/controllers/Auth.php 99
ERROR - 2023-02-08 23:36:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/application/controllers/Auth.php 107
ERROR - 2023-02-08 23:36:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2023-02-08 23:36:53 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:36:53 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:36:56 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:36:56 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:37:06 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:37:06 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 158
ERROR - 2023-02-08 23:37:21 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-08 23:39:06 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 164
ERROR - 2023-02-08 23:39:06 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 164
ERROR - 2023-02-08 23:40:11 --> Severity: Warning --> A non-numeric value encountered /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 164
ERROR - 2023-02-08 23:44:35 --> 404 Page Not Found: Uploads/users
