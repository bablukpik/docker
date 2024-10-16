# Multi-Container Application

This project demonstrates a simple multi-container application using Docker Compose. It consists of three services: a PHP 8 web service, a Node.js product service, and a MySQL database service.

## Services

1. **web-service**: A PHP 8 Apache server that serves as the main web application.
2. **product-service**: A Node.js application that provides product data.
3. **db-service**: A MySQL database for storing application data.

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. Clone this repository:
   ```
   git clone <repository-url>
   cd <project-directory>
   ```

2. Create a `secrets` directory and add the following files:
   - `db_password.txt`: Contains the password for the MySQL user
   - `db_root_password.txt`: Contains the root password for MySQL

3. Build and start the containers:
   ```
   docker-compose up -d --build
   ```

4. Access the applications:
   - Web Service: http://localhost:8080
   - Product Service: http://localhost:8081

## Development

- The `product-listing` directory is mounted to `/var/www/html` in the web-service container and contains the PHP code.
- The `products` directory is mounted to `/app` in the product-service container and contains the Node.js code.
- Make changes to the code and the containers will automatically reflect the updates.

## Stopping the Application

To stop and remove the containers, networks, and volumes, run:
```
docker-compose down
```
