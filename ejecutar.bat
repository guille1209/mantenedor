@ECHO OFF


set OLD_PATH=%PATH%
set PATH=C:\mantenedorV1;%PATH%

START http://localhost:8000

php artisan serve



SET PATH=%OLD_PATH%
SET "OLD_PATH="