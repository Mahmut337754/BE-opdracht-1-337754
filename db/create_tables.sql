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
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    barcode VARCHAR(50) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME
);

CREATE TABLE magazijn (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    verpakkings_eenheid DECIMAL(5,2) NOT NULL,
    aantal_aanwezig INT,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE allergeen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    omschrijving VARCHAR(255) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME
);

CREATE TABLE product_per_allergeen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    allergeen_id INT UNSIGNED NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME,
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (allergeen_id) REFERENCES allergeen(id)
);

CREATE TABLE leverancier (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    contactpersoon VARCHAR(255) NOT NULL,
    leveranciernummer VARCHAR(50) NOT NULL,
    mobiel VARCHAR(20) NOT NULL,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME
);

CREATE TABLE product_per_leverancier (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    leverancier_id INT UNSIGNED NOT NULL,
    product_id INT UNSIGNED NOT NULL,
    datum_levering DATE NOT NULL,
    aantal INT NOT NULL,
    datum_eerstvolgende_levering DATE,
    is_actief BIT DEFAULT 1,
    opmerking VARCHAR(250),
    datum_aangemaakt DATETIME DEFAULT CURRENT_TIMESTAMP,
    datum_gewijzigd DATETIME,
    FOREIGN KEY (leverancier_id) REFERENCES leverancier(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

INSERT INTO product (id, naam, barcode) VALUES
(1, 'Mintnopjes', '8719587231278'),
(2, 'Schoolkrijt', '8719587326713'),
(3, 'Honingdrop', '8719587327836'),
(4, 'Zure Beren', '8719587321441'),
(5, 'Cola Flesjes', '8719587321237'),
(6, 'Turtles', '8719587322245'),
(7, 'Witte Muizen', '8719587328256'),
(8, 'Reuzen Slangen', '8719587325641'),
(9, 'Zoute Rijen', '8719587322739'),
(10, 'Winegums', '8719587327527'),
(11, 'Drop Munten', '8719587322345'),
(12, 'Kruis Drop', '8719587322265'),
(13, 'Zoute Ruitjes', '8719587323256');

INSERT INTO magazijn (id, product_id, verpakkings_eenheid, aantal_aanwezig) VALUES
(1, 1, 5, 453),
(2, 2, 2.5, 400),
(3, 3, 5, 1),
(4, 4, 1, 800),
(5, 5, 3, 234),
(6, 6, 2, 345),
(7, 7, 1, 795),
(8, 8, 10, 233),
(9, 9, 2.5, 123),
(10, 10, 3, NULL),
(11, 11, 2, 367),
(12, 12, 1, 467),
(13, 13, 5, 20);

INSERT INTO allergeen (id, naam, omschrijving) VALUES
(1, 'Gluten', 'Dit product bevat gluten'),
(2, 'Gelatine', 'Dit product bevat gelatine'),
(3, 'AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen'),
(4, 'Lactose', 'Dit product bevat lactose'),
(5, 'Soja', 'Dit product bevat soja');

INSERT INTO product_per_allergeen (id, product_id, allergeen_id) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 3),
(4, 3, 4),
(5, 6, 5),
(6, 9, 2),
(7, 9, 5),
(8, 10, 2),
(9, 12, 4),
(10, 13, 1),
(11, 13, 4),
(12, 13, 5);

INSERT INTO leverancier (id, naam, contactpersoon, leveranciernummer, mobiel) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719', '06-28493827'),
(2, 'Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734'),
(3, 'Haribo', 'Sven Stalman', 'L1029324748', '06-24383291'),
(4, 'Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823'),
(5, 'De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234');

INSERT INTO product_per_leverancier (id, leverancier_id, product_id, datum_levering, aantal, datum_eerstvolgende_levering) VALUES
(1, 1, 1, '2024-10-09', 23, '2024-10-16'),
(2, 1, 1, '2024-10-18', 21, '2024-10-25'),
(3, 1, 2, '2024-10-09', 12, '2024-10-16'),
(4, 1, 3, '2024-10-10', 11, '2024-10-17'),
(5, 2, 4, '2024-10-14', 16, '2024-10-21'),
(6, 2, 4, '2024-10-21', 23, '2024-10-28'),
(7, 2, 5, '2024-10-14', 45, '2024-10-21'),
(8, 2, 6, '2024-10-14', 30, '2024-10-21'),
(9, 3, 7, '2024-10-12', 12, '2024-10-19'),
(10, 3, 7, '2024-10-19', 23, '2024-10-26'),
(11, 3, 8, '2024-10-10', 12, '2024-10-17'),
(12, 3, 9, '2024-10-11', 1, '2024-10-18'),
(13, 4, 10, '2024-10-16', 24, '2024-10-30'),
(14, 5, 11, '2024-10-10', 47, '2024-10-17'),
(15, 5, 11, '2024-10-19', 60, '2024-10-26'),
(16, 5, 12, '2024-10-11', 45, NULL),
(17, 5, 13, '2024-10-12', 23, NULL);
