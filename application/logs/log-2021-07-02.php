<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-02 06:09:47 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-02 06:09:48 --> Severity: Notice --> Trying to get property 'CategoryName' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 7
ERROR - 2021-07-02 06:09:48 --> Severity: Notice --> Trying to get property 'Category' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 9
ERROR - 2021-07-02 06:09:48 --> Severity: Notice --> Trying to get property 'Others' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 14
ERROR - 2021-07-02 06:09:48 --> Severity: Notice --> Trying to get property 'Detail' of non-object /home/expresstechbd/public_html/bcc/application/views/Home/CategoryPageInfo.php 22
ERROR - 2021-07-02 11:32:30 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-02 11:32:34 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: _profiler/phpinfo
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: Phpinfophp/index
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: Phpinfo/index
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: Awsyml/index
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: Envbak/index
ERROR - 2021-07-02 18:24:08 --> 404 Page Not Found: Infophp/index
ERROR - 2021-07-02 18:24:09 --> 404 Page Not Found: Aws/credentials
ERROR - 2021-07-02 18:24:09 --> 404 Page Not Found: Config/aws.yml
ERROR - 2021-07-02 18:24:10 --> 404 Page Not Found: Configyml/index
ERROR - 2021-07-02 20:37:59 --> 404 Page Not Found: _profiler/phpinfo
ERROR - 2021-07-02 20:37:59 --> 404 Page Not Found: Phpinfophp/index
ERROR - 2021-07-02 20:37:59 --> 404 Page Not Found: Phpinfo/index
ERROR - 2021-07-02 20:38:00 --> 404 Page Not Found: Awsyml/index
ERROR - 2021-07-02 20:38:00 --> 404 Page Not Found: Envbak/index
ERROR - 2021-07-02 20:38:00 --> 404 Page Not Found: Infophp/index
ERROR - 2021-07-02 20:38:00 --> 404 Page Not Found: Aws/credentials
ERROR - 2021-07-02 20:38:01 --> 404 Page Not Found: Config/aws.yml
ERROR - 2021-07-02 20:38:02 --> 404 Page Not Found: Configyml/index
ERROR - 2021-07-02 23:20:02 --> Query error: Unknown column 'undefined' in 'where clause' - Invalid query: SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=9  and exc.ExamNameID=undefined  ORDER BY st.RegNO asc
ERROR - 2021-07-02 23:20:02 --> Severity: error --> Exception: Call to a member function result() on boolean /home/expresstechbd/public_html/bcc/application/models/Exam_Model.php 208
