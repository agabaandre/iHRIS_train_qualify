#!/bin/bash
reports="staff_norm"
for report in $reports
do
    echo Generating $report >> /tmp/report_cron.log
    date >> /tmp/report_cron.log
    cd /var/lib/iHRIS/releases/4.2/sites/districts_manage/pages/ && php index.php --page=/CustomReports/generate_force/$report --nocheck=1
    date >> /tmp/report_cron.log
done
