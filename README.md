# Sobre

Neste projeto foi utilizado uma aplicação Laravel 10 com PHP 8.2, utilizando para execução do ambiente de desenvolvimento o Laravel Sail com Docker Redis e Mysql

# Arquivos Gerados:

-   Http/Controllers/Api/PersonController.php
-   Http/Controllers/Api/PersonCountController.php
-   Http/Controllers/Api/PersonSearchController.php
-   Http/Requests/Api/StorePersonRequest.php
-   Http/Resources/Api/PersonResource.php

  
-   App/Services/PersonService.php
-   App/Models/Person.php
-   Database/factories/PersonFactory.php
-   Database/seeders/PersonSeeder.php

-   tests/Feature/Api/PersonControllerTest.php
-   tests/Feature/Api/PersonCountControllerTest.php
-   tests/Feature/Api/PersonSearchControllerTest.php

# Instalação
- git clone https://github.com/username/projeto.git
- cd projeto
- composer install
- cp .env.example .env
- alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
- php artisan key:generate
- sail up -d
