<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-10 00:42:31 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-05-10 00:42:31 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-05-10 00:42:31 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-05-10 00:42:31 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-05-10 02:21:36 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=61  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-05-10 02:21:36 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
ERROR - 2021-05-10 02:47:58 --> Severity: Notice --> Trying to get property 'Headline' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 9
ERROR - 2021-05-10 02:47:58 --> Severity: Notice --> Trying to get property 'Date' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 10
ERROR - 2021-05-10 02:47:58 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 12
ERROR - 2021-05-10 03:28:08 --> Severity: Notice --> Trying to get property 'Headline' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 9
ERROR - 2021-05-10 03:28:08 --> Severity: Notice --> Trying to get property 'Date' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 10
ERROR - 2021-05-10 03:28:08 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 12
ERROR - 2021-05-10 10:29:50 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-05-10 10:29:53 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-05-10 10:39:40 --> Severity: Notice --> Trying to get property 'Headline' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 9
ERROR - 2021-05-10 10:39:40 --> Severity: Notice --> Trying to get property 'Date' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 10
ERROR - 2021-05-10 10:39:40 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/NoticeOpen.php 12
ERROR - 2021-05-10 12:06:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-05-10 12:07:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-05-10 12:14:58 --> 404 Page Not Found: Env/index
ERROR - 2021-05-10 12:15:12 --> 404 Page Not Found: Wp_content/index
ERROR - 2021-05-10 12:49:45 --> Severity: Notice --> Undefined variable: title /home/expresstechbd/public_html/bcc/application/views/user/dashboard.php 132
ERROR - 2021-05-10 15:22:02 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-05-10 15:22:02 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-05-10 15:22:02 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-05-10 15:22:02 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-05-10 16:11:39 --> 404 Page Not Found: Service/UserProfile
ERROR - 2021-05-10 16:12:25 --> 404 Page Not Found: Setting/eet.google.com
ERROR - 2021-05-10 16:13:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and att.SubjectID= ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID= and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2021-05-10 16:13:31 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2021-05-10 20:42:58 --> 404 Page Not Found: Wp_content/db_cache.php
ERROR - 2021-05-10 20:43:39 --> 404 Page Not Found: Wp_content/db_cache.php
ERROR - 2021-05-10 21:30:18 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-05-10 21:30:18 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-05-10 21:30:18 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-05-10 21:30:18 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-05-10 23:53:55 --> 404 Page Not Found: Robotstxt/index
