@echo off
REM Script to auto-fix PHP code style issues
echo Auto-fixing PHP code style issues...
echo.
echo NOTE: This requires running from Local by Flywheel Site Shell
echo If you see "php not found", please run this from Local's Site Shell
echo.
vendor\bin\phpcbf
echo.
echo Done! Your PHP files have been formatted.
