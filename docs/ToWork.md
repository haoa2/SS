#To work on it

###What you need
	1. Ruby (RVM mac y linux, Railsinstaller windows)
	2. Saas (gem install sass)
	3. Typescript (http://www.typescriptlang.org)
	4. PHP
	5. MySQL

###The development routes:
	1. Styles: /dev/scss
	2. TS: /dev/ts

###To compile
	1. Start sass: sass --watch dev/scss:assets/css
	2. Start TS: tsc -w --outFile assets/js/app.js dev/ts/all --module commonjs

###To make it run 
	```
		php -S 0.0.0.0:8000
	```