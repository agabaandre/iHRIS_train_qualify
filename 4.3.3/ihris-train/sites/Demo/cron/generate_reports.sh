#!/bin/bash
reports="search_people staff_list staff_chart"
for report in $reports
do
    echo Generating $report
    /usr/bin/php ../pages/index.php --page=/CustomReports/generate/$report --nocheck=1
done
