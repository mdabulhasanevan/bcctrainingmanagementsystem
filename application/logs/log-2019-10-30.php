<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-30 21:38:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY att.Date, st.RegNO' at line 1 - Invalid query: SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID= ORDER BY att.Date, st.RegNO
ERROR - 2019-10-30 21:38:00 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 23
ERROR - 2019-10-30 21:38:50 --> 404 Page Not Found: Dist/css
