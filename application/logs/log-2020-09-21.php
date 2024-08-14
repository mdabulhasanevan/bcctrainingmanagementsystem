<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-21 02:35:27 --> 404 Page Not Found: Adminer_370php/index
ERROR - 2020-09-21 06:48:09 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-09-21 08:17:37 --> 404 Page Not Found: Auth/admin
ERROR - 2020-09-21 08:20:06 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=49  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2020-09-21 08:20:06 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2020-09-21 09:31:48 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-09-21 09:31:54 --> 404 Page Not Found: Robotstxt/index
