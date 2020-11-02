# Pig Latin

> This project written in NodeJS provides and algorithm that checks if a given word is a pig Latin.

# Description

For words starting with vowel sounds "way" is going to be added as a suffix of the word. Examples:

* eat = eatway
* omelet = omeletway
* always = alwaysway

For words that begin with consonant sounds, all letters before the initial vowel are placed at the end of the word sequence. Then, "ay" is added, as in the following examples:

pig = igpay
happy = appyhay
me = emay

# Requirements

* Node
* npm

# Testing the project
If you configured the project using the script provided:
``` bash
docker-compose run node npm test
```

If you have a local installation of node:

``` bash
# Install dependencies
> npm install
> # Run unit tests
> npm test
```

# Delete the environment

In order to stop and delete the containers simply run:

``` bash
bash stop.sh
```