

### 1. clone the Package & install the packages

```
git clone https://github.com/TakiDDine/codpanel_official.git
```
```
cd codpanel_official
```
```
composer install
```

### 1. setup env file
   
   Run this commands from the Terminal:

	cp .env.example .env
	php artisan key:generate


### 2. Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```


### 3. setup the database & add admin & some dummy data

Run this commands from the Terminal:

	php artisan migrate
	php artisan make:admin
	php artisan make:data

 
### 4. you can login to dashboard  
	
you can login from  /dashboard
 
	user : admin@admin.com
	pass : 1234

### 4. Change permissions
	
Run this commands from the Terminal:
 
	sudo chmod -R 777 /var/www/panel.takiddine.co/storage
	sudo chmod -R 777 /var/www/panel.takiddine.co/public
	sudo chmod -R 777 /var/www/panel.takiddine.co/bootstrap/cache
