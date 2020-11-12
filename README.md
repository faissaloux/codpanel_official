

##	Step By Step To codpanel



1. clone the Package



1 ) Run this commands from the Terminal:

	 cmd cp .env.example .env
	 php artisan key:generate


2 ) Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```


3 ) Run this commands from the Terminal:

	 php artisan migrate
	 php artisan make:admin
	 php artisan make:data

 

4 ) you can login to dashboard  /dashboard

	user : admin@admin.com
	pass : 1234

