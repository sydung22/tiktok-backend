| Software  | Port |
| --- | --- |
| nginx  | 8080  |
| phpmyadmin  | 8081  |
| mysql  | 3036  |
| php  | 9000  |
| xdebug  | 9001  |
| redis  | 6379  |

# Step Run Project

### Create Environment Docker
```sh
cp .env.example .env
```

### Create Environment Source
```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_password
DB_ROOT_PASSWORD=secret
```

### Run projects
```sh
docker-compose up --build
docker-compose run --rm composer install
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan jwt:secret
```

### Run all migrations:
```sh
docker-compose run --rm artisan migrate --seed
```

### Docs postman api
https://documenter.getpostman.com/view/13861728/UyxnD4nA