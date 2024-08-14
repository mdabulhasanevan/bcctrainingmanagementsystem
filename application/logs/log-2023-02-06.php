<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-06 00:16:54 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-06 04:57:01 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-06 10:48:53 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2023-02-06 10:48:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=11 and att.SubjectID= ORDER BY att.Date, st.RegNO
ERROR - 2023-02-06 10:48:53 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
