#!/bin/bash
reports="csd_facility_list csd_organization_list facility_list facility_positions search_people facility_tree position_tree village_tree position_list open_position_list chws_per_location person_function person_incentive person_location_served person_services staff_album staff_chart staff_list scheduled_training_participation"
for report in $reports
do
    echo Generating $report >> /tmp/report_cron.log
    date >> /tmp/report_cron.log
    cd /var/lib/iHRIS/dev/sites/Uganda-community-health-worker-registry/pages/ && php index.php --page=/CustomReports/generate_force/$report --nocheck=1
    date >> /tmp/report_cron.log
done
