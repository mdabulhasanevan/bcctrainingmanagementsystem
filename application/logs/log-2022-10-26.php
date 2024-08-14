<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-26 08:42:12 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-26 08:42:15 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-26 16:07:27 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-26 16:07:27 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-10-26 18:58:36 --> 404 Page Not Found: Env/index
ERROR - 2022-10-26 22:19:33 --> 404 Page Not Found: StudentOpen/...
ERROR - 2022-10-26 22:32:32 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2022-10-26 22:32:32 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 291
ERROR - 2022-10-26 22:32:38 --> 404 Page Not Found: StudentOpen/img_snow_wide.jpg
ERROR - 2022-10-26 22:32:38 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
ERROR - 2022-10-26 22:58:36 --> 404 Page Not Found: StudentOpen/img_nature_wide.jpg
ERROR - 2022-10-26 22:58:36 --> 404 Page Not Found: StudentOpen/img_snow_wide.jpg
ERROR - 2022-10-26 22:58:36 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
ERROR - 2022-10-26 22:59:56 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
ERROR - 2022-10-26 23:54:13 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
ERROR - 2022-10-26 23:58:01 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
ERROR - 2022-10-26 23:58:55 --> 404 Page Not Found: StudentOpen/img_mountains_wide.jpg
