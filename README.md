
# AgencyIt




User entity can be admin or employee . admin can do CRUD on user and Review or assign user as reviewer. employee who is reviewer can create a review .once it created cannot resubmit by employee.



    
## Prerequisites
Laravel 9 
mySQL 8.0.27 
PHP 7.4.

## Installation

git clone https://github.com/mohamedswelam1/AgencyIt.git


composer require laravel/sanctum

php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

php artisan migrate:fresh --seed
    