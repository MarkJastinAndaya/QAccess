CREATE TABLE members (
    member_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    member_uuid CHAR(36) NOT NULL UNIQUE,

    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100) NULL,
    last_name VARCHAR(100) NOT NULL,

    sex_id TINYINT UNSIGNED NOT NULL,

    primary_email VARCHAR(255) NULL UNIQUE,
    primary_mobile VARCHAR(20) NULL,

    birth_date DATE NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_members_sex
        FOREIGN KEY (sex_id)
        REFERENCES sexes(sex_id)
);
