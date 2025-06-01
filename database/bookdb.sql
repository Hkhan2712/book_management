alter table books 
add column publish_year year;
INSERT INTO books (title, publish_year, isbn, quantity, photo) VALUES
('To Kill a Mockingbird', 1960, '9780061120084', 5, 'mockingbird.jpg'),
('1984', 1949, '9780451524935', 8, '1984.jpg'),
('The Great Gatsby', 1925, '9780743273565', 7, 'gatsby.jpg'),
('The Catcher in the Rye', 1951, '9780316769488', 6, 'catcher.jpg'),
('The Hobbit', 1937, '9780547928227', 10, 'hobbit.jpg'),
('Brave New World', 1932, '9780060850524', 5, 'brave.jpg'),
('Fahrenheit 451', 1953, '9781451673319', 4, 'fahrenheit.jpg'),
('Lord of the Flies', 1954, '9780399501487', 3, 'flies.jpg'),
('Animal Farm', 1945, '9780451526342', 6, 'animalfarm.jpg'),
('The Old Man and The Sea', 1952, '9780684801223', 2, 'oldmansea.jpg');

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL, -- Lưu trữ mật khẩu đã mã hóa (hashed password)
    display_name VARCHAR(100),
    full_name VARCHAR(255),
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other', 'Prefer not to say'),
    country VARCHAR(100),
    avatar_url VARCHAR(255), -- Đường dẫn đến ảnh đại diện
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login_at TIMESTAMP NULL,
    status ENUM('Active', 'Inactive', 'Suspended', 'Pending Verification') DEFAULT 'Active'
);
INSERT INTO users (email, password_hash, display_name, full_name, date_of_birth, gender, country, avatar_url, last_login_at, status) VALUES
('alice.smith@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567890', 'AliceReads', 'Alice Smith', '1990-05-15', 'Female', 'USA', 'alice.png', '2025-05-31 10:00:00', 'Active'),
('bob.johnson@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567891', 'BookwormBob', 'Bob Johnson', '1988-11-22', 'Male', 'Canada', 'bob.png', '2025-05-30 14:30:00', 'Active'),
('charlie.brown@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567892', 'LiterateC', 'Charlie Brown', '1995-01-01', 'Male', 'UK', 'charlie.png', '2025-05-29 08:15:00', 'Active'),
('diana.prince@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567893', 'WonderReader', 'Diana Prince', '1982-07-20', 'Female', 'France', 'diana.png', '2025-05-31 16:45:00', 'Active'),
('evan.davis@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567894', 'EvanPages', 'Evan Davis', '1993-03-10', 'Male', 'Germany', 'evan.png', '2025-05-28 09:00:00', 'Inactive'),
('fiona.green@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567895', 'FionaReads', 'Fiona Green', '1998-09-05', 'Female', 'Australia', 'fiona.png', '2025-05-30 20:00:00', 'Active'),
('george.white@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567896', 'GReadStuff', 'George White', '1975-04-25', 'Male', 'USA', 'george.png', '2025-05-27 11:30:00', 'Active'),
('hannah.black@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567897', 'HannahLit', 'Hannah Black', '2000-12-12', 'Female', 'New Zealand', 'hannah.png', '2025-05-31 09:00:00', 'Pending Verification'),
('ivan.petrov@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567898', 'IvanBooks', 'Ivan Petrov', '1985-02-14', 'Male', 'Russia', 'ivan.png', '2025-05-29 17:00:00', 'Active'),
('jessica.lim@example.com', '$2a$10$abcdefghijklmnopqrstuvwxyza123456789012345678901234567899', 'JessReads', 'Jessica Lim', '1991-08-03', 'Female', 'Singapore', 'jessica.png', '2025-05-31 11:00:00', 'Active');