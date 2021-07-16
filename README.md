# Experiment for Wireless Logic

### Install dependencies
All dependencies are included via composer. Simply run `composer install` inside the root folder and this should create the vendor folder with all required dependencies.


### How to run the app


### How to run tests 
Once all dependencies have been installed (see above), simply run the command below.
`./vendor/bin/phpunit`
or for a more convenient way you can run `./run-tests.sh` as it will run all the tests with a few extra configurations


### Initial Challenge 
Using best practice coding methods, build a console application that scrapes the following website url https://videx.comesconnected.com/ and returns a JSON array of all the product options on the page.
Your code should:
This task is intended to test your ability to consume a webpage, process some data and present it. While there is no specific time limit, we would not expect you to spend any longer than 2 hours completing this.

We are looking for concise, testable, clean, well commented code and that you have chosen the right tools for the right job. We will also be looking at your app structure as a whole.

Each element in the JSON results array should contain ‘option title, ‘description’, ‘price’ and ‘discount’ keys corresponding to items in the table. The items should be ordered by annual price with the most expensive package first.
• Include unit tests.
• Include a README.md file in the root describing how to run the app, how to run tests and any
dependencies needed from the system
• The application should be written in PHP
You may use a dependency management system (e.g. composer) and as many dependencies as you like.


