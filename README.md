### 1. Встановлення залежностей для фреймворка Laravel.
```
composer install
```

### 2. Генерація ключа застосунку.
```
php artisan key:generate
```

### 3. В залежності від використання MongoDB або MySQL, бази даних.

#### 3.1. Для використання MongoDB, лише запуск посіву даних (заповнення колекцій базовими даними).
```
php artisan db:seed --class=Database\\Seeders\\MongoDB\\ShowSeeder
```

#### 3.2. Для використання MySQL, необхідно замінити у файлах контролерів імпорт моделей MongoDB на моделі MySQL, замінити у конфігураційному файлі використання драйверу mongodb на mysql, і лише потім запустити міграції (створення таблиць БД) та запустити посів даних (заповнення таблиць базовими даними).
##### Заміна імпорту моделей MongoDB на моделі MySQL в контролері [IndexController.php](https://github.com/miikabachok/docker-seo-environment/blob/master/project/app/Http/Controllers/IndexController.php).
```
//use App\Models\MongoDB\Show;
use App\Models\Show;
```

##### Заміна імпорту моделей MongoDB на моделі MySQL в контролері [ShowController.php](https://github.com/miikabachok/docker-seo-environment/blob/master/project/app/Http/Controllers/ShowController.php).
```
//use App\Models\MongoDB\Order;
//use App\Models\MongoDB\Show;
use App\Models\Order;
use App\Models\Show;
```

##### Заміна у конфігураційному файлі [.env](https://github.com/miikabachok/docker-seo-environment/blob/master/project/.env) драйверу mongodb на mysql.
```
#DB_CONNECTION=mongodb
DB_CONNECTION=mysql
```

##### Запуск міграцій (створення таблиць БД) та запуск посіву даних (заповнення таблиць базовими даними).
```
php artisan migrate --path=./database/migrations/2023_11_30_145143_create_halls_table.php \
    && php artisan migrate --path=./database/migrations/2023_11_30_145144_create_shows_table.php \
    && php artisan migrate --path=./database/migrations/2023_11_30_145145_create_show_meta_table.php \
    && php artisan migrate --path=./database/migrations/2023_12_02_124645_create_orders_table.php \
    && php artisan migrate --path=./database/migrations/2023_12_02_125343_create_order_seats_table.php \
    && php artisan migrate --path=./database/migrations/2024_01_27_105544_create_gallery_table.php \
    && php artisan db:seed --class=Database\\Seeders\\HallSeeder \
    && php artisan db:seed --class=Database\\Seeders\\ShowSeeder \
    && php artisan db:seed --class=Database\\Seeders\\ShowMetaSeeder \
    && php artisan db:seed --class=Database\\Seeders\\GallerySeeder
```