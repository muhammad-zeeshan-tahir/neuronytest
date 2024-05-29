
#  Neurony Test


## Installation guide for local machine setup

- Step No.  1 : Install Docker and copy 'neuronytest' folder
- Step No.  2 : Go to CMD and cd 'path directory of folder'
- Step No.  4 : Create .env by coping from .env.example
- Step No.  5 : docker-compose build --no-cache --force-rm 
- Step No.  6 : docker-compose up -d 
- Step No.  7 : docker exec neuronytest bash -c "composer update"
- Step No.  8 : docker exec neuronytest bash -c "php artisan key:generate"
- Step No.  9 : docker exec neuronytest bash -c "php artisan optimize:clear"
- Step No. 10 : docker exec neuronytest bash -c "php artisan migrate"
- Step No. 11 : docker exec neuronytest bash -c "php artisan db:seed"
- Step No. 12 : docker exec neuronytest bash -c "php artisan test"  for feature case testing
- Step No. 13 : Open Browser and usage http://localhost:1000  for web application
- Step No. 14 : Open Browser and usage http://localhost:1301  for phpMyAdmin ( To check DB ) 


