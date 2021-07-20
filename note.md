git init // cài git vào project
git remote add origin <url> // thêm đường dẫn git web vào project
git remote -v "khoi tao project" // Kiểm tra đường dẫn
git status // kiểm tra trạng thái các file

git add . //đăng ký các thay đổi với git -> git sẽ quản lý các file này
git commit -m // Khởi tạo project
git push origin master // dùng 1 lần duy nhất sau khi khởi tạo dự án


git checkout -b lesson2_migrations
git status
git add .
git commit - m "Lesson 2: Migration"
git push origin lesson2_migrations

<!-- migration -->
php artisan make:migration create_products_table
php artisan make:migration update_products_table_add_fk --table=products
<!-- Đồng bộ với db -->
php artisan migrate

php artisan migrate:rollback
php artisan migrate:refresh
php artisan migrate:fresh


<!-- Tạo dữ liệu ảo -->
1. Tạo file seeder và tạo dữ liệu cần thêm
php artisan make:seeder UserSeeder

DB::table('users')->insert($data);
2. Vào file DatabaseSeeder.php thêm vào: 
    $this->call(UserSeeder::class);

3. Chạy lệnh để run
    php artisan db:seed
    php artisan db:seed --class=UserSeeder
    
    https://laravel.com/docs/8.x/seeding#running-seeders
    https://github.com/HoangTien339/laravel-base
    https://github.com/PolyDocuments/web4012_giao_an
    
B3: MVC
Model -> Đại diện cho dữ liệu trong DB
View  -> Hiển thị
Controller -> Xử lý, điều hướng các request
Route -> Điều khiển 

4. Tạo model
    php artisan make:model <TenModel>
5. Quy tắc đặt tên
    - Tên table trong DB: users, products, categories
    - Tên model: User, Product, SinhVien, LopHoc
