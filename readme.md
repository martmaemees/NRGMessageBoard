## Message board

## Installation


```
#!shell


git clone https://PyroVx@bitbucket.org/PyroVx/messageboard.git

# Install the composer dependencies.
composer install

cp .env.example .env

php artisan key:generate

# Set the database details
DB_HOST=[database location]
DB_DATABASE=[database name]
DB_USERNAME=[database username]
DB_PASSWORD=[database password]
```


### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)