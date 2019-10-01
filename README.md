# website-ecommerce
Website Ecommerce HP Casing

Step
1. taro di folder yang akan disimpan dan jalankan perintah "git clone https://github.com/yafimm/website-ecommerce.git"
2. masuk ke folder hasil clone, lalu jalankan perintah "composer update"
3. jalankan perintah "npm install" lalu "npm run dev"
4. setelah langkah ketiga, jalankan perintah berikut "copy env.example .env"  atau "cp .env.example" (atau bisa copy manual, dengan cara copy file .env.example jadi .env
5. masuk ke file .env, lalu konfigurasi nama database dengan "website-ecommerce", user = root, password kosongkan
6. Buat database dengan nama "website-ecommerce"
7. lalu jalankan perintah "php artisan migrate" dan "php artisan db:seed" untuk mengenerate table dan datanya ke database
8. nyalakan mysql dan webserver, lalu jalankan perintah  "php artisan serve"
 
