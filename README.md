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

You can install either the Docker Engine or the Docker Desktop on your machine. This document will guide you on how to install the Docker Engine.

You can install the Docker Engine in two ways:

1. By following the Docker documentation
2. By following below step by step guide

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

- You can also run this:

```bash
newgrp docker
```

- Change the group permission

```bash
sudo chown -R "$USER":"$USER" $HOME/.docker
sudo chmod -R g+rwx "$HOME/.docker"
```

## Some Common Docker Commands

Here are some common Docker commands

### How to remove Docker Containers, Images, Volumes and Networks

- To delete all the Containers, Images and Volumes:

```bash
docker system prune --volumes -af
```

- To delete all the Networks:

```bash
docker network prune -f
```

- To delete all containers including their volumes:

```bash
docker rm -vf $(docker ps -aq)
```

- To delete all the images:

```bash
docker rmi -f $(docker images -aq)
```

- To delete specific Container:

```bash
docker rm container_id1, container_id2...
```

- To delete specific Images:

```bash
docker rmi image_id1, image_id2...
```

- To delete specific Networks:

```bash
docker network rm network_id1, network_id2...
```

- To delete specific Volumes:

```bash
docker volume rm volume_id1, volume_id2...
```

### How to create Docker Containers, Images, Volumes and Networks


- To create a Docker image from a Dockerfile:

```bash
docker build -t my-image .
```

- To create a Docker container from a Docker Image:

```bash
docker run --name my-container my-image
```

- To create a Docker volume:

```bash
docker volume create my-volume
```

- To create a Docker network:

```bash
docker network create my-network
```

Remember to replace `my-container`, `my-image`, `my-volume`, and `my-network` with your own names or identifiers for your specific use case.
