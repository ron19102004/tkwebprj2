DELIMITER //
CREATE PROCEDURE save_color(
    IN p_name VARCHAR(255),
    IN p_value VARCHAR(255)
)
BEGIN
    INSERT INTO colors (name, value)
    VALUES (p_name, p_value);
END //
DELIMITER ;
