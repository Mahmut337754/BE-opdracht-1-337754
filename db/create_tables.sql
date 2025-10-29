DROP DATABASE IF EXISTS jamin_db;
CREATE DATABASE jamin_db;
USE jamin_db;

DROP TABLE IF EXISTS product_per_leverancier;
DROP TABLE IF EXISTS product_per_allergeen;
DROP TABLE IF EXISTS leverancier;
DROP TABLE IF EXISTS allergeen;
DROP TABLE IF EXISTS magazijn;
DROP TABLE IF EXISTS product;

CREATE TABLE product (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    barcode VARCHAR(50) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6)
);

CREATE TABLE magazijn (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT NOT NULL,
    verpakkings_eenheid DECIMAL(5,2) NOT NULL,
    aantal_aanwezig INT,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE allergeen (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    omschrijving VARCHAR(255) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6)
);

CREATE TABLE product_per_allergeen (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT NOT NULL,
    allergeen_id BIGINT NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6),
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (allergeen_id) REFERENCES allergeen(id)
);

CREATE TABLE leverancier (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    contactpersoon VARCHAR(255) NOT NULL,
    leveranciernummer VARCHAR(50) NOT NULL,
    mobiel VARCHAR(20) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6)
);

CREATE TABLE product_per_leverancier (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    leverancier_id BIGINT NOT NULL,
    product_id BIGINT NOT NULL,
    datum_levering DATE NOT NULL,
    aantal INT NOT NULL,
    datum_eerstvolgende_levering DATE,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    datum_gewijzigd DATETIME(6),
    FOREIGN KEY (leverancier_id) REFERENCES leverancier(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

INSERT INTO product (id, naam, barcode) VALUES
(1, 'Mintnopjes', '8719587231278'),
(2, 'Schoolkrijt', '8719587326713'),
(3, 'Honingdrop', '8719587327836'),
(4, 'Cola Flesjes', '8719587321237');

INSERT INTO magazijn (id, product_id, verpakkings_eenheid, aantal_aanwezig) VALUES
(1, 1, 5, 453),
(2, 2, 2.5, 400),
(3, 3, 5, 1),
(4, 4, 3, 100);

INSERT INTO allergeen (id, naam, omschrijving) VALUES
(1, 'Gluten', 'Dit product bevat gluten'),
(2, 'Gelatine', 'Dit product bevat gelatine');

INSERT INTO product_per_allergeen (id, product_id, allergeen_id) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1);

INSERT INTO leverancier (id, naam, contactpersoon, leveranciernummer, mobiel) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719', '06-28493827');

INSERT INTO product_per_leverancier (id, leverancier_id, product_id, datum_levering, aantal, datum_eerstvolgende_levering) VALUES
(1, 1, 1, '2024-10-09', 23, '2024-10-16'),
(2, 1, 2, '2024-10-09', 12, '2024-10-16'),
(3, 1, 3, '2024-10-10', 11, '2024-10-17'),
(4, 1, 4, '2024-10-14', 45, '2024-10-21');
