<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-19 10:17:17 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-01-19 10:17:18 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-01-19 13:37:34 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2023-01-19 13:37:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=68 and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2023-01-19 13:37:34 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2023-01-19 21:11:43 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-01-19 22:33:10 --> 404 Page Not Found: Robotstxt/index
