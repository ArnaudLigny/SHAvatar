# SHAvatar

SHAvatar is a **S**elf-**H**osted **Avatar** proposal.

The idea is everyone should be able to host himself his avatar image, provided to use its own domain name.

## Specifications

The domain name of an email address can be use as an entry point to display the avatar matching email.

Image request follow [Gravatar's rules](https://en.gravatar.com/site/implement/images/) (except for the domain name obsiouly).

### Example

If the e-mail address is `nickname@domain.tld` the image request will be  `https://domain.tld/avatar/aa745c786b697726fbbc0a3679d8de8e`.

## PHP server implementation

### Requirements

Please see the [composer.json](composer.json) file.

### Install

1. Copy the `avatar` directory in the web-root of the virtual host your HTTP server
2. Add those requirements in your `composer.json`:
```javascript
"silex/silex": "^2.0",
"intervention/image": "^2.5"
```
And run `composer update`.

### Usage

#### Add avatar image

1. The image file must be named `{HASH}-80x80.jpg` (where _{HASH}_ is a [MD5](https://wikipedia.org/wiki/MD5) hash of your email)
2. Put the file in `avatar/images` directory

#### Test locally

1. Start local Web server: `php -S localhost:8000`
2. Request `http://localhost:8000/avatar/{HASH}` in your web browser

### Demo

arnaud(at)ligny(dot)org :arrow_right: http://ligny.org/avatar/9ea5082df57281310fa93db64c70f88b

## License

_SHAvatar_ is a free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).

Copyright (c) Arnaud Ligny
