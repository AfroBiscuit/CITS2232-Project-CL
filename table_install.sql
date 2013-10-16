
CREATE TABLE IF NOT EXISTS`offices` (
  `officecode` VARCHAR(4) NOT NULL,
  `name` VARCHAR(45) NULL,
  `officetype` VARCHAR(45) NULL,
  `typecode` VARCHAR(3) NULL,
  `streetaddress` VARCHAR(90) NULL,
  `suburb` VARCHAR(45) NULL,
  `postcode` INT(4) NULL,
  `state` VARCHAR(3) NULL,
  `openhours` VARCHAR(270) NULL,
  `postal` VARCHAR(90) NULL,
  `longtitude` FLOAT(10) NULL,
  `latitude` FLOAT(10) NULL,
  UNIQUE INDEX `officeCode_UNIQUE` (`officeCode` ASC),
  PRIMARY KEY (`officeCode`));

CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(45) NULL,
  `isAdmin` BIT NULL DEFAULT 0,
  `dateRegistered` DATETIME NULL,
  `firstName` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `streetAddress` VARCHAR(45) NULL,
  `suburb` VARCHAR(45) NULL,
  `postcode` INT NULL,
  `state` VARCHAR(3) NULL,
  `phone` VARCHAR(45) NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE INDEX `idstaff_UNIQUE` (`staffID` ASC));

CREATE TABLE IF NOT EXISTS `postcodes` (
	`postcode` INT NOT NULL,
	`suburb` VARCHAR(45) NOT NULL,
	`state` VARCHAR(3) NOT NULL);

CREATE TABLE IF NOT EXISTS `streets` (
	`street` VARCHAR(45) NOT NULL,
	`suburb` VARCHAR(45) NOT NULL,
	`state` VARCHAR(3) NOT NULL,
	`longtitude` FLOAT(10) NULL,
	`latitude` FLOAT(10) NULL,
	`streetid` INT NOT NULL);

CREATE TABLE IF NOT EXISTS `firstnames`(
	`firstname` VARCHAR(45) NOT NULL);

CREATE TABLE IF NOT EXISTS `lastnames`(
	`lastname` VARCHAR(45) NOT NULL);

LOAD XML LOCAL INFILE '%%data_path%%\\offices.xml'
INTO TABLE offices
ROWS IDENTIFIED BY '<office>';

LOAD DATA LOCAL INFILE '%%data_path%%\\streets.csv'
INTO TABLE streets
FIELDS TERMINATED BY ',' 
LINES TERMINATED BY '\n' 
(street, suburb, latitude, longtitude, state,streetid);

LOAD DATA LOCAL INFILE '%%data_path%%\\postcodes.csv'
INTO TABLE postcodes
FIELDS TERMINATED BY ',' 
LINES TERMINATED BY '\n' 
(postcode, suburb, state);

LOAD DATA LOCAL INFILE '%%data_path%%\\firstnames.csv'
INTO TABLE firstnames
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(firstname);

LOAD DATA LOCAL INFILE '%%data_path%%\\lastnames.csv'
INTO TABLE lastnames
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(lastname);

DELIMITER $$

CREATE FUNCTION `rand_firstname` ()
RETURNS VARCHAR(45) 
BEGIN
	SELECT firstname
	into @firstname
	FROM `firstnames`
	ORDER BY RAND()
	LIMIT 1;
	RETURN @firstname;
END$$


CREATE FUNCTION `rand_lastname` ()
RETURNS VARCHAR(45) 
BEGIN
	SELECT lastname
	INTO @lastname
	FROM `lastnames`
	ORDER BY RAND()
	LIMIT 1;
	RETURN @lastname;
END$$

CREATE FUNCTION `rand_addressid` ()
RETURNS INT
BEGIN
	SELECT streetid
	INTO @id
	FROM `streets`
	ORDER BY RAND()
	LIMIT 1;
	RETURN @id;
END$$




CREATE FUNCTION `street_from_streetid` (id INT)
RETURNS VARCHAR(45) 
BEGIN
	SELECT street
	INTO @street
	FROM `streets`
	WHERE streetid = id
	LIMIT 1;
	RETURN @street;
END$$

CREATE FUNCTION `suburb_from_streetid` (id INT)
RETURNS VARCHAR(45) 
BEGIN
	SELECT suburb
	INTO @suburb
	FROM `streets`
	WHERE streetid = id
	LIMIT 1;
	RETURN @suburb;
END$$

CREATE FUNCTION `STATE_from_streetid` (id INT)
RETURNS VARCHAR(3) 
BEGIN
	SELECT state
	INTO @state
	FROM `streets`
	WHERE streetid = id
	LIMIT 1;
	RETURN @state;
END$$

CREATE FUNCTION `postcode_from_state_and_suburb`(input_state VARCHAR(3), input_suburb VARCHAR(45))
RETURNS INT 
BEGIN 
	SELECT postcode
	INTO @postcode
	FROM `postcodes`
	WHERE state = input_state AND suburb = input_suburb
	LIMIT 1;
	RETURN @postcode;
END$$

CREATE PROCEDURE populate_staff(numstaff INT)
BEGIN
	SET @staffid = 1;
	SET @streetid = rand_addressid();
	SET @street = street_from_streetid(@streetid);
	SET @suburb = suburb_from_streetid(@streetid);
	SET @state = state_from_streetid(@streetid);
	SET @postcode = postcode_from_state_and_suburb(@state, @suburb);
	SET @phone = 400000000 + RAND()*10000000 DIV 1;
	 INSERT INTO `staff` (password, isAdmin, dateRegistered, firstName, lastName, email, streetAddress, suburb, postcode, state, phone)
	VALUES('admin',1,NOW(),rand_firstname(), rand_lastname(),CONCAT(@staffid,'@staff.centrelink.gov.au'),CONCAT(((RAND()*1000) DIV 1),' ',@street),@suburb,@postcode,@state,CONCAT('0',@phone));


	`staffloop`: LOOP
		SET @staffid = @staffid+1;
		SET @streetid = rand_addressid();
		SET @street = street_from_streetid(@streetid);
		SET @suburb = suburb_from_streetid(@streetid);
		SET @state = state_from_streetid(@streetid);
		SET @postcode = postcode_from_state_and_suburb(@state, @suburb);
		SET @phone = 400000000 + RAND()*10000000 DIV 1;
		INSERT INTO `staff` (password, isAdmin, dateRegistered, firstName, lastName, email, streetAddress, suburb, postcode, state, phone)
		VALUES('',0,NOW(),rand_firstname(), rand_lastname(),CONCAT(@staffid,'@staff.centrelink.gov.au'),CONCAT(((RAND()*1000) DIV 1),' ',@street),@suburb,@postcode,@state,CONCAT('0',@phone));
		IF @staffid < numstaff THEN 
			ITERATE staffloop;		
		END IF;
		LEAVE `staffloop`;
	END LOOP `staffloop`;

END$$

DELIMITER ;

call populate_staff(10);
