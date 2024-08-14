<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-10 03:19:58 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-10 09:55:34 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-10 09:55:34 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-10 15:52:39 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 26
ERROR - 2023-02-10 15:52:39 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '103.177.54.39', '2023-02-10 15:52:39', NULL, '')
ERROR - 2023-02-10 15:52:39 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2023-02-10 16:42:50 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-10 16:43:59 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-10 16:46:03 --> Severity: Notice --> Undefined variable: smallGender2 /home/expresstechbd/public_html/bcc/application/views/Student/CertificatePdfIndividual.php 94
ERROR - 2023-02-10 16:46:07 --> Severity: Notice --> Undefined property: stdClass::$BirthCirtificate /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 155
ERROR - 2023-02-10 16:46:07 --> Query error: Unknown column 'NID' in 'field list' - Invalid query: UPDATE `student` SET `Name` = 'Nusrat jahan', `RegNO` = '8888', `BatchID` = '9', `Mobile` = '8888', `Email` = 'abulhasanevan@gmail.com', `Session` = '2018/2019', `CalendarYear` = '2019', `Gender` = 'Female', `IsCertified` = '0', `CertificateNo` = '200', `IsPhysicalDisable` = '0', `PhysicalDetail` = 'okk', `ParticipantType` = '4', `CourseFee` = '6000', `StudentStatus` = '1', `AcademicQualification` = '1', `ParticipantDetail` = 'Pangkaz 22', `DOB` = '0000-00-00', `NID` = '12345678', `BirthCirtificate` = NULL
WHERE `SID` = '191'
ERROR - 2023-02-10 16:46:36 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-10 16:47:46 --> 404 Page Not Found: Dist/img
ERROR - 2023-02-10 16:47:46 --> 404 Page Not Found: Dist/img
ERROR - 2023-02-10 17:08:40 --> Severity: error --> Exception: Too few arguments to function Report::GetCurrentStatusReport(), 0 passed in /home/expresstechbd/public_html/bcc/system/core/CodeIgniter.php on line 532 and exactly 2 expected /home/expresstechbd/public_html/bcc/application/controllers/Report.php 111
ERROR - 2023-02-10 17:15:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.Id desc' at line 1 - Invalid query: SELECT b.*, OzBy.*,  (if(b.Status=1,'Not Start Yet',if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as StatusName, ct.Title as CourseTitleName, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar where b.isPublic=0 order by b.CourseTitle asc and b.Id desc
ERROR - 2023-02-10 17:15:54 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Setting_Model.php 21
ERROR - 2023-02-10 17:15:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.Id desc' at line 1 - Invalid query: SELECT b.*, OzBy.*,  (if(b.Status=1,'Not Start Yet',if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as StatusName, ct.Title as CourseTitleName, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar where b.isPublic=0 order by b.CourseTitle asc and b.Id desc
ERROR - 2023-02-10 17:15:57 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Setting_Model.php 21
ERROR - 2023-02-10 17:15:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.Id desc' at line 1 - Invalid query: SELECT b.*, OzBy.*,  (if(b.Status=1,'Not Start Yet',if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as StatusName, ct.Title as CourseTitleName, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar where b.isPublic=0 order by b.CourseTitle asc and b.Id desc
ERROR - 2023-02-10 17:15:59 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Setting_Model.php 21
ERROR - 2023-02-10 18:30:45 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 18:30:55 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 18:31:39 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 18:32:15 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:18:15 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:18:52 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:19:34 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:21:07 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:23:08 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:28:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:28:34 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:28:38 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:36:25 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:37:02 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:39:36 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:40:07 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:41:28 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:43:57 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:44:06 --> 404 Page Not Found: User/mail_all.html
ERROR - 2023-02-10 21:45:27 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:46:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:53:50 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 21:55:16 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:03:33 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:24:34 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:28:32 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:28:39 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:28:43 --> 404 Page Not Found: Dist/js
ERROR - 2023-02-10 22:31:03 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:37:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:40:16 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:40:58 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:41:22 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:42:51 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:42:59 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:43:58 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 22:44:28 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:09:30 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:15:30 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:18:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:19:03 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:20:10 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:20:43 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:21:49 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:23:04 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:24:19 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:26:00 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:26:43 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:28:27 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:30:37 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:30:47 --> Query error: Column count doesn't match value count at row 1 - Invalid query: INSERT into StudentbackupData SELECT * from student WHERE SID=1516
ERROR - 2023-02-10 23:33:38 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:34:38 --> Query error: Column count doesn't match value count at row 1 - Invalid query: INSERT into StudentbackupData SELECT * from student WHERE SID=1517
ERROR - 2023-02-10 23:36:24 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:41:48 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:41:56 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:42:00 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:46:05 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:48:56 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:49:29 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:52:59 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-10 23:53:00 --> Severity: error --> Exception: Class 'SoapClient' not found /home/expresstechbd/public_html/bcc/application/controllers/SMS.php 112
ERROR - 2023-02-10 23:54:53 --> 404 Page Not Found: Uploads/users
