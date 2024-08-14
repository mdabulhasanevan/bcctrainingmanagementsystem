<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-04 12:00:46 --> Severity: Notice --> Undefined property: stdClass::$SubjectID /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 41
ERROR - 2021-10-04 12:00:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as SubjectID, '2021/10/04' as Date, st.RegNO as RegNo, isAttend FROM student ...' at line 1 - Invalid query: SELECT st.SID,st.Name, st.BatchID,  as SubjectID, '2021/10/04' as Date, st.RegNO as RegNo, isAttend FROM student st left join attendance as att on att.SID =st.SID and att.Date='2021/10/04'  and att.SubjectID='' WHERE st.BatchID= '67' order by st.RegNO
ERROR - 2021-10-04 12:00:46 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Attendance_Model.php 45
ERROR - 2021-10-04 21:16:53 --> 404 Page Not Found: Wp_loginphp/index
