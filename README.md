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
cp .env.example .env

### Create Environment Source
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_password

### Run all migrations:
docker-compose run --rm artisan migrate