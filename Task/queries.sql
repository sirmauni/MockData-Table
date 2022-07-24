create database budgetvm;

CREATE TABLE budgetvm.mock_data (
	id int NOT NULL,
    firstName varchar(120),
    lastName varchar(120),
    email varchar(120),
    gender varchar(120),
    ipAddress varchar(120),
    genres varchar(120),
    misc varchar(120),
    primary key(id)
);

# read mock data
USE `budgetvm`;
DROP procedure IF EXISTS `ReadAllMockData`;

DELIMITER $$
USE `budgetvm`$$
CREATE PROCEDURE `ReadAllMockData` ()
BEGIN
	SELECT * FROM budgetvm.mock_data;
END$$

DELIMITER ;

# insert new mock data
use `budgetvm`;
DROP procedure IF EXISTS `InsertNewRow`;

DELIMITER $$
USE `budgetvm` $$
CREATE procedure `InsertNewRow` (IN newID INT, IN newFirstName VARCHAR(120), IN newLastName VARCHAR(120), IN newEmail VARCHAR(120), IN newGender VARCHAR(120), IN newIpAddress VARCHAR(120), IN newGenre VARCHAR(120), IN newMisc VARCHAR(120))
BEGIN
	INSERT INTO `budgetvm`.`mock_data` (`id`, `firstName`, `lastName`, `email`, `gender`, `ipAddress`, `genres`, `misc`)
    VALUES (newID, newFirstName, newLastName, newEmail, newGender, NewIpAddress, newGenre, newMisc);
END $$

DELIMITER ;

# delete row from mock_data
use budgetvm;
DROP procedure IF EXISTS `DeleteRow`;

DELIMITER $$
CREATE procedure `DeleteRow` (IN newID INT)
BEGIN
	DELETE FROM `budgetvm`.`mock_data`
    WHERE id = newID;
END $$

DELIMITER ;

# procedure for updating row in data
use budgetvm;
DROP procedure IF EXISTS `UpdateRow`;

DELIMITER $$
CREATE procedure `UpdateRow` (IN newID INT, IN newFirstName VARCHAR(120), IN newLastName VARCHAR(120), IN newEmail VARCHAR(120), IN newGender VARCHAR(120), IN newIpAddress VARCHAR(120), IN newGenre VARCHAR(120), IN newMisc VARCHAR(120))
BEGIN
	UPDATE `budgetvm`.`mock_data`
    SET firstName = newFirstName, lastName = newLastName, email = newEmail, gender = newGender, ipAddress = newIpAddress, genre = newGenre, misc = newMisc
    WHERE id = newID;
END $$

DELIMITER ;

