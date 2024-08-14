<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-26 21:05:42 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 21:05:55 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 79
ERROR - 2021-09-26 22:21:33 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-09-26 22:21:33 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-09-26 22:23:46 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:23:54 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 79
ERROR - 2021-09-26 22:25:14 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 79
ERROR - 2021-09-26 22:26:00 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:26:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2021-09-26 22:26:08 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:26:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2021-09-26 22:26:22 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:26:22 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2021-09-26 22:26:48 --> Severity: error --> Exception: Call to undefined function mysqli_init() /home/expresstechbd/public_html/bcc/system/database/drivers/mysqli/mysqli_driver.php 135
ERROR - 2021-09-26 22:27:09 --> Severity: error --> Exception: Call to undefined function mysqli_init() /home/expresstechbd/public_html/bcc/system/database/drivers/mysqli/mysqli_driver.php 135
ERROR - 2021-09-26 22:27:12 --> Severity: error --> Exception: Call to undefined function mysqli_init() /home/expresstechbd/public_html/bcc/system/database/drivers/mysqli/mysqli_driver.php 135
ERROR - 2021-09-26 22:27:31 --> Severity: error --> Exception: Call to undefined function mysqli_init() /home/expresstechbd/public_html/bcc/system/database/drivers/mysqli/mysqli_driver.php 135
ERROR - 2021-09-26 22:28:20 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:28:30 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 137
ERROR - 2021-09-26 22:28:30 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
ERROR - 2021-09-26 22:28:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 171
ERROR - 2021-09-26 22:29:08 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2021-09-26 22:29:12 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 79
ERROR - 2021-09-26 22:30:51 --> Severity: Warning --> time() expects exactly 0 parameters, 3 given /home/expresstechbd/public_html/bcc/application/models/User_Model.php 79
