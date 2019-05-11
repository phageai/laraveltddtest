@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/vendor/phpunit/phpunit/phpunit
clear
php "%BIN_TARGET%" %*
