## Requirements
* Docker (and docker compose)
* Symfony
* Git
* Composer

## Install project
```bash
## Clone project
git clone https://github.com/MorcilloA/autocomplete-example.git

## Install dependencies
cd autocomplete_example
composer install

## Start environment
docker compose up --build

## Initialize database
#### Right now credentials are hardcoded for simplicity but you can change them if you wish
docker compose exec php php bin/console doctrine:migrations:migrate
docker compose exec php php bin/console doctrine:fixtures:load
```

## Steps to reproduce
* Go to http://localhost:8080/
* Click the User field
* Type "name" in the search bar and wait for the results to load
* Scroll down to the bottom of the first page wait for the second one to load
* Result :
  * Expected : New results are loaded and the scrollbar doesn't move
  * Observed : New results are loaded and the scrollbar goes back to the top
