Include appropriate documentation using Postman to provide a clear and concise overview of the API, its endpoints, parameters, and responses


BEFORE USING THIS READ THIS ,IS IMPORTANT



Please note that you should replace {access_token} with the actual access token received during the login process. Adjust the URL and request parameters as needed based on your specific implementation.




  API Overview:
The Blogging Platform API allows users to create, read, update, and delete blog posts. Users can register and authenticate to manage their own posts. The API uses token-based authentication with Laravel Passport.

API Base URL: http://your-domain/api

Endpoints:

User Registration

Method: POST
URL: /register
Parameters:
name (string, required): User's name.
email (string, required): User's email address.
password (string, required): User's password.
Response:
Success: 201 Created
Error: 400 Bad Request, 422 Unprocessable Entity
User Login

Method: POST
URL: /login
Parameters:
email (string, required): User's email address.
password (string, required): User's password.
Response:
Success: 200 OK
Error: 401 Unauthorized
Create Blog Post

Method: POST
URL: /blog-posts
Headers:
Authorization: Bearer {access_token}
Parameters:
title (string, required): Title of the blog post.
content (string, required): Content of the blog post.
Response:
Success: 201 Created
Error: 401 Unauthorized, 422 Unprocessable Entity
Retrieve All Blog Posts

Method: GET
URL: /blog-posts
Headers:
Authorization: Bearer {access_token}
Response:
Success: 200 OK
Error: 401 Unauthorized
Retrieve a Specific Blog Post

Method: GET
URL: /blog-posts/{id}
Headers:
Authorization: Bearer {access_token}
Response:
Success: 200 OK
Error: 401 Unauthorized, 404 Not Found
Update Blog Post

Method: PUT
URL: /blog-posts/{id}
Headers:
Authorization: Bearer {access_token}
Parameters:
title (string, required): Updated title of the blog post.
content (string, required): Updated content of the blog post.
Response:
Success: 200 OK
Error: 401 Unauthorized, 404 Not Found, 422 Unprocessable Entity
Delete Blog Post

Method: DELETE
URL: /blog-posts/{id}
Headers:
Authorization: Bearer {access_token}
Response:
Success: 204 No Content
Error: 401 Unauthorized, 404 Not Found







// both documentation are the same







# Blogging Platform API

API Base URL: `http://your-domain/api`

## User Registration

- Method: POST
- URL: `/register`

### Parameters

- name (string, required): User's name.
- email (string, required): User's email address.
- password (string, required): User's password.

### Response

- Success: 201 Created
- Error: 400 Bad Request, 422 Unprocessable Entity

---

## User Login

- Method: POST
- URL: `/login`

### Parameters

- email (string, required): User's email address.
- password (string, required): User's password.

### Response

- Success: 200 OK
- Error: 401 Unauthorized

---

## Create Blog Post

- Method: POST
- URL: `/blog-posts`

### Headers

- Authorization: Bearer {access_token}

### Parameters

- title (string, required): Title of the blog post.
- content (string, required): Content of the blog post.

### Response

- Success: 201 Created
- Error: 401 Unauthorized, 422 Unprocessable Entity

---

## Retrieve All Blog Posts

- Method: GET
- URL: `/blog-posts`

### Headers

- Authorization: Bearer {access_token}

### Response

- Success: 200 OK
- Error: 401 Unauthorized

---

## Retrieve a Specific Blog Post

- Method: GET
- URL: `/blog-posts/{id}`

### Headers

- Authorization: Bearer {access_token}

### Response

- Success: 200 OK
- Error: 401 Unauthorized, 404 Not Found

---

## Update Blog Post

- Method: PUT
- URL: `/blog-posts/{id}`

### Headers

- Authorization: Bearer {access_token}

### Parameters

- title (string, required): Updated title of the blog post.
- content (string, required): Updated content of the blog post.

### Response

- Success: 200 OK
- Error: 401 Unauthorized, 404 Not Found, 422 Unprocessable Entity

---

## Delete Blog Post

- Method: DELETE
- URL: `/blog-posts/{id}`

### Headers

- Authorization: Bearer {access_token}

### Response

- Success: 204 No Content
- Error: 401 Unauthorized, 404 Not Found
