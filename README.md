# Star Wars Data Downloader

This project simply downloads all information about Star Wars heroes from [SWAPI](https://swapi.dev/) and
saves it to a MySQL database for later convenient access

## Setup

1. Download project: `$ git clone https://github.com/Heaven31415/swdd.git`

2. Change to its directory: `$ cd swdd`

3. Create local `.env` file: `$ cp .env .env.local`

4. Configure the value of `DATABASE_URL` environment variable in `.env.local` file
so you can connect to your MySQL server

5. Run `$ bin/setup` bash script to install project dependencies and setup database

## Run data downloader

`$ bin/console app:download-data`
