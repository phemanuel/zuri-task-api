# REST API FOR MANAGING PERSONS

This is a simple RESTful API built with Laravel to manage persons. It allows you to perform CRUD (Create, Read, Update, Delete) operations on a "person" resource, using the person's id as the identifier.

- Create a new person
- Fetch a person by name
- Modify a person by name
- Delete a person  by name

## Getting Started
These instructions will help you set up and run the API on your local development environment.
#### Prerequisites
To run this API, you need to have the following software installed:

•	PHP

•	Composer

•	Laravel

#### Installing
1.	Clone the repository to your local machine:
	
    git clone repository-url 

2.	Navigate to the project directory:

    cd project-directory 

3.	Install the project dependencies using Composer:

    composer install 

4.	Configure your environment variables in the .env file and setting up your database connection:

5.	Generate an application key:
	
    php artisan key:generate 

6.	Run database migrations to create the necessary tables:
   
    php artisan migrate 

7.	Start the development server:

    php artisan serve 

Your API should now be running at http://localhost:8000.

#### API Endpoints
You can use tools like cURL or Postman to interact with the API endpoints.
#### - List All Persons
•	Endpoint:http://localhost:8000/api

•	HTTP Method: GET

•	Description: Retrieve a list of all persons in the database.

•	Usage : curl -X GET http://localhost:8000/api

•	Result :

```sh
{
"data": [
{
"id": 1,
"name": "Femi Akinyooye"
}
],
"pagination": {
"current_page": 1,
"last_page": 1,
"total": 1,
"per_page": 5,
"prev_page_url": null,
"next_page_url": null
},
"status": 200
}
```
#### - Create a New Person
•	Endpoint:http://localhost:8000/api

•	HTTP Method: POST

•	Description: Create a new person.

•	Usage : curl -X POST -H "Content-Type: application/json" -d '{"name":"Name"}' "http://localhost:8000/api"

•	Result :
```sh
{
    "name": "Femi Akinyooye",
    "message": "Person created successfully",
    "status": 201
}
```
#### - Retrieve a Person 
•	Endpoint:http://localhost:8000/api/

•	HTTP Method: GET

•	Description: Retrieve a person.

•	Usage : curl -X GET http://localhost:8000/api/id

•	Result :
```sh
{
    "name": {
    "id": 1,
    "name": "Femi Akinyooye"
    },
    "status": 200
}

```
#### - Update a Person by Name
•	Endpoint:http://localhost:8000/api/id

•	HTTP Method: PUT

•	Description: Update a person.

•	Usage : curl -X PUT -H "Content-Type: application/json" -d '{"name":"NewName"}' http://localhost:8000/api/id

•	Result :
```sh
{
    "name": {
        "id": 1,
        "name": "Femi Emmanuel Akinyooye"
    },
    "message": "Person updated successfully",
    "status": 200
}
```

#### - Delete a Person by Name
•	Endpoint:http://localhost:8000/api/

•	HTTP Method: DELETE

•	Description: Delete a person.

•	Usage : curl -X DELETE http://localhost:8000/api/id

•	Result :
```sh
{
    "name": {
        "id": 1,
        "name": "Femi Emmanuel Akinyooye"
    },
    "message": "Person deleted successfully",
    "status": 200
}
```

### Note
•	You can get the id of a person by listing all persons using this endpoint (http://localhost:8000/api).
#### Error Handling
•	If a requested person is not found, the API will respond with a 404 Not Found status.

```sh
{
    "message": "Person not found",
    "status": 404
}
```
#### - UML diagram
•	https://drive.google.com/file/d/1fhKRJ-b6fm1_PuCfzy3kn7ba-Xa2Acv3/view?usp=drive_link
