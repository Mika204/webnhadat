CREATE DATABASE webnhadat;
USE webnhadat;

CREATE TABLE admin (
    idadmin INT AUTO_INCREMENT PRIMARY KEY,
    emailadmin VARCHAR(100) NOT NULL UNIQUE,
    passwordadmin VARCHAR(255) NOT NULL
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

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
