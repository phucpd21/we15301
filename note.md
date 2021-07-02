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