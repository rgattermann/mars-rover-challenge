# mars-rover-challenge

## Run with docker

You can run this application with docker-composer, using this command
`docker-compose up`

## Run local
To run the application locally you need php and composer installed.

1. Clone this repository.
2. Inside project folder, execute the following command: `composer install`

3. Execution:
- To execute the interative mode: `./console marsrovers:input`
- To execute whit file import: `./console marsrovers:import ./resources/input.txt`

## Run tests
1. Clone this repository.
2. Inside project folder, execute the following command: `./vendor/bin/phpunit`
