# SQL Injection Lab: Trusting Cookie and User-Agent Fields

## Language: English

### Description
This lab demonstrates how trusting user-controlled fields like **Cookie** and **User-Agent** can lead to **SQL Injection (SQLi)** vulnerabilities. It includes the following components:

1. **cookie_sqli.php**: A vulnerable script that uses the `Cookie` field to perform SQL queries without proper sanitization.
2. **theme.php**: A vulnerable script that uses the `User-Agent` field to perform SQL queries without proper sanitization.
3. **index.php**: The main entry point for the lab, allowing users to navigate to the vulnerable scripts.

### How to Run the Lab
1. Clone the repository:
   ```bash
   git clone https://github.com/ElliotBigFan/SQLiCookieUser-Agent.git
   cd SQLiCookieUser-Agent
   ```
2. Ensure that Docker and Docker Compose are installed on your machine.
3. Run the following command to start the containers:
   ```bash
   docker-compose up -d
   ```
4. Access the lab components on the following ports:
   - **index.php**: [http://localhost:8080](http://localhost:8080)
   - **cookie_sqli.php**: [http://localhost:8080/cookie_sqli.php](http://localhost:8080/cookie_sqli.php)
   - **theme.php**: [http://localhost:8080/theme.php](http://localhost:8080/theme.php)

### Objectives
- Understand how trusting user-controlled fields like `Cookie` and `User-Agent` can lead to SQL Injection.
- Learn how to exploit these vulnerabilities to extract sensitive information from the database.

### Vulnerabilities
#### 1. **cookie_sqli.php**
- **Description**: This script uses the `Cookie` field (`sessionID`) to query the database without proper sanitization.
- **Vulnerable Code**:
   ```php
   $sql = "SELECT username FROM users WHERE cookie = '$sessionid'";
   ```
- **Impact**: An attacker can inject malicious SQL code into the `Cookie` field to manipulate the query.

#### 2. **theme.php**
- **Description**: This script uses the `User-Agent` field to query the database without proper sanitization.
- **Vulnerable Code**:
   ```php
   $sql = "SELECT * FROM themes WHERE name = '$ua'";
   ```
- **Impact**: An attacker can inject malicious SQL code into the `User-Agent` field to manipulate the query.

### Exploitation Steps
#### Exploiting `cookie_sqli.php`
1. Set a malicious `Cookie` value using browser developer tools or a proxy tool like Burp Suite.
2. Example payload:
   ```
   ' OR '1'='1
   ```
3. Observe the database response and extract sensitive information.

#### Exploiting `theme.php`
1. Modify the `User-Agent` header using browser developer tools or a proxy tool like Burp Suite.
2. Example payload:
   ```
   ' UNION SELECT database(), user() --
   ```
3. Observe the database response and extract sensitive information.

### Mitigation
To prevent SQL Injection vulnerabilities:
1. Use **prepared statements** with parameterized queries.
2. Validate and sanitize all user inputs, including HTTP headers and cookies.
3. Use a web application firewall (WAF) to detect and block malicious requests.

### Note
This lab is intended for educational and security research purposes only. Do not use it for malicious purposes or any activities that violate the law.

---

## Language: Vietnamese

### Mô tả
Lab này mô phỏng cách việc tin tưởng vào các trường do người dùng kiểm soát như **Cookie** và **User-Agent** có thể dẫn đến lỗ hổng **SQL Injection (SQLi)**. Nó bao gồm các thành phần sau:

1. **cookie_sqli.php**: Một script dễ bị tấn công sử dụng trường `Cookie` để thực hiện truy vấn SQL mà không kiểm tra đầu vào.
2. **theme.php**: Một script dễ bị tấn công sử dụng trường `User-Agent` để thực hiện truy vấn SQL mà không kiểm tra đầu vào.
3. **index.php**: Điểm vào chính của lab, cho phép người dùng điều hướng đến các script dễ bị tấn công.

### Cách chạy Lab
1. Sao chép repository:
   ```bash
   git clone https://github.com/ElliotBigFan/SQLiCookieUser-Agent.git
   cd SQLiCookieUser-Agent
   ```
2. Đảm bảo bạn đã cài đặt Docker và Docker Compose trên máy của mình.
3. Chạy lệnh sau để khởi động các container:
   ```bash
   docker-compose up -d
   ```
4. Truy cập các thành phần của lab tại các cổng sau:
   - **index.php**: [http://localhost:8080](http://localhost:8080)
   - **cookie_sqli.php**: [http://localhost:8080/cookie_sqli.php](http://localhost:8080/cookie_sqli.php)
   - **theme.php**: [http://localhost:8080/theme.php](http://localhost:8080/theme.php)

### Mục tiêu
- Hiểu cách việc tin tưởng vào các trường `Cookie` và `User-Agent` có thể dẫn đến SQL Injection.
- Học cách khai thác các lỗ hổng này để trích xuất thông tin nhạy cảm từ cơ sở dữ liệu.

### Lỗ hổng
#### 1. **cookie_sqli.php**
- **Mô tả**: Script này sử dụng trường `Cookie` (`sessionID`) để truy vấn cơ sở dữ liệu mà không kiểm tra đầu vào.
- **Mã dễ bị tấn công**:
   ```php
   $sql = "SELECT username FROM users WHERE cookie = '$sessionid'";
   ```
- **Tác động**: Kẻ tấn công có thể chèn mã SQL độc hại vào trường `Cookie` để thao túng truy vấn.

#### 2. **theme.php**
- **Mô tả**: Script này sử dụng trường `User-Agent` để truy vấn cơ sở dữ liệu mà không kiểm tra đầu vào.
- **Mã dễ bị tấn công**:
   ```php
   $sql = "SELECT * FROM themes WHERE name = '$ua'";
   ```
- **Tác động**: Kẻ tấn công có thể chèn mã SQL độc hại vào trường `User-Agent` để thao túng truy vấn.

### Các bước khai thác
#### Khai thác `cookie_sqli.php`
1. Đặt giá trị `Cookie` độc hại bằng công cụ phát triển trình duyệt hoặc công cụ proxy như Burp Suite.
2. Payload ví dụ:
   ```
   ' OR '1'='1
   ```
3. Quan sát phản hồi từ cơ sở dữ liệu và trích xuất thông tin nhạy cảm.

#### Khai thác `theme.php`
1. Sửa đổi header `User-Agent` bằng công cụ phát triển trình duyệt hoặc công cụ proxy như Burp Suite.
2. Payload ví dụ:
   ```
   ' UNION SELECT database(), user() --
   ```
3. Quan sát phản hồi từ cơ sở dữ liệu và trích xuất thông tin nhạy cảm.

### Biện pháp phòng ngừa
Để ngăn chặn lỗ hổng SQL Injection:
1. Sử dụng **prepared statements** với truy vấn có tham số.
2. Kiểm tra và làm sạch tất cả đầu vào của người dùng, bao gồm cả header HTTP và cookie.
3. Sử dụng tường lửa ứng dụng web (WAF) để phát hiện và chặn các yêu cầu độc hại.

### Lưu ý
Lab này chỉ được sử dụng cho mục đích học tập và nghiên cứu bảo mật. Không sử dụng cho các mục đích xấu hoặc vi phạm pháp luật.