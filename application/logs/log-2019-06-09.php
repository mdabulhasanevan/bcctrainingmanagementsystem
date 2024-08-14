<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-09 04:01:19 --> 404 Page Not Found: Robotstxt/index
ERROR - 2019-06-09 17:04:44 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:04:48 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:28:21 --> 404 Page Not Found: Dist/css
ERROR - 2019-06-09 17:29:21 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:35:18 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 17:35:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 17:35:18 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 17:35:18 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 17:35:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 17:35:18 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 17:35:18 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 17:35:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 17:35:18 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 17:35:27 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:36:01 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:36:02 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:37:47 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:37:47 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:37:53 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:37:53 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:38:28 --> Severity: Notice --> Use of undefined constant m - assumed 'm' /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 52
ERROR - 2019-06-09 17:38:29 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:38:32 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:38:33 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:43:20 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT s.FiscalYear, bdt.Type AS DurationType, sum(st.CourseFee) as Fee, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >= undefined and b.SessionFiscal<=1 GROUP BY b.SessionFiscal, b.DurationType
ERROR - 2019-06-09 17:43:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/Report_Model.php:27) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 17:43:20 --> Severity: Error --> Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Report_Model.php 27
ERROR - 2019-06-09 17:58:30 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:58:53 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:58:54 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:58:54 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:59:49 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:59:50 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 17:59:57 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:00:23 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:00:24 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:01:20 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:01:20 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:01:23 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:01:23 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:01:28 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 18:01:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:01:28 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:01:28 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:01:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:01:28 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:01:28 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:01:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:01:28 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:01:55 --> Severity: Warning --> Missing argument 2 for Service::DeleteSubCategory() /home/expresstechbd/public_html/bcc/application/controllers/Service.php 281
ERROR - 2019-06-09 18:01:55 --> Severity: Notice --> Undefined variable: File /home/expresstechbd/public_html/bcc/application/controllers/Service.php 282
ERROR - 2019-06-09 18:01:55 --> Severity: Warning --> unlink(dist/img/icon/): Is a directory /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 94
ERROR - 2019-06-09 18:01:55 --> Severity: Notice --> Use of undefined constant m - assumed 'm' /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 95
ERROR - 2019-06-09 18:01:56 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:03:08 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:03:08 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:03:15 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2019-06-09 18:03:15 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2019-06-09 18:03:15 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2019-06-09 18:03:15 --> Severity: Notice --> Trying to get property of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2019-06-09 18:03:16 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:03:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:16 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:03:16 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 18:03:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:16 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:03:16 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:03:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:16 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:03:27 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:03:31 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 18:03:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:31 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:03:31 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:03:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:31 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:03:31 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:03:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:03:31 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:04:41 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:04:41 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:04:49 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 18:04:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:04:49 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:04:49 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:04:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:04:49 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:04:49 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:04:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:04:49 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/images
ERROR - 2019-06-09 18:05:03 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 18:05:08 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:05:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:05:08 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:05:08 --> Query error: Unknown column 'img' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=img
ERROR - 2019-06-09 18:05:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:05:08 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:05:08 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=images
ERROR - 2019-06-09 18:05:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php:112) /home/expresstechbd/public_html/bcc/system/core/Common.php 570
ERROR - 2019-06-09 18:05:08 --> Severity: Error --> Call to a member function row() on boolean /home/expresstechbd/public_html/bcc/application/models/PhotoSlideGallery_Model.php 112
ERROR - 2019-06-09 18:06:30 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Dist/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/images
ERROR - 2019-06-09 19:06:37 --> 404 Page Not Found: Home/img
