# Product Listing Multi-Container Application

This project demonstrates a simple multi-container application using Docker Compose. It consists of three services: a PHP 8 web service, a Node.js product service, and a MySQL database service.

## Services

1. **web-service**: A PHP 8 Apache server that serves as the main web application.
2. **product-service**: A Node.js application that provides product data.
3. **db-service**: A MySQL database for storing application data.

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. Clone only the **product-app** directory:

   ```
   git clone --depth 1 --filter=blob:none --sparse https://github.com/bablukpik/docker.git
   cd docker
   git sparse-checkout set examples/product-app
   cd examples/product-app
   ```

2. Create a `secrets` directory and add the following files:

   - `db_password.txt`: Contains the password for the MySQL user
   - `db_root_password.txt`: Contains the root password for MySQL

3. Build and start the containers:

   ```
   docker compose up
   ```

4. Access the applications:
   - Web Service: http://localhost:8080
   - Product Service: http://localhost:8081

## Development

- The `product-listing` directory is mounted to `/var/www/html` in the web-service container and contains the PHP code.
- The `products` directory is mounted to `/app` in the product-service container and contains the Node.js code.
- Make changes to the code and the containers will automatically reflect the updates.

## Stopping the Application

To stop and remove the containers, networks, and volumes, first press `Ctrl+C` to stop the running containers, then run:

```
docker compose down
```

## Troubleshooting

If you encounter any issues, try the following steps:

1. Ensure that the secrets files (`db_password.txt` and `db_root_password.txt`) are properly set up with secure passwords before running the application.
2. Check if the required ports (8080 and 8081) are not in use by other applications.
3. The web service communicates with the product service internally using the service name `product-service`.
4. Verify that the secret files contain the correct passwords.
5. Review the Docker logs for each service:
   ```
   docker compose logs web-service
   docker compose logs product-service
   docker compose logs db-service
   ```

## Contributing

Feel free to submit issues, create pull requests, or fork the repository to help improve the project.

## License

This project is open source and available under the [MIT License](LICENSE).
