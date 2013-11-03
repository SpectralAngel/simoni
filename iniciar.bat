php composer.phar dumpautoload --optimize
php app/console cache:clear
php app/console cache:clear --env=prod
php app/console doctrine:migrations:migrate
php app/console doctrine:fixtures:load
