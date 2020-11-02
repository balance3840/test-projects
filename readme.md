# Test projects

> This repository contains 3 test projects: json-project, piglatin-project, and login-project.

# Requirements

* Docker
* Docker Compose

If you don't, don't worry you can configure these projects manually. You can find more information in the project's folder.

# Quickstart

The easiest wait to get started is simply running:
``` bash
# Initialization script
> bash init.sh
```

This will set all the environment for you using Docker containers.

# Ports exposed


| Project          | Port |
|------------------|------|
| login-project    | 8000 |
| json-project     | 9005 |
| piglatin-project | N/A  |

# Testing the projects

## Login project
The login-project can be requested on POST http://127.0.0.1:8000/login
``` bash
curl --location --request POST 'http://127.0.0.1:8000/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    \"email\": \"test.email@gmail.com\",
    \"password\": \"123456\"
}'
```

## Pig latin
The piglatin-project can be tested running:

``` bash
docker-compose run node npm test
```
## JSON project
The json-project can be requested on http://127.0.0.1:9005

# More info

You can find more information about each project in its folder.
