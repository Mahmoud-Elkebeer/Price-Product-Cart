## Installation

Clone Repository

`git clone git@github.com:Mahmoud-Elkebeer/Multi-Providers.git`

Move to the newly created directory

`cd price-products-cart`

Create a new .env file from .env.example

`cp .env.example .env`

Now edit your .env file and set your env parameters (Specially the database username/pass, database name)

Install dependencies

`composer install`

Generate a new key for your app

`php artisan key:generate`

Reload Database

`php artisan migrate:refresh --seed`

Done, You're ready to go

`php artisan serve`

Run this API  `{{base}}/api/v1/checkout` through Postman

Method `POST`

Body 
`{
'currency': "USD",
'products':[
    {
        "id": 1,
        "amount": 2
    },
    {
        "id": 4,
        "amount": 1
    },
    {
        "id": 3,
        "amount": 1
    }
]
}`
