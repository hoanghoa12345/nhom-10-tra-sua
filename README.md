# Tìm hiểu XML và ứng dụng xây dựng hệ thống quản lý quán trà sữa

## Giới thiệu
-	Xây dựng hệ thống quản lý quán trà sữa với giao diện web cho phép sử dụng trên nhiều nền tảng.
-	Ứng dụng XML để xây dựng cơ sở dữ liệu với chức năng thêm, sửa, xóa thông tin.
<p align="center">
  <img src="https://user-images.githubusercontent.com/44923253/151947997-66ba7091-f7ab-4ac4-aac9-a381d4727d18.png" alt="Trang quản lý"/>
</p>

## Công cụ sử dụng

* [CodeIgniter](http://codeigniter.com)
* [XmlDB](https://github.com/alaca/xmldb)


## Các chức năng chính

- Yêu cầu chức năng
  - Đăng kí tài khoản
  - Đăng nhập
  - Hiển thị sản phẩm
  - Thêm, xóa, sửa danh mục
  - Thêm, xóa, sửa sản phẩm
  - Thêm, xóa, sửa đơn hàng
- Yêu cầu phi chức năng
  - Bảo đảm an toàn thông tin đăng ký của người dùng.
  - Giao diện, bố cục trang web thân thiện, hợp lý, dễ sử dụng với người dùng.
  - Tốc độ xử lý nhanh, chính xác, ít tốn thời gian.

## Chức năng quản lý hệ thống

Chức năng đăng nhập:

![image](https://user-images.githubusercontent.com/44923253/151949119-8db102d0-6f8b-4e7a-93b7-97ddfd3bf804.png)

Chức năng hiễn thị sản phẩm:

![image](https://user-images.githubusercontent.com/44923253/151949187-430c5dcb-f91f-46a4-93b7-880acbd68720.png)

Chức năng thêm sản phẩm:

![image](https://user-images.githubusercontent.com/44923253/151949262-83b7139b-ae5f-45db-80f8-a92e869284e7.png)

## Danh sách thực đơn

![image](https://user-images.githubusercontent.com/44923253/151949477-7426c262-1649-48a3-b30f-5756e1a2eedd.png)

## Yêu cầu hệ thống

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
