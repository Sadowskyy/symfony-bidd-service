About Symfony template project
--------

[![codecov](https://codecov.io/gh/Sadowskyy/symfony-template/branch/master/graph/badge.svg?token=6S1V1Q10IX)](https://codecov.io/gh/Sadowskyy/symfony-template)
[![CI](https://github.com/Sadowskyy/symfony-template/actions/workflows/ci.yml/badge.svg)](https://github.com/Sadowskyy/symfony-template/actions/workflows/ci.yml)

# Symfony Template
A [Docker](https://www.docker.com)-based project and runtime for the [Symfony](https://symfony.com) web framework.

## Getting Started
1. If you have not used Docker or Docker Compose, [install Docker Compose](https://docs.docker.com/compose/install/)
2. Run `make build` to build fresh images
3. Run `make up` (or docker compose up to view logs in shell)
4. Application runs on `https://localhost`
5. Run `make stop` to stop the Docker containers.

## Docs
1. [Codecoverage](docs/codecov.md)
2. [Database dump](docs/dump.md)
3. [Database connection](docs/databse.md)
4. [Test authentication](docs/users.md)
5. [Test registration](docs/registration.md)
