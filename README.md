# Hướng dẫn cách sử dụng dự án
## Bước 1: Clone source dự án
Thực thi câu lệnh sau:
```
git clone https://github.com/tranquoc-thang/ConstructionManagement.git
```

## Bước 2: Khởi tạo, kết nối database
Hiệu chỉnh file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbconstructionmanagement2
DB_USERNAME=root
DB_PASSWORD=
```

## Bước 3: Tạo database
Chạy xampp, mở trang phpmyadmin tạo database tên dbconstructionmanagement2.
Lưu ý: File sql nằm trong thư mục database

## Bước 4: Chạy project
```
php artisan serve
```

## Bước 5: Thông tin tài khoản truy cập hệ thống
Tài khoản Admin:
admin@gmail.com / 123456

Tài khoản Manager:
manager@gmail.com / 123456

Tài khoản Moderator:
moderator@gmail.com/ 123456
