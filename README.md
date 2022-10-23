# Fullcomms Technical Test

## Introduction

The scenario is purely fiction

At Fullcomms our developers within the development team are not the greatest cooks. The
majority of the time they prefer to order some food to eat whilst working away at code or
like to wander to a restaurant where someone will cook for them because why waste time
cooking food when you can spend it on coding.

The one thing the team all agrees on is that where ever they go to eat at or they choose to
order from, the establishment chosen must have a good food hygiene rating as they would
rather not find anything unsanitary in their food.

Looking up various restaurants on Google and searching for their Food Hygiene rating can be
time-consuming so would like to develop a quick web application they can use to find all the
cleanest places to eat (disregarding location ), however, they've not got the time to do it.
Fortunately for you, you've discovered there is a Food Hygiene Rating Scheme (FHRS) API
available where this information is widely available for use.

## Task

Using your spare time and development skillset, you are going to develop a small system that
will consume the **FHRS API** and store the information locally using a database of your
choosing. You will use the **Laravel Framework** to utilise its features and deliver the solution
using this framework.

To further flex your skillset and understanding you will also make a small Frontend GUI which
will allow us lazy developers the ability to view an area and sort the results alphabetically as
well as by hygiene score rating.


Additionally (Optional if you want to show of more skills) we would like the ability to alter the
database directly via an API (no direct access to the DB) so we can edit business names, rate
them ourselves and even delete the ones we don’t like without worry they will return on
another sync from FSHR.

### Requirements

To break down the task into smaller sections, the following requirements are expected to be
implemented

- [ ] A way in which the FHRS API can be consumed and saved to a MySQL database or one
  of your choosing.
- [ ] A small web form view where the lazy developers can put in a location/region and see
  the information. e.g. Manchester will return all data relating to Manchester
- [ ] A way of ordering the data from highest rating to lowest as well as alphabetically.
- [ ] (Optionally) A small RESTful API as described above that other developers can then
  use to access your saved database and make changes and rate the places personally.

### Setup & Notes

A suitable environment either locally, with a VM or using Docker to be able to run the
following;

- PHP
- Database e.g. MySQL
- Composer

You should take some time to look at the FHRS API and see what type of data is returned,
you should also use this data to define your database tables and models to be created by you.

Documentation for the framework can be found here Laravel Docs

FHRS API documents can be found here FHRS API

## Delivery & Assessment

Once you've completed this task you should inform us as well as provide us with a copy of the
code. This can be achieved by either supplying is us with the code directly in a .zip or .rar
file. Alternatively you can link us to a public repository we can clone down.

The end structure of your archived file or repository should reflect what a project would
look like on github/bitbucket as if it were going to be deployed onto a server and shouldn't
contain any possible conflicting files which would conflict with other developers.
What we will be assessing is your ability and confidence with PHP and the Laravel framework,
how well you leverage it's built-in features and utilize what is available to you to deliver a
robust piece of code. The way you write your PHP code and the logic behind your decision
making and overall application will be looked at.

Where some of Laravels additional packages such as Jetstream will handle a lot of the API
logic and permissions, we would favour you not using this package so you can show your


understanding without the need to use that particular package. Other packages such as
fortify are welcome.

The main assessment of the task is orientated around backend development so the frontend
visuals are not as important, however, if you feel confident and would like to flex your
frontend/fullstack ability then feel free to develop the small frontend portion in any way you
see fit.

## TODO:

 - [ ] A way in which the FHRS API can be consumed and saved to a MySQL database or one
  of your choosing.
   - [ ] Create a migrations 
   - [ ] Create a seeder
   - [ ] Fetch Data From external Api
   - [ ] Save data to mysql Database
- [ ] A small web form view where the lazy developers can put in a location/region and see
  the information. e.g. Manchester will return all data relating to Manchester
  - [ ] Create a view to show all restaurants
  - [ ] Create search form to filter results
  - [ ] Ability to search by lat/long radios
- [ ] A way of ordering the data from highest rating to lowest as well as alphabetically.
- [ ] (Optionally) A small RESTful API as described above that other developers can then
  use to access your saved database and make changes and rate the places personally.
