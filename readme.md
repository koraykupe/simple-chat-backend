# Simple PHP Chat Backend
This project was developed for bunq interview. I used Lumen micro-framework.

All API codes are under app/Chat folder.
Output format is JSON but i created an interface to add more types in future.
I used Eloquent ORM of the framework.
No any authentication system, so everybody can add a message using user ids.

Routing codes are in routes/web.php file.

#Usage

**Get unread messages of a user:**

GET `yourdomain/user/messages`

Send a valid `user_id (int)`

It returns messages


**Add a message to a user:**

POST `yourdomain/user/messages`

Send a valid `user_id (int)` and `message (string)`

It updates the messages as read and returns them


# Installation
- composer install
- duplicate .env.example file and rename it as .env
- open .env file
- Set a app key that is random 32 character (not required)
- Set DB_CONNECTION as sqlite
- Set DB_DATABASE AS /YOUR-FULL-PATH/simple-chat-backend/database/db.sqlite
- Change YOUR-FULL-PATH with your installation path

#REQUIREMENTS
- PHP >= 7.*
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension

#TODO
- Ordering options for get user messages API
- Update a message
- Delete a message
- Add more output types (HTML, XML, etc)
- Authentication
