CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);
-- relation ssql to user
CREATE TABLE pendaftaran (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    nama_siswa VARCHAR(255) NOT NULL,
    umur INT NOT NULL,
    tanggal_pendaftaran DATE NOT NULL,
    status ENUM('Diterima', 'Cadangan', 'Tidak Diterima') DEFAULT 'Cadangan',
    FOREIGN KEY (user_id) REFERENCES users(id)
);