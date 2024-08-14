<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-13 01:36:44 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-13 01:36:45 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-13 09:11:15 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-13 11:03:08 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-13 14:56:00 --> 404 Page Not Found: Dist/js
ERROR - 2022-10-13 15:01:01 --> 404 Page Not Found: Dist/js
ERROR - 2022-10-13 15:02:06 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-13 15:02:06 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
ERROR - 2022-10-13 15:02:45 --> 404 Page Not Found: Dist/js
ERROR - 2022-10-13 15:12:14 --> 404 Page Not Found: Dist/js
ERROR - 2022-10-13 17:15:44 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-13 17:15:44 --> 404 Page Not Found: Robotstxt/index
