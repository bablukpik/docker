# What is Docker?

Docker is an open-source platform for developing, shipping, and running applications in containers. Containers are lightweight, portable, and isolated units that run applications independently from the host system. Containers allow developers to package applications with all the necessary dependencies (libraries, configuration files, etc.) into a single, self-sufficient unit. This ensures the application runs consistently across different environments, such as development, testing, and production. Here's a brief overview:

1. **Containerization**: Docker packages applications and their dependencies into lightweight, portable containers.
2. **Consistency**: Containers ensure that applications run consistently across different environments. Since containers package everything needed to run the application, you avoid the "works on my machine" problem.
3. **Isolation**: Each container runs in isolation, improving security and reducing conflicts.
4. **Efficiency**: Containers share the host OS kernel, making them more resource-efficient than virtual machines.
5. **Scalability**: Docker makes it easy to scale applications by running multiple instances of containers.
6. **Portability**: Containers can run on any system that supports Docker (e.g., local machines, cloud platforms).
7. **DevOps**: Docker facilitates DevOps practices by streamlining development, testing, and deployment processes. It is widely adopted in DevOps workflows, particularly in microservices architectures and continuous integration/continuous deployment (CI/CD) pipelines.

## Key Components of Docker

1. **Docker Engine**: The runtime that allows you to build, run, and manage containers.
2. **Docker Images**: These are read-only templates used to create containers. An image includes everything the application needs, such as code, runtime, libraries, and settings.
3. **Docker Containers**: These are instances of Docker images. They are lightweight, fast to start, and run isolated from each other and the underlying system.
4. **Dockerfile**: A script that defines how to build a Docker image. It specifies the base image, dependencies, commands to run, and other configurations.
5. **Docker Hub**: Docker Hub is a registry that simplifies the process of sharing, collaborating on, and reusing containerized applications.

## How to install Docker

You can install either the [Docker Engine](https://docs.docker.com/engine/install) or the [Docker Desktop](https://www.docker.com/products/docker-desktop) on your machine. This section will guide you on how to install the Docker Engine.

You can install the Docker Engine in two ways:

1. [By following the Docker documentation](https://github.com/bablukpik/docker?tab=readme-ov-file#by-following-docker-documentation)
2. [By following below step by step guide](https://github.com/bablukpik/docker?tab=readme-ov-file#by-following-step-by-step-guide)

### By following Docker Documentation

You can install Docker from here [Install Docker Engine on Ubuntu](https://docs.docker.com/engine/install/ubuntu/). If you're using other platforms instead of Ubuntu you'll get guides here [Supported platforms](https://docs.docker.com/engine/install/).

### By following Step by Step Guide

- Run the following command to uninstall all conflicting packages:

```bash
for pkg in docker.io docker-doc docker-compose podman-docker containerd runc; do sudo apt-get remove $pkg; done
```

- Set up Docker's Apt repository:

```bash
# Add Docker's official GPG key:
sudo apt-get update
sudo apt-get install ca-certificates curl gnupg
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg

# Add the repository to Apt sources:
echo \
  "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
```

- Install the Docker packages:

```bash
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

- To check if the Docker Engine installed:

```bash
docker -v
```

- To check if the Docker Compose Engine installed as a plugin with Docker:

```bash
docker compose version
```

### Docker Engine Post-Installation Steps to Fix Permission Issues

- Create the Docker group:

```bash
sudo groupadd docker
```

- Add your user to the Docker group:

```bash
sudo usermod -aG docker $USER
```

- Log out and log back in to apply the changes or run the below command:

```bash
newgrp docker
```

- Change the group permission

```bash
sudo chown -R "$USER":"$USER" $HOME/.docker
sudo chmod -R g+rwx "$HOME/.docker"
```

## Some Common Docker Commands

Here are some common Docker commands for viewing, creating and removing Docker resources.

### How to view Docker Resources

Here are common Docker commands for viewing various Docker resources:

#### Docker Images

- To list all images:

```bash
docker images
```

- To list all images (including intermediate images):

```bash
docker images -a
```

- To list images with specific format (e.g., only ID and Repository):

```bash
docker images --format "{{.ID}}: {{.Repository}}"
```

#### Docker Containers

- To list running containers:

```bash
docker ps
```

- To list all containers (including stopped ones):

```bash
docker ps -a
```

- To show the latest created container (includes all states):

```bash
docker ps -l
```

- To show n last created containers (includes all states):

```bash
docker ps -n=2  # Shows last 2 containers
```

#### Docker Volumes

- To list volumes:

```bash
docker volume ls
```

- To inspect a specific volume:

```bash
docker volume inspect my-volume
```

#### Docker Networks

- To list networks:

```bash
docker network ls
```

- To inspect a specific network:

```bash
docker network inspect my-network
```

#### Docker System

- To display Docker disk usage:

```bash
docker system df
```

- To show detailed information on space usage:

```bash
docker system df -v
```

#### Inspecting Resources

- To view detailed information about a container:

```bash
docker inspect my-container
```

- To view detailed information about an image:

```bash
docker inspect my-image:tag
```

#### Viewing Logs

- To view the logs of a container:

```bash
docker logs my-container
```

- To follow log output in real-time:

```bash
docker logs -f my-container
```

**Note**: Replace `my-container`, `my-image`, `my-volume`, and `my-network` with the actual names or IDs of your Docker resources.

**Additional Tip**: Many of these commands support various flags for filtering and formatting output. Use `docker [command] --help` to see all available options for each command.

### How to create Docker Resources

Here are some common Docker commands for creating Docker resources:

#### Docker Images

- To create a Docker image from a Dockerfile in the current directory:

```bash
docker build -t my-image:tag .
```

- To create an image from a specific Dockerfile:

```bash
docker build -t my-image:tag -f /path/to/Dockerfile .
```

#### Docker Containers

- To create and start a Docker container from an image:

```bash
docker run --name my-container my-image:tag
```

- To create a container in detached mode with port mapping:

```bash
docker run -d --name my-container -p 8080:80 my-image:tag
```

- To create a container with a mounted volume:

```bash
docker run -v /host/path:/container/path --name my-container my-image:tag
```

#### Docker Volumes

- To create a Docker volume:

```bash
docker volume create my-volume
```

- To create a volume with specific driver:

```bash
docker volume create --driver local --name my-volume
```

#### Docker Networks

- To create a Docker network:

```bash
docker network create my-network
```

- To create a network with specific subnet and gateway:

```bash
docker network create --subnet 172.18.0.0/16 --gateway 172.18.0.1 my-network
```

**Note**: Remember to replace `my-container`, `my-image`, `my-volume`, and `my-network` with your own names or identifiers for your specific use case. The `tag` in image names is optional but recommended for version control.

**Additional Tips**:

- Use `docker run --help` to see all available options for running containers.
- For production environments, consider using Docker Compose or Kubernetes for managing multi-container applications.

### How to remove Docker Resources

Here are some common Docker commands for removing Docker resources:

#### Docker Images

- To remove specific Images:

```bash
docker rmi image_id1 image_id2 ...
```

- To remove all images:

```bash
docker rmi -f $(docker images -aq)
```

#### Docker Containers

- To remove specific Containers:

```bash
docker rm container_id1 container_id2 ...
```

- To remove all containers:

```bash
docker rm -f $(docker ps -aq)
```

- To remove stopped containers:

```bash
docker rm $(docker ps -aqf status=exited)
```

- To stop all running containers:

```bash
docker stop $(docker ps -aq)
```

- To remove all containers including their volumes:

```bash
docker rm -vf $(docker ps -aq)
```

- To remove all the Containers, Images and Volumes:

```bash
docker system prune --volumes -af
```

- To remove all the Containers, Images, Volumes and Networks:

```bash
docker system prune --volumes -af && docker network prune -f
```

#### Docker Volumes

- To remove specific Volumes:

```bash
docker volume rm volume_name1 volume_name2 ...
```

- To remove all volumes:

```bash
docker volume rm $(docker volume ls -q)
```

#### Docker Networks

- To remove specific Networks:

```bash
docker network rm network_id1 network_id2 ...
```

- To remove all custom Networks:

```bash
docker network rm $(docker network ls -q)
```

Or

```bash
docker network prune -f
```

**Note**: Use these commands with caution, especially those that remove all resources. Ensure you have backups of important data before running cleanup commands.

## Docker Compose

Docker Compose is a tool for defining and running multi-container Docker applications. With Compose, you use a YAML file to configure your application's services. Then, with a single command, you create and start all the services from your configuration.

### Basic Structure of a Docker Compose File

A Docker Compose file is a YAML file that defines the services, networks, and volumes for your application. Here's a basic example:

```yaml
version: "3.8"
services:
  web-service:
    image: nginx:latest
    ports:
      - "80:80"
    networks:
      - my-network

networks:
  my-network:
```

### Building and Running with Docker Compose

To build and run your application using Docker Compose, you would typically use the following command:

```bash
docker compose up
```

## Contributing

Feel free to submit issues, create pull requests, or fork the repository to help improve the project.

## License

This project is open source and available under the [MIT License](LICENSE).
