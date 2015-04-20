# Narno / avatar

Self hosted avatar.

The idea is that everyone should be able to host himself his avatar image, provided to use its own domain name.

For example, if the e-mail address is ```nickname@domain.tld```, the image will be loaded from ```http://domain.tld/avatar/aa745c786b697726fbbc0a3679d8de8e```.

## Usage

* Put your avatar in ```web/images``` directory
* The image file should be named ```{hash}-80x80.jpg``` (with _{hash}_ is a [MD5](http://wikipedia.org/wiki/MD5) hash of your email)
* You can resize image dynamically with ```?s={XX}``` (with _{XX}_ should be an integer)

**Local test :**
* Launch local web server : ```php -S localhost:8000 -t web```
* http://localhost:8000/avatar/9ea5082df57281310fa93db64c70f88b
* http://localhost:8000/avatar/9ea5082df57281310fa93db64c70f88b?size=50
