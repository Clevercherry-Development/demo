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

you should not have a basic app running at http://localhost:8088 that can be accessed on your local machine.

