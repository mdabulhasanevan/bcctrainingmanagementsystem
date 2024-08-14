<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-06 12:03:24 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2019-10-06 12:03:24 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2019-10-06 12:03:24 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2019-10-06 12:03:24 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2019-10-06 14:24:19 --> Severity: Compile Error --> Cannot redeclare User_Model::LoginHistory() /home/expresstechbd/public_html/bcc/application/models/User_Model.php 148
ERROR - 2019-10-06 14:24:19 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-10-06 14:27:41 --> 404 Page Not Found: Uploads/users
ERROR - 2019-10-06 14:27:41 --> 404 Page Not Found: Uploads/users
ERROR - 2019-10-06 14:28:59 --> Query error: Table 'expresstechbd_bcc.StudentLoginHistory' doesn't exist - Invalid query: SELECT slh.*, st.FullName as Name, f.Name as Faculty, s.Session as Session FROM StudentLoginHistory slh
left JOIN student_tbl st on st.StudentID=slh.SID left join faculty f on f.FId=st.Faculty left join session s on s.SessionId=st.SessionId order by ID desc LIMIT 200
ERROR - 2019-10-06 14:28:59 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2019-10-06 14:32:05 --> Query error: Table 'expresstechbd_bcc.StudentLoginHistory' doesn't exist - Invalid query: SELECT slh.*, st.FullName as Name, f.Name as Faculty, s.Session as Session FROM StudentLoginHistory slh
left JOIN student_tbl st on st.StudentID=slh.SID left join faculty f on f.FId=st.Faculty left join session s on s.SessionId=st.SessionId order by ID desc LIMIT 200
ERROR - 2019-10-06 14:32:05 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2019-10-06 14:38:43 --> Query error: Table 'expresstechbd_bcc.student_tbl' doesn't exist - Invalid query: SELECT slh.*, st.FullName as Name, f.Name as Faculty, s.Session as Session FROM StudentLoginHistory slh
left JOIN student_tbl st on st.StudentID=slh.SID left join faculty f on f.FId=st.Faculty left join session s on s.SessionId=st.SessionId order by ID desc LIMIT 200
ERROR - 2019-10-06 14:38:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/User_Model.php 67
ERROR - 2019-10-06 15:17:04 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 15:23:45 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 15:28:43 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:04:53 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:07:02 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:15:38 --> 404 Page Not Found: Robotstxt/index
ERROR - 2019-10-06 16:23:11 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:44:10 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:44:11 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 51
ERROR - 2019-10-06 16:44:11 --> Severity: Notice --> Undefined variable: resultTotal /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:44:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:44:11 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:44:53 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 51
ERROR - 2019-10-06 16:44:53 --> Severity: Notice --> Undefined variable: resultTotal /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:44:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:44:53 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:45:29 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 51
ERROR - 2019-10-06 16:45:29 --> Severity: Notice --> Undefined variable: resultTotal /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:45:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:45:29 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:45:30 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-10-06 16:46:43 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 51
ERROR - 2019-10-06 16:46:43 --> Severity: Notice --> Undefined variable: resultTotal /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:46:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:46:43 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:47:28 --> Severity: Notice --> Undefined variable: result /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 51
ERROR - 2019-10-06 16:47:28 --> Severity: Notice --> Undefined variable: resultTotal /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:47:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:47:28 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:47:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:47:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:48:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:48:22 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:48:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:48:28 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:49:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(1) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019'
ERROR - 2019-10-06 16:49:10 --> Severity: error --> Exception: Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 16:59:40 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 16:59:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1,1)) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Stat' at line 1 - Invalid query: SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(st.Gender='Female',1,1)) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE b.Status IN(2) or ( MONTH(b.EndDate)='10' AND YEAR(b.EndDate)='2019')
ERROR - 2019-10-06 16:59:41 --> Severity: error --> Exception: Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 52
ERROR - 2019-10-06 17:38:50 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 17:42:51 --> 404 Page Not Found: Dist/img
ERROR - 2019-10-06 17:48:53 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 17:53:18 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 17:58:56 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 18:21:43 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 18:53:39 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 20:20:19 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-10-06 20:20:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-10-06 20:20:23 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-10-06 20:20:33 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-10-06 20:20:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-10-06 21:30:36 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 21:40:44 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 21:45:38 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:29:42 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:29:44 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:42:14 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:42:14 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:53:05 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 22:54:19 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 23:26:32 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 23:40:31 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 23:41:33 --> 404 Page Not Found: Dist/css
ERROR - 2019-10-06 23:55:41 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-10-06 23:55:41 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-10-06 23:55:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-10-06 23:56:06 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-10-06 23:56:06 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-10-06 23:57:03 --> 404 Page Not Found: Dist/css
