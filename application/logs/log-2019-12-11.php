<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-11 02:04:53 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2019-12-11 02:04:53 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2019-12-11 02:04:53 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2019-12-11 02:04:53 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2019-12-11 09:55:46 --> 404 Page Not Found: Dist/css
ERROR - 2019-12-11 12:45:29 --> 404 Page Not Found: Dist/css
ERROR - 2019-12-11 12:45:33 --> 404 Page Not Found: Dist/css
ERROR - 2019-12-11 13:08:37 --> 404 Page Not Found: Robotstxt/index
ERROR - 2019-12-11 13:12:29 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *  , (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=45  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2019-12-11 13:12:29 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 198
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Undefined index: Studentinfo /home/expresstechbd/public_html/bcc/application/controllers/Student.php 87
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'BatchID' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 74
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'RegNO' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 75
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Photo' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 85
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Name' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 108
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'RegNO' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 109
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'BatchID' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 110
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Mobile' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 111
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Email' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 112
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Session' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 113
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'CalendarYear' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 114
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'Gender' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 115
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'IsCertified' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 116
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'CertificateNo' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 117
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'IsPhysicalDisable' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 118
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'PhysicalDetail' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 119
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'ParticipantType' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 120
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'CourseFee' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 121
ERROR - 2019-12-11 13:24:38 --> Severity: Notice --> Trying to get property 'SID' of non-object /home/expresstechbd/public_html/bcc/application/models/Student_Model.php 126
ERROR - 2019-12-11 13:24:47 --> 404 Page Not Found: Dist/js
ERROR - 2019-12-11 14:29:12 --> 404 Page Not Found: Dist/js
ERROR - 2019-12-11 15:26:12 --> Severity: Notice --> Undefined index: Photo /home/expresstechbd/public_html/bcc/application/views/Student/TakeExam.php 21
ERROR - 2019-12-11 18:53:10 --> 404 Page Not Found: Robotstxt/index
ERROR - 2019-12-11 19:24:48 --> 404 Page Not Found: Admin/index
ERROR - 2019-12-11 19:24:54 --> 404 Page Not Found: Shop/admin
ERROR - 2019-12-11 19:24:56 --> 404 Page Not Found: Store/admin
ERROR - 2019-12-11 19:24:57 --> 404 Page Not Found: Magento/admin
ERROR - 2019-12-11 19:24:58 --> 404 Page Not Found: Magento2/admin
ERROR - 2019-12-11 19:24:59 --> 404 Page Not Found: Pub/errors
ERROR - 2019-12-11 19:25:05 --> 404 Page Not Found: Shop/pub
ERROR - 2019-12-11 19:25:06 --> 404 Page Not Found: Store/pub
ERROR - 2019-12-11 19:25:12 --> 404 Page Not Found: Magento/pub
ERROR - 2019-12-11 19:25:12 --> 404 Page Not Found: Magento2/pub
ERROR - 2019-12-11 19:25:14 --> 404 Page Not Found: Shop/index
ERROR - 2019-12-11 19:25:20 --> 404 Page Not Found: Store/index
ERROR - 2019-12-11 19:25:26 --> 404 Page Not Found: Magento/index
ERROR - 2019-12-11 19:25:32 --> 404 Page Not Found: Magento2/index
ERROR - 2019-12-11 22:17:54 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-12-11 22:17:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
ERROR - 2019-12-11 22:17:59 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-12-11 22:18:10 --> Severity: Notice --> Undefined index: id /home/expresstechbd/public_html/bcc/application/models/User_Model.php 295
ERROR - 2019-12-11 22:18:10 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/expresstechbd/public_html/bcc/system/core/Exceptions.php:271) /home/expresstechbd/public_html/bcc/system/helpers/url_helper.php 564
