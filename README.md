# REST API FOR MANAGING PERSONS

This is a simple RESTful API built with Laravel to manage persons. It allows you to perform CRUD (Create, Read, Update, Delete) operations on a "person" resource, using the person's name as the identifier.

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
git clone <repository-url> 
2.	Navigate to the project directory:
cd <project-directory> 
3.	Install the project dependencies using Composer:
composer install 
4.	Configure your environment variables by copying the .env.example file to .env and setting up your database connection:
cp .env.example .env 
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
•	Endpoint:http://localhost:8000/api/
•	HTTP Method: GET
•	Description: Retrieve a list of all persons in the database.
•	Usage : curl -X GET http://localhost:8000/api/
•	Result :
```sh
{
    "names": [
        {
            "id": 1,
            "name": "Akinkunmi"
        }
    ],
    "status": 200
}
```
#### - Create a New Person
•	Endpoint:http://localhost:8000/api/
•	HTTP Method: POST
•	Description: Create a new person.
•	Usage : curl -X POST -H "Content-Type: application/json" -d '{"name":"Name"}' http://localhost:8000/api/
•	Result :
```sh
{
    "name": "Miracle Peters",
    "message": "Person created successfully",
    "status": 200
}
```
#### - Retrieve a Person by Name
•	Endpoint:http://localhost:8000/api/person
•	HTTP Method: GET
•	Description: Retrieve a person by their name.
•	Usage : curl -X GET http://localhost:8000/api/person?name=NameOfThePerson
•	Result :
```sh
{
    "names": [
        {
            "id": 1,
            "name": "Akinkunmi"
        }
    ],
    "status": 200
}

```
#### - Update a Person by Name
•	Endpoint:http://localhost:8000/api/person
•	HTTP Method: PUT
•	Description: Update a person by their name.
•	Usage : curl -X PUT -H "Content-Type: application/json" -d '{"new_name":"NewName"}' http://localhost:8000/api/person?name=OldName
•	Result :
```sh
{
    "name": {
        "id": 5,
        "name": "Miracle Peter Onyedikachi"
    },
    "message": "Person updated successfully",
    "status": 200
}
```

#### - Delete a Person by Name
•	Endpoint:http://localhost:8000/api/person
•	HTTP Method: DELETE
•	Description: Delete a person by their name.
•	Usage : curl -X DELETE http://localhost:8000/api/person?name=NameOfThePerson
•	Result :
```sh
{
    "name": {
        "id": 4,
        "name": "Paul Awolola"
    },
    "message": "Person deleted successfully",
    "status": 200
}
```
#### Error Handling
•	If a requested person is not found, the API will respond with a 404 Not Found status.
```sh
{
    "message": "Person not found",
    "status": 404
}
```
#### - UML diagram
•	https://drive.google.com/file/d/1IpAED2FYPOEkg_8FDw8SoupbMaLVIF_x/view?usp=drive_link
