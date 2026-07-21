CREATE TABLE sexes (
    sex_id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sex_code VARCHAR(10) NOT NULL UNIQUE,
    sex_name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO sexes (sex_code, sex_name)
VALUES
('M', 'Male'),
('F', 'Female'),
('O', 'Other'),
('N', 'Prefer Not to Say');