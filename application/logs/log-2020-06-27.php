<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-27 13:32:32 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2020-06-27 13:32:32 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2020-06-27 13:32:32 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2020-06-27 13:32:32 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2020-06-27 18:32:31 --> 404 Page Not Found: Dist/css
ERROR - 2020-06-27 18:33:14 --> Query error: Unknown column 'BatchID2' in 'field list' - Invalid query: INSERT INTO `setexam` (`Status`, `BatchID2`, `BatchID`, `ExamNameID`, `Time`, `MCQMarks`, `ExDate`, `ExamCollectionID`) VALUES ('2', '62', '62', '14', '50', '50', '2020/06/29', '21')
ERROR - 2020-06-27 18:52:22 --> 404 Page Not Found: Dist/css
ERROR - 2020-06-27 19:50:04 --> 404 Page Not Found: Dist/css
ERROR - 2020-06-27 20:03:36 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=62  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2020-06-27 20:03:36 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
