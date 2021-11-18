# Dataswitcher Tech Challenge

## Goal

The objective for this challenge is to convert a small set of data from CSV format into a database, mapping the data according to the given specifications.

Only map data that is directly available on target, skipping all that is unneeded.

## Contents

`data` - folder containing the CSV files to convert

`specs` - specifications for the target format

`README.md` - instructions on how to compete this challenge

## Requirements

1. Clone this repository and develop the solution in your own repository

2. You should setup a Docker configuration so that we can run the conversion directly from the CLI. This involves installing all the required libraries, creating database structure, etc. It should be ready to use with a couple of commands.

3. Document the components you used and how can we run your application

4. Use PHP (It can be vanilla, external packages or a framework)

5. You can use Mongodb, MySQL, SQLite, etc for database but you must provide instructions on how to check the end result

6. Without over engineering use SOLID principles and OOP best practices (interfaces, models, strategies, mappers, etc)

## Bonus

The following will be highly valued in your application

1. Add the current balance to the accounts. Feel free to explore the data and to find that info.

2. Change the type of transactions that are invoices. Feel free to explore the data to find that info.

3. Use a TDD approach to your solution

## Get started

Good luck!
