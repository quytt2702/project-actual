## Về hệ thống MSM

MSM là hệ thống quản lý nhiều cửa hành kinh doanh cho phép thay đổi giao diện theo người dùng

## Cơ sở dữ liệu

Xem cơ sở dữ liệu tại [đây](https://drive.google.com/file/d/153tNx1KojRbd_qNVqabrDhch81vj3vUb/view?usp=sharing).

## Docker

Docker là một open platform cung cấp cho người sử dụng những công cụ và service để người sử dụng có thể đóng gói và chạy chương trình của mình trên các môi trường khác nhau một cách nhanh nhất.

Để build docker
```
docker-compose up -d --build
```
Để chạy docker-compose
```
docker-compose up -d (./jarvis up)
```
Để tắt docker
```
docker-compose down (./jarvis down)
```
Để dừng docker
```
docker-compose stop (./jarvis stop)
```
Để xem log docker web
```
docker-compose logs web
```

## Git

Git là tên gọi của một Hệ thống quản lý phiên bản phân tán (Distributed Version Control System – DVCS)

Để theo dõi các thay đổi
```
git add .
```

Để commit các tập tin
```
git commit -m '[những thay đổi ở đây]'
```

Để đồng bộ các tập tin từ local lên server (origin)
```
git push origin [tên nhánh]
```

Để đồng bộ các tập tin từ server xuống local
```
git pull origin [tên nhánh]
```

## Chuẩn đặt tên biến

Cập nhật sau

## Tạo xác thực folder public/images/xac-thuc và cấp quyền đọc ghi
