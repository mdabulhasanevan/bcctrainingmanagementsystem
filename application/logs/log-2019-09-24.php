<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-24 11:13:36 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2019-09-24 11:13:36 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2019-09-24 11:13:36 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2019-09-24 11:13:36 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2019-09-24 11:13:36 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2019-09-24 11:13:36 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2019-09-24 11:13:36 --> 404 Page Not Found: Home/images
ERROR - 2019-09-24 11:13:36 --> 404 Page Not Found: Home/img
ERROR - 2019-09-24 11:13:36 --> 404 Page Not Found: Home/img
ERROR - 2019-09-24 11:29:46 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2019-09-24 11:29:46 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 6
ERROR - 2019-09-24 11:29:46 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2019-09-24 11:29:46 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 20
ERROR - 2019-09-24 11:29:46 --> Severity: Notice --> Undefined variable: Office /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2019-09-24 11:29:46 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/Footer.php 34
ERROR - 2019-09-24 11:29:46 --> 404 Page Not Found: Home/images
ERROR - 2019-09-24 11:29:47 --> 404 Page Not Found: Home/img
ERROR - 2019-09-24 11:29:47 --> 404 Page Not Found: Home/img
ERROR - 2019-09-24 11:44:35 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *  , (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=undefined and se.Status=3 ORDER BY st.RegNO asc
ERROR - 2019-09-24 11:44:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php:174) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-09-24 11:44:35 --> Severity: Error --> Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 174
ERROR - 2019-09-24 12:18:10 --> 404 Page Not Found: Dist/img
ERROR - 2019-09-24 12:21:36 --> 404 Page Not Found: Dist/img
ERROR - 2019-09-24 12:21:43 --> 404 Page Not Found: Dist/img
ERROR - 2019-09-24 12:21:44 --> 404 Page Not Found: Dist/img
ERROR - 2019-09-24 12:21:44 --> 404 Page Not Found: Dist/img
ERROR - 2019-09-24 14:37:19 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2019-09-24 14:37:19 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2019-09-24 14:37:19 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2019-09-24 14:37:19 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2019-09-24 16:32:14 --> 404 Page Not Found: Robotstxt/index
ERROR - 2019-09-24 19:15:17 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=images order by BrId DESC
ERROR - 2019-09-24 19:15:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/News_model.php:52) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-09-24 19:15:17 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2019-09-24 19:15:17 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2019-09-24 19:15:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/News_model.php:52) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-09-24 19:15:17 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2019-09-24 19:15:17 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT * FROM breakingnews WHERE BrId=img order by BrId DESC
ERROR - 2019-09-24 19:15:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/News_model.php:52) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-09-24 19:15:17 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/News_model.php 52
ERROR - 2019-09-24 22:02:50 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 218
ERROR - 2019-09-24 22:02:50 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-09-24 22:02:51 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-09-24 23:28:26 --> 404 Page Not Found: Robotstxt/index
