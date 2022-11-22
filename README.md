## About Project
**Social Network backend API developed with laravel 9.x**
### - Installation Guide
Clone the project` git clone  https://github.com/moshi-soft/social-network.git`

Run `composer install`

copy .envExample into .env

setup database

run `php artisan migrate`

Install Insomnia api testing tool and import the insomnia.json file

Done.

## Implemented API listed below.

### Base URL
http://127.0.0.1:8000/api
### Header
`Content-Type`

### Response
All response in json format

### List of API Implemented
| HTTP Method | URL                                 | Bearer Token | JSON BODY Example                                                                                                                                 | Description                                   |
|-------------|-------------------------------------|--------------|---------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------|
| **POST**    | `base_url`/auth/register            |              | `{"first_name":"Moshiur","last_name":"Rahman",<br/>"email":"rmoshiur81@gmail.com"<br/>,"password":"12345678","password_confirmation":"12345678"}` | Registration Page for being member            |                                           |
| **POST**    | `base_url`/auth/login               | `required`   | `{"email":"akash@gmail.com","password":"12345678"}`                                                                                               | Login after being registered                  |
| **POST**    | `base_url`/page/create              | `required`   | `{"page_name":"Page sample"}`                                                                                                                     | Create page                                   |
| **PUT**     | `base_url`/follow/person/personId   | `required`   | N/A                                                                                                                                               | Follow any person                             |
| **PUT**     | `base_url`/follow/page/pageId       | `required`   | N/A                                                                                                                                               | Follow any page                               |
| **POST**    | `base_url`/person/attach-post       | `required`   | `{"post_content":"Content sample person based"}`                                                                                                  | Post content as person                        |
| **POST**    | `base_url`/page/pageId/attach-post  | `required`   | `{"post_content":"Content sample page based"}`                                                                                                    | Post content From page                        |
| **GET**     | `base_url`/person/feed              | `required`   | N/A                                                                                                                                               | Get feeds from the follwing persons and pages |
| **POST**    | `base_url`/logout                   | `required`   | N/A                                                                                                                                               | Logout                                        |
