CREATE DATABASE webnhadat;
USE webnhadat;

CREATE TABLE admin (
    idadmin INT AUTO_INCREMENT PRIMARY KEY,
    emailadmin VARCHAR(100) NOT NULL UNIQUE,
    passwordadmin VARCHAR(255) NOT NULL
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

INSERT INTO admin (idadmin, emailadmin, passwordadmin) VALUES
(1,'nguyenvy2006@gmail.com', 'admin12345');

CREATE TABLE users (
    iduser INT AUTO_INCREMENT PRIMARY KEY,
    hoten VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    passworduser VARCHAR(255) NOT NULL,
    diachi VARCHAR(255),
    sdt VARCHAR(20)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE khuvuc (
    idKv INT AUTO_INCREMENT PRIMARY KEY,
    tenKv VARCHAR(100) NOT NULL
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE batdongsan (
    idbds INT AUTO_INCREMENT PRIMARY KEY,
    idKv INT NOT NULL,
    tenBds VARCHAR(255) NOT NULL,
    gia DECIMAL(15,2) NOT NULL,
    moTa TEXT,
    FOREIGN KEY (idKv) REFERENCES khuvuc(idKv)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE hinhanh (
    idHinhanh INT AUTO_INCREMENT PRIMARY KEY,
    idbds INT NOT NULL,
    duong_dan_anh VARCHAR(255) NOT NULL,
    FOREIGN KEY (idbds) REFERENCES batdongsan(idbds)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE giohang (
    iduser INT NOT NULL,
    idbds INT NOT NULL,
    PRIMARY KEY (iduser, idbds),
    FOREIGN KEY (iduser) REFERENCES users(iduser),
    FOREIGN KEY (idbds) REFERENCES batdongsan(idbds)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE datlichhen (
    id_dat_lich_hen INT AUTO_INCREMENT PRIMARY KEY,
    iduser INT NOT NULL,
    idbds INT NOT NULL,
    ngayDat DATE NOT NULL,
    tienCoc DECIMAL(15,2),
    trangThai ENUM('chờ xác nhận','đã xác nhận','huỷ') DEFAULT 'chờ xác nhận',
    pttt ENUM('tiền mặt','chuyển khoản') NOT NULL,
    FOREIGN KEY (iduser) REFERENCES users(iduser),
    FOREIGN KEY (idbds) REFERENCES batdongsan(idbds)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

INSERT INTO khuvuc (idKv, tenKv) VALUES
(1, 'Quận 1'),
(2, 'Quận 3'),
(3, 'Quận 7'),
(4, 'Quận 10'),
(5, 'Bình Thạnh'),
(6, 'Tân Bình'),
(7, 'Thủ Đức');


INSERT INTO batdongsan (idKv, tenBds, gia, moTa) VALUES
(1, 'Nhà phố Quận 1', 8500000000, 'Nhà phố trung tâm Quận 1 gần chợ Bến Thành'),
(2, 'Căn hộ Quận 3', 4200000000, 'Căn hộ cao cấp gần công viên Tao Đàn'),
(3, 'Biệt thự Quận 7', 15000000000, 'Biệt thự khu Phú Mỹ Hưng'),
(4, 'Nhà mặt tiền Quận 10', 7000000000, 'Nhà mặt tiền thuận tiện kinh doanh'),
(5, 'Chung cư Bình Thạnh', 3200000000, 'Chung cư gần Landmark 81'),
(6, 'Nhà phố Tân Bình', 4800000000, 'Nhà gần sân bay Tân Sơn Nhất'),
(7, 'Đất nền Thủ Đức', 2800000000, 'Đất khu dân cư mới');

ALTER TABLE users 
CHANGE passworduser password VARCHAR(255);

ALTER TABLE users 
MODIFY diachi VARCHAR(255) DEFAULT NULL,
MODIFY sdt VARCHAR(20) DEFAULT NULL;

ALTER TABLE users 
ADD created_at TIMESTAMP NULL,
ADD updated_at TIMESTAMP NULL;

ALTER TABLE batdongsan
ADD COLUMN iduser INT  NULL;

ALTER TABLE batdongsan
ADD CONSTRAINT fk_bds_user
FOREIGN KEY (iduser) REFERENCES users(iduser);

ALTER TABLE batdongsan
MODIFY iduser INT NULL;

ALTER TABLE batdongsan 
ADD trangThai ENUM('chờ duyệt','đã duyệt','đã cọc') 
DEFAULT 'chờ duyệt';

ALTER TABLE batdongsan 
MODIFY trangThai ENUM('chờ duyệt','đã duyệt','từ chối')
DEFAULT 'chờ duyệt';

UPDATE batdongsan
SET iduser = 2
WHERE iduser IS NULL;

ALTER TABLE datlichhen 
MODIFY trangThai ENUM('chờ xác nhận', 'đã xác nhận','đã cọc', 'huỷ');


ALTER TABLE datlichhen CHANGE iduser id_nguoi_mua INT NOT NULL;

SELECT * FROM giohang;
