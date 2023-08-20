# test-gvo

This is an example Symfony application for working with a REST API.

## Installation

1. Clone the repository to your local machine:
   git clone https://github.com/vzubchenko/test-gvo.git
   cd your-repo
2. composer install
3. symfony serve
4. Now the application works on my base. If you want to use your own, change the permissions in .env and migrate.
5. Endpoints
   Most Sold Products Report: https://127.0.0.1:8000/report
   Get the list of products: curl -X GET https://127.0.0.1:8000/api/products
   Get product information by ID: curl -X GET https://127.0.0.1:8000/api/products/1

## Answers to questions
1. Summarize your solution and any lessons learned during the development process. You can
   also include any recommendations for future improvements or enhancements to the solution.

   During the development process, a REST API was created for managing products and orders using Symfony. 
   Key milestones included configuring entities, creating migrations for the database, implementing controllers, 
   routing, and views for the web interface.

2. Describe the overall design of the solution, including any architecture, data models,
   algorithms, or other technical details that you will be implementing.

   The overall design of the solution included the following components:
   Entities: Product and Order, related by a one-to-many relationship.
   Controllers: ProductController and OrderController for handling requests and generating responses.
   Routing: Defining routes to handle HTTP requests to the API and web interface.
   Views: Using Twig to generate HTML pages for the web interface.
   Migrations: Creating and applying migrations to modify the database schema. 

3. (If you didn’t supply tests) What test cases would you write and how?
   Testing the creation, retrieval, updating, and deletion of products through the API.
   Testing the creation, retrieval, updating, and deletion of orders through the API.
   Testing the retrieval of the most sold products report through the API.
   Testing the correctness of generating and handling HTTP requests and responses.
   Testing data validation and error handling on the server side.
   As an alternative, if testing was required, libraries like PHPUnit could be used for unit testing, 
   and Guzzle or cURL for functional API testing. Additionally, for testing the web interface, 
   UI testing libraries like Symfony Panther or Selenium could be employed.

## Feedback
I would appreciate your feedback.
Telegram: https://t.me/Victor_Zubchenko
Email: Zubchenko.victor@gmail.com