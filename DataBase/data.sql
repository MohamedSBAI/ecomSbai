-- DataBase name 'uthr'
-- table product :
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    cat_id INT NOT NULL,
    picture VARCHAR(255);
    FOREIGN KEY (cat_id) REFERENCES category(id)
);

--table categories
CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(255),
    parent VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--TRIGGER of category name 'set_parent_name'
DELIMITER $$
CREATE TRIGGER set_parent_name
BEFORE INSERT ON category
FOR EACH ROW
BEGIN
    IF NEW.parent IS NULL THEN
        SET NEW.parent = NEW.name;
    END IF;
END$$
DELIMITER ;
--table utilisateur

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    picture LONGBLOB;
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
    FOREIGN KEY (role_id) REFERENCES role(id)
);
--table role 
CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);
