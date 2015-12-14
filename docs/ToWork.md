#To work on it

###What you need
	1. Ruby (RVM mac y linux, Railsinstaller windows)
	2. Saas (gem install sass)
	3. Typescript (http://www.typescriptlang.org)

###The development routes:
	1. Styles: /dev/scss
	2. TS: /dev/ts

###To Make it run
	1. Start sass: sass --watch dev/scss:assets/css
	2. Start TS: tsc -w --outFile assets/js/app.js dev/ts/all --module commonjs

