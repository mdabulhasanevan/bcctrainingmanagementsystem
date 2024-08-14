<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-02 05:45:28 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-01-02 17:18:04 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *  , (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=53  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2020-01-02 17:18:04 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 207
ERROR - 2020-01-02 17:25:13 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 305
ERROR - 2020-01-02 17:25:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2020-01-02 17:25:14 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-01-02 17:43:37 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *  , (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=53  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2020-01-02 17:43:37 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 207
ERROR - 2020-01-02 17:59:15 --> 404 Page Not Found: Uploads/users
ERROR - 2020-01-02 17:59:15 --> 404 Page Not Found: Uploads/users
ERROR - 2020-01-02 21:51:45 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-01-02 22:40:00 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-01-02 23:00:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID= ORDER BY att.Date, st.RegNO
ERROR - 2020-01-02 23:00:12 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2020-01-02 23:00:20 --> 404 Page Not Found: Dist/css
