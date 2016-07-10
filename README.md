# Little Netty
v.4.0.0

## Overview

Version 4 of the Little Netty website.

## Install

Download repo into your WordPress theme directory.

Move "__plugins" content into WordPress' plugins directory.

Run `npm install` to set-up the Gulp environment.

Assets will be compiled into the "/assets" folder using sources in the "/ucompressed" folder.

## Usage

Run `gulp staticjs` to set up static javascript assets.

Run `gulp` to activate the Gulp task. This watches all the files in the "/uncompressed" folder, and triggers tasks as-needed.

There are also a few standalone commands that can be run:

* `gulp setup` will run everything and set up the initial environment.
* `gulp jslint` will run all javascript in the "/uncompressed/js/custom" folder through a JS linter.
* `gulp scsslint` will run all Sass in the "/uncompressed/scss" folder through an SCSS linter.
* `gulp test` will output a the message "testing with colour", where "colour" will appear cyan.
* `gulp svg` will compile any SVG files in the "/uncompressed/icons" folder into an SVG Sprite.
* `gulp images` optimises images in the "/uncompressed/images" folder.
* `gulp fonts` simply copies font files from "/uncompressed/fonts" to "/assets/fonts" (so we can keep all source files in one dir. and don't need to manually move them). 
* `gulp scripts` concatenates and minifies JS files, starting with "/uncompressed/js/vendor" and ending with "/uncompressed/js/custom" (to preserve source-order)
* `gulp sass` concatenates and minifies SCSS files in "/uncompressed/scss". It also runs them through Autoprefixer to apply missing browser-prefixes.

## Credits

Based on [Startpress](https://github.com/tomhazledine/startpress) built by [@thomashazledine](https://twitter.com/thomashazledine), with help from [@enshrined](https://twitter.com/enshrined).