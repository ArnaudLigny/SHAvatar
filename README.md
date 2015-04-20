# SHAvatar

SHAvatar is a **S**elf-**H**osted **Avatar** solution (_WIP_).

The idea is that everyone should be able to host himself his avatar image, provided to use its own domain name.

For example, if the e-mail address is ```nickname@domain.tld```, the image request will be  ```http://domain.tld/avatar/aa745c786b697726fbbc0a3679d8de8e```.

## Usage

### Add avatar image

1. The image file should be named ```HASH-80x80.jpg``` (where _HASH_ is a [MD5](http://wikipedia.org/wiki/MD5) hash of your email)
2. Put the file in ```web/images```

### Image request

Image request follow Gravatar's rules: https://en.gravatar.com/site/implement/images/.

For example, image could be resized dynamically with ```?s=XX``` (where _XX_ should be an integer).

### Local test
* Start local web server : ```php -S localhost:8000 -t web```
* Request http://localhost:8000/avatar/HASH
