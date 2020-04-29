mkdir pizzatest
cd pizzatest
npm init -y
npm install --save react react-dom next
mkdir pages


php artisan migrate
php artisan db:seed --class=AdminSeeder