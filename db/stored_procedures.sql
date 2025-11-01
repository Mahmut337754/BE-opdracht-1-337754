USE jamin_db;

DELIMITER //
CREATE PROCEDURE GetAllProducts()
BEGIN
    SELECT * FROM product;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE GetAllMagazijn()
BEGIN
    SELECT m.id, p.naam AS product_naam, m.verpakkings_eenheid, m.aantal_aanwezig
    FROM magazijn m
    JOIN product p ON m.product_id = p.id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE GetAllergenenByProduct(IN prod_id BIGINT)
BEGIN
    SELECT a.id, a.naam, a.omschrijving
    FROM allergeen a
    JOIN product_per_allergeen pa ON a.id = pa.allergeen_id
    WHERE pa.product_id = prod_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE GetLeveranciersByProduct(IN prod_id BIGINT)
BEGIN
    SELECT l.id, l.naam, l.contactpersoon, l.mobiel
    FROM leverancier l
    JOIN product_per_leverancier pl ON l.id = pl.leverancier_id
    WHERE pl.product_id = prod_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AddProduct(IN prod_naam VARCHAR(255), IN prod_barcode VARCHAR(50))
BEGIN
    INSERT INTO product (naam, barcode) VALUES (prod_naam, prod_barcode);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateMagazijnAantal(IN mag_id BIGINT, IN nieuw_aantal INT)
BEGIN
    UPDATE magazijn
    SET aantal_aanwezig = nieuw_aantal
    WHERE id = mag_id;
END //
DELIMITER ;
