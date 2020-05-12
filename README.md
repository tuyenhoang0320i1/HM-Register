# HM-Register

[Bài tập] Trang đăng ký người dùng
Mục tiêu
Luyện tập sử dụng hàm, làm việc với file JSON, gọi hàm có sẵn.

Mô tả bài toán
Xây dựng trang đăng ký người dùng. Khi người dùng nhập thông tin lên form, kiểm tra tính hợp lệ của dữ liệu nhập vào. Nếu thông tin nhập liệu đầy đủ thông báo đăng ký thành công và lưu thông tin ra file JSON (users.json).

Các bước thực hiện
Bước 1: Tạo trang index.php với giao diện là một form đăng ký người dùng. Các trường là:

Tên người dùng
Email
Điện thoại
Bước 2: Trong thẻ form xác định thuộc tính method là POST.

Bước 3: Lấy dữ liệu gửi lên từ form thông qua biến $_POST.

Bước 4: Xử lý kiểm tra không để trống và email. Gọi các hàm có sẵn empty() kiểm tra rỗng, filter_var() kiểm tra email.

- Kiểm tra nếu $_SERVER["REQUEST_METHOD"] là POST thì lấy thông tin của các trường name, email, phone lưu lần lượt vào các biến $name, $email, $phone.

- Kiểm tra nếu tên/email/phone bị trống thì gán thông báo lỗi tương ứng.

- Sử dụng hàm filter_var($email, FILTER_VALIDATE_EMAIL) để kiểm tra email nhập không đúng định dạng. Hàm trả về true nếu nhập đúng ngược lại trả về false.

Bước 5: Xây dựng hàm lưu dữ liệu vào file json.

- Tạo file users.json với nội dung là: [ ]

- Xây dựng hàm saveDataJSON() gồm 4 tham số $filename, $name, $email, $phone. Hàm trả về true nếu việc lưu thành công, còn lại trả về false.

- Cài đặt hàm: 

Sử dụng khối try…catch để bắt lỗi trong quá trình lưu dữ liệu vào file. Nếu lệnh trong khối try có lỗi thì thông báo lỗi sẽ được hiển thị trong khối catch với lệnh: $e->getMessage().
Tạo mảng $contact chứa thông tin $name, $email, $phone.
Sử dụng hàm json_encode(): chuyển đổi từ mảng dữ liệu sang dạng json
Sử dụng hàm json_decode(): chuyển đổi từ dạng json sang mảng dữ liệu
Sử dụng hàm file_put_contents(): lưu dữ liệu dạng json vào file
Sử dụng hàm file_get_contents(): lấy dữ liệu từ file json
Bước 6: Kiểm thử chương trình.

- Đăng ký với tên và email hợp lệ, quan sát kết quả. Mở file users.json để xem nội dung.

- Đăng ký với tên để trống, quan sát thông báo lỗi.

- Đăng ký với email không hợp lệ, quan sát thông báo lỗi.

Mở rộng: Có thể viết thêm một hàm khác để hiển thị danh sách đã đăng ký sẵn có.

Tổng kết
Trong bài tập này, bạn đã luyện tập:

Làm việc với mảng
Xây dựng hàm với tham số đầu vào
Sử dụng hàm
Luyện tập làm việc với file JSON
Sử dụng một số hàm có sẵn để làm việc với dữ liệu dạng JSON
