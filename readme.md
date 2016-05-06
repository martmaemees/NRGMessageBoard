## Message board

## Installation


```
#!shell


git clone https://PyroVx@bitbucket.org/PyroVx/messageboard.git

# Install the composer dependencies.
composer install

# Create the .env file
cp .env.example .env

#Generate a random application key.
php artisan key:generate

# Set the database details in the .env file.
DB_HOST=[database location]
DB_DATABASE=[database name]
DB_USERNAME=[database username]
DB_PASSWORD=[database password]

# Migrate the database
php artisan migrate
```


### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)