<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-12 00:44:20 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-12 07:52:17 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-12 13:47:35 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-08-12 13:47:39 --> 404 Page Not Found: Sitemapxml/index
ERROR - 2022-08-12 17:33:02 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2022-08-12 17:33:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=79 and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2022-08-12 17:33:02 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2022-08-12 20:45:27 --> 404 Page Not Found: Robotstxt/index
