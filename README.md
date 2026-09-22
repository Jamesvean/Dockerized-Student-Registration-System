# Dockerized Student Registration System

A three-tier student registration application deployed on AWS EC2 using Docker Compose.

## Architecture

Browser -> Nginx -> PHP-FPM -> MySQL

## Technologies

- AWS EC2
- Amazon Linux 2023
- Docker
- Docker Compose
- Nginx
- PHP-FPM
- MySQL
- Git

## Project Structure

```text
Dockerized-Student-Registration-System/
├── web/
│   ├── code/
│   │   └── signup.html
│   └── config/
│       └── default.conf
├── app/
│   └── code/
│       └── submit.php
├── db/
│   ├── Dockerfile
│   └── init.sql
├── docker-compose.yml
├── .gitignore
└── README.md
```

## Features

- Student registration web form
- Nginx web tier
- PHP-FPM application tier
- MySQL database tier
- Docker networking
- Persistent MySQL volume
- Password hashing
- Docker Compose orchestration

## Run

```bash
docker compose build
docker compose up -d
docker compose ps
```

Open:

```text
http://EC2-PUBLIC-IP/
```

## Verify Database

```bash
docker exec student-db mysql -uroot -proot -e 'USE FCT; SELECT id,name,email,created_at FROM users;'
```
