<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-06 09:42:35 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 12:41:09 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 12:41:09 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 14:57:24 --> Severity: Warning --> Missing argument 1 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:57:24 --> Severity: Warning --> Missing argument 2 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:57:24 --> Severity: Notice --> Undefined variable: from /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:57:24 --> Severity: Notice --> Undefined variable: to /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:57:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType' at line 1 - Invalid query: SELECT s.CalenderYear, bdt.Type AS DurationType, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >=  and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType
ERROR - 2019-04-06 14:57:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-04-06 14:57:24 --> Severity: Error --> Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 27
ERROR - 2019-04-06 14:57:48 --> Severity: Warning --> Missing argument 1 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:57:48 --> Severity: Warning --> Missing argument 2 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:57:48 --> Severity: Notice --> Undefined variable: from /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:57:48 --> Severity: Notice --> Undefined variable: to /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:57:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType' at line 1 - Invalid query: SELECT s.CalenderYear, bdt.Type AS DurationType, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >=  and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType
ERROR - 2019-04-06 14:57:48 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-04-06 14:57:48 --> Severity: Error --> Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 27
ERROR - 2019-04-06 14:58:18 --> Severity: Warning --> Missing argument 1 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:58:18 --> Severity: Warning --> Missing argument 2 for Report::GetAllFiscalYear() /home/expresstechbd/public_html/bcc/application/controllers/Report.php 39
ERROR - 2019-04-06 14:58:18 --> Severity: Notice --> Undefined variable: from /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:58:18 --> Severity: Notice --> Undefined variable: to /home/expresstechbd/public_html/bcc/application/controllers/Report.php 41
ERROR - 2019-04-06 14:58:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType' at line 1 - Invalid query: SELECT s.CalenderYear, bdt.Type AS DurationType, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >=  and b.SessionFiscal<= GROUP BY b.SessionFiscal, b.DurationType
ERROR - 2019-04-06 14:58:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-04-06 14:58:18 --> Severity: Error --> Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 27
ERROR - 2019-04-06 15:02:13 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 15:02:13 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 15:18:05 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 15:18:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 15:26:29 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 15:26:29 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 15:45:07 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 16:13:41 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 16:13:41 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 16:17:03 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 16:17:03 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 16:48:43 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 16:48:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-04-06 17:06:03 --> 404 Page Not Found: Dist/img
ERROR - 2019-04-06 19:14:21 --> 404 Page Not Found: Dist/img
