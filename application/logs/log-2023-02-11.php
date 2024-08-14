<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-11 00:09:04 --> Severity: Notice --> Undefined variable: Info /home/expresstechbd/public_html/bcc/application/views/Student/Dashboard.php 128
ERROR - 2023-02-11 00:09:04 --> Severity: Warning --> Invalid argument supplied for foreach() /home/expresstechbd/public_html/bcc/application/views/Student/Dashboard.php 128
ERROR - 2023-02-11 07:04:08 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-11 07:04:08 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-11 10:54:01 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 10:54:38 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 10:55:27 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 11:10:52 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 11:20:55 --> 404 Page Not Found: Robotstxt/index
ERROR - 2023-02-11 12:45:52 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 12:46:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 12:57:34 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 17:41:48 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 17:41:59 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 17:42:37 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 17:42:55 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 18:10:30 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 19:06:22 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 19:09:32 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 19:09:46 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:08:12 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:09:34 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:09:51 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:09:56 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:10:07 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:15:02 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:16:30 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:19:24 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:19:56 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:24:14 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:25:46 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:25:49 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT s.FiscalYear, bdt.Type AS DurationType, sum(st.CourseFee) as Fee, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >= undefined and b.SessionFiscal<=undefined GROUP BY b.SessionFiscal, b.DurationType
ERROR - 2023-02-11 22:25:49 --> Severity: error --> Exception: Call to a member function result() on bool /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 27
ERROR - 2023-02-11 22:29:36 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:33:23 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:34:40 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:34:50 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:35:56 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:36:38 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:37:17 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:38:27 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:40:23 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:42:42 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:43:04 --> 404 Page Not Found: Uploads/users
ERROR - 2023-02-11 22:49:10 --> 404 Page Not Found: Uploads/users
