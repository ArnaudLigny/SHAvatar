# SHAvatar

SHAvatar is a **S**elf-**H**osted **Avatar** proposal.

The idea is that everyone should be able to host himself his avatar image, provided to use its own domain name.

## Specifications

The domain name of an email address can serve as an entry point to display the avatar matching email.

For example, if the e-mail address is ```nickname@domain.tld```, the image request will be  ```http://domain.tld/avatar/aa745c786b697726fbbc0a3679d8de8e```.

Image request follow [Gravatar's rules](https://en.gravatar.com/site/implement/images/) except for the domain name, obsiouly.

----

## PHP server implementation

## Requirements

Please see the [composer.json](composer.json) file.

## Install

* 1. Copy the `avatar` directory in the web-root of the virtual host your HTTP server
* 2. Add those requirements in your composer.json:
```
"silex/silex": "~1.2",
"intervention/image": "~2.1"
```
* 3. Run Composer update

## Usage

### Add avatar image

1. The image file should be named ```HASH-80x80.jpg``` (where _HASH_ is a [MD5](http://wikipedia.org/wiki/MD5) hash of your email)
2. Put the file in ```web/avatar/images```

### Local test
* Start local web server: ```php -S localhost:8000 -t web```
* Request http://localhost:8000/avatar/HASH in your web browser
