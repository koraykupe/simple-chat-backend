# Simple PHP Chat Backend
This project was developed for bunq interview. I used Lumen micro-framework.

# Installation
composer install

duplicate .env.example file and rename it as .env

open .env file

Set a app key that is random 32 character

Set DB_CONNECTION as sqlite

Set DB_DATABASE AS /YOUR-FULL-PATH/simple-chat-backend/database/db.sqlite

Change YOUR-FULL-PATH with your installation path

#REQUIREMENTS
PHP >= 5.6.4

OpenSSL PHP Extension

PDO PHP Extension

Mbstring PHP Extension

#TODO
- Ordering options for get user messages API
- Update a message
- Delete a message
- Exception if user doesn't exist
- Add more output (HTML, XML, etc)
- Authentication
