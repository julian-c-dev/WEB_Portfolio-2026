@echo off
REM Script to run PHP CodeSniffer from Windows terminal
echo Running PHP CodeSniffer (all warnings and errors)...
echo.
echo NOTE: This requires running from Local by Flywheel Site Shell
echo If you see "php not found", please run this from Local's Site Shell
echo.
vendor\bin\phpcs
