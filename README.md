# demo
Welcome to our demo Laravel project. This can be used as a learning tool for Laravel and various database sources that are compatiable with Eloquent.

## Getting Started
To get started with this project you will need the following installed
- Docker Desktop
- Git
- Coding IDE such as VSCode
- Database IDE such as MongoDB Compass
- Optionally Warp for the command line (AI based command line app)

### Docker Desktop
Downlaod and install based on your local environment https://www.docker.com/get-started/

### Git
Follow the installation instructions for bre https://brew.sh/ and then run the following in your chosen command line app

`brew install git`

### VS Code
Download and install based on yourt local environment https://code.visualstudio.com/

### MongoDB Compass
Download and install based on your local environment https://www.mongodb.com/try/download/compass

### Warp
Download and install based on your local environment https://warp.ai/

## Running the instial application
Make sure you have Docker running as a service, open a command prompt, nvigate to the folder where you want to store the applications files and then run the following

```
git clone git@github.com:Clevercherry-Development/demo.git
cd demo
docker compose up --build -d
```

you should not have a basic app running at http://localhost:8088 that can be accessed on your local machine. To complete the install of Laravel do the following.

Ensure that the connection to MongoDB is defined in your .env file as shown, along with the database name and the default connection set to mongodb. The username and password is the one defined in the `docker-compose.yaml` file in the mongodb service

```
DB_CONNECTION=mongodb
MONGODB_URI="mongodb://<user>:<password>@mongodb:27017"
MONGODB_DATABASE="<db_name>"
```

Once this is done, run the following in a command prompt when in the root folder of your project

```
docker compose exec php bash
composer update
php artisan migrate
php artisan db:seed
```

