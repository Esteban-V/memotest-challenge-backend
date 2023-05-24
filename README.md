# MemoTest Challenge for HeyTutor

This is a Laravel project developed for the MemoTest challenge by [HeyTutor](https://heytutor.com/). The MemoTest challenge aims to test your memory skills by matching pairs of cards within a time limit.

## Prerequisites

Before running the Laravel project, make sure you have the following prerequisites installed on your system:

- Docker
- Docker Compose
- Composer package manager

## Getting Started

To run the Laravel project for the first time, follow these steps:

1. Clone the repository to your local machine:

```git clone https://github.com/Esteban-V/memotest-challenge-backend.git```

2. Navigate to the project directory:

```cd memotest-challenge-backend```

3. Copy the `.env.example` file to create a new `.env` file:

```cp .env.example .env```

4. Update the `.env` file with your desired configuration, such as the database settings and application key.

5. Install Sail using Composer. Of course, these steps assume that your existing local development environment allows you to install Composer dependencies:

```composer require laravel/sail --dev```

6. Build and start the Docker containers using Laravel Sail:

```./vendor/bin/sail up -d```

This command will download the necessary Docker images, set up the containers, and start the Laravel application.

7. Access the GrahpQL Playground in your web browser:

```http://localhost/graphql-playground```

You should see a GraphQL Playground instance.

- To stop the Docker containers and shut down the Laravel application, use the following command:

```./vendor/bin/sail down```