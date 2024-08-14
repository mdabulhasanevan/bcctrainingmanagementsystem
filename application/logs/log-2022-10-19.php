<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-19 03:36:23 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-19 13:01:51 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-19 13:01:52 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-19 13:28:24 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-19 13:28:24 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
ERROR - 2022-10-19 21:38:32 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-19 21:38:32 --> 404 Page Not Found: Robotstxt/index
