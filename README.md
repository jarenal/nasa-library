# NASA ASSETS LIBRARY SEEKER! #

## Description

This application allows you to perform searches in NASA's multimedia resource library using its public API.

The following technologies have been primarily used to develop this application:

- PHP 8.2
- Symfony 6.3
- VueJS 3.3
- Bootstrap 5.3


## Requirements

To deploy the project in a local development environment, we'll need to have Docker and Docker Compose installed.

* [Get Docker](https://www.docker.com/get-started)
* [Get Docker Compose](https://docs.docker.com/compose/install/)

## Ports

We need to ensure that the following ports are available on the host machine:

* **80** This port will be used by the Apache Web Server.

## Deploy locally

To deploy the project locally, you need to clone the project into a folder and then bring it up using the following command:

```shell
docker compose up

or 

docker-compose up
```

Next, open the following URL in your browser to view the application.

```shell
http://localhost
```