# Pesto
A single-file URL Shortener for all your redirect needs
**Important:** This is intended for small-scale things and will probably not work for huge amount of short-link (max. a few hundreds)

Example scenario: you have a personal domain (say example.com) and want to create some redirects to other sites on the web. Just install **Pesto** on your server by following the steps below and you'll have an easy way to set up some redirects!

## Requirements
- Apache
- PHP (should work with pretty much any PHP version, but I haven't tested it)
- 5 minutes of your valuable time to set this whole thing up

## Set up, Installation, or whatever you wanna call it
### 1. Tell Apache you like Pesto
Firs of all, you need to tell Apache that you want route all requests coming paths you don't have files for to the redirect script, So example.com/whatever will be handled by pesto.php - To do that, you need to create a `.htaccess` file in the folder you wanna redirect from (usually the web-root, so something like `/var/www` or `/htdocs`) with the following content:
```
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^(.+) - [PT,L]

RewriteRule ^(.*)$ pesto.php?id=$1 [L,QSA]

```
### 2. Get pesto.php™
Now, get that delicious `pesto.php` file into your folder. You can copy the content from here on GitHub, clone this Repo or send a carrier pigeon with the code to your server provider, I don't care.
### 3. Links, links, links
Now here's where how the magical `pesto.php` script will know what to redirect to where... the secret lays in a file you have to create called, you guessed it, `redirects.txt`. In it you can easily define all your redirects in the following format:
```
/test -> https://example.org
/pasta -> https://www.barilla.com
/freemoney -> https://www.youtube.com/watch?v=dQw4w9WgXcQ
```
You get it, right?
### 4. Enjoy the ✨magic✨
Well, congrats - you're done! Enjoy your Pesto, err redirects. Enjoy your redirects.

_Enjoy_
