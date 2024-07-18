Steps:
1. pake php 8.1 atau lebih
2. copy .env example menjadi .env, lalu edit sesuaikan dengan konfigurasi local
3. import sql ke database, file sql ada pada folder database
4. jalankan composer install atau composer update
5. jalankan php artisan key:generate
6. jalankan php artisan storage:link
7. jalankan aplikasi (php artisan serve)
