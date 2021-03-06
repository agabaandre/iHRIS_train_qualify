#!/bin/bash
reports="person person_first_reg person_last_reg search_people search_private_facility institution exam licence registration training training_disruption"
for report in $reports
do
    echo Generating $report >> /tmp/report_cron.log
    date >> /tmp/report_cron.log
    cd /var/lib/iHRIS/iHRIS_train_qualify/4.3.3/sites/allied_council/pages/ && php index.php --page=/CustomReports/generate_force/$report --nocheck=1
    date >> /tmp/report_cron.log
done

