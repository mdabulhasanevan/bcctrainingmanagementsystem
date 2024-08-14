<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-16 11:02:31 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/VisitorModel.php 26
ERROR - 2023-01-16 11:02:31 --> Query error: Column 'User' cannot be null - Invalid query: INSERT INTO `VisitorHistory` (`URI`, `IP`, `Date`, `User`, `Title`) VALUES ('/user/index', '43.229.12.234', '2023-01-16 11:02:31', NULL, '')
ERROR - 2023-01-16 11:02:32 --> Severity: Notice --> Undefined index: Name /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 138
ERROR - 2023-01-16 11:02:32 --> Severity: Notice --> Undefined index: QuickMenu /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2023-01-16 11:02:32 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 178
ERROR - 2023-01-16 11:02:32 --> Severity: Notice --> Undefined index: Menu1 /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2023-01-16 11:02:32 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Include/LeftMenuAdmin.php 195
ERROR - 2023-01-16 14:00:45 --> 404 Page Not Found: StudentOpen/index.html
ERROR - 2023-01-16 18:41:04 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2023-01-16 18:41:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=84 and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2023-01-16 18:41:04 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2023-01-16 21:49:03 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-01-16 21:49:03 --> 404 Page Not Found: Sitemap/index
ERROR - 2023-01-16 21:49:09 --> 404 Page Not Found: Sitemaptxt/index
