<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-19 00:44:13 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-06-19 00:44:13 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-06-19 05:05:27 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-19 11:34:44 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-19 11:34:53 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-06-19 21:11:39 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-06-19 21:11:39 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-06-19 21:17:11 --> 404 Page Not Found: Dist/js
ERROR - 2021-06-19 21:56:18 --> 404 Page Not Found: Wp_loginphp/index
ERROR - 2021-06-19 21:56:18 --> 404 Page Not Found: Wordpress/wp_login.php
ERROR - 2021-06-19 21:56:18 --> 404 Page Not Found: Blog/wp_login.php
ERROR - 2021-06-19 21:56:18 --> 404 Page Not Found: Wp/wp_login.php
