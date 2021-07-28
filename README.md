## Build the image 

```bash 
docker image build --tag terdia07/php-7.4 .
```

## Run th container 

```bash 
docker container run -d --name mtr --publish 80:80 --mount type=bind,source="$(pwd)",target=/var/www/html terdia07/php-7.4
```

### Enter the container 
`docker exec -it mtr bash` 

#### Install phpunit and setup autoloading by running:
 `cd /var/www/html && composer install` 

#### Run test: 
`./vendor/bin/phpunit tests --testdox`

#### Commands: 
`php index.php count_by_vendor_id 35`

`php index.php count_by_price_range 15 60`

#### Visit: http://localhost



    
    
   
    



