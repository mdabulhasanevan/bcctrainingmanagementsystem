<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-13 10:20:27 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-04-13 10:20:30 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-04-13 11:49:37 --> 404 Page Not Found: Dist/css
ERROR - 2021-04-13 12:23:02 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-04-13 12:23:02 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-04-13 16:45:05 --> 404 Page Not Found: Env/index
ERROR - 2021-04-13 16:45:22 --> 404 Page Not Found: Env/index
ERROR - 2021-04-13 18:55:59 --> 404 Page Not Found: Dist/css
