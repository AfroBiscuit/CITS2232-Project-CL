CREATE TABLE IF NOT EXISTS `firstnames`(
	`firstname` VARCHAR(45) NOT NULL);

CREATE TABLE IF NOT EXISTS `lastnames`(
	`lastname` VARCHAR(45) NOT NULL);


LOAD DATA LOCAL INFILE 'C:\\Users\\Alastair\\Dropbox\\Documents\\Uni\\CITS2232\\Project\\dummyData\\firstnames.csv'
INTO TABLE firstnames
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(firstname);

LOAD DATA LOCAL INFILE 'C:\\Users\\Alastair\\Dropbox\\Documents\\Uni\\CITS2232\\Project\\dummyData\\lastnames.csv'
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

CREATE FUNCTION `postcode_from_state_and_suburb`( input_suburb VARCHAR(45))
RETURNS INT 
BEGIN 
	SELECT postcode
	INTO @postcode
	FROM `suburbs`
	WHERE name = input_suburb
	LIMIT 1;
	RETURN @postcode;
END$$




CREATE PROCEDURE populate_staff(numstaff INT)
BEGIN
	SET @iterator = 0;
	`staffloop`: LOOP
		SET @iterator = @iterator + 1;
		SET @userpassword = CONCAT(10000000 + RAND()*99999999 DIV 1);
		SET @streetid = rand_addressid();
		SET @street = street_from_streetid(@streetid);
		SET @suburb = suburb_from_streetid(@streetid);
		SET @state = state_from_streetid(@streetid);
		SET @postcode = postcode_from_state_and_suburb(@suburb);
		SET @phone = 400000000 + RAND()*10000000 DIV 1;
		INSERT INTO `staff` (password, isAdmin, dateRegistered, firstName, lastName, email, streetAddress, suburb, postcode, state, phone)
		VALUES(@userpassword,0,NOW(),rand_firstname(), rand_lastname(),CONCAT(@staffid,'@staff.centrelink.gov.au'),CONCAT(((RAND()*1000) DIV 1),' ',@street),@suburb,@postcode,@state,CONCAT('0',@phone));
		IF @iterator < numstaff THEN 
			ITERATE staffloop;		
		END IF;
		LEAVE `staffloop`;
	END LOOP `staffloop`;

END$$


CREATE PROCEDURE make_rand_memberships(newmemberships INT)
BEGIN 
	SET @iterator = 0;
	`membershiploop`: LOOP
		SET @iterator = @iterator + 1;
		SELECT staffID INTO @staffid FROM `staff` ORDER BY RAND() LIMIT 1;
		SELECT officeCode INTO @officecode FROM `offices` ORDER BY RAND() LIMIT 1;
		INSERT INTO `memberships` (staffID, officeCode) VALUES (@staffid, @officecode);
		IF @iterator < newmemberships THEN 
			ITERATE membershiploop;		
		END IF;
		LEAVE `membershiploop`;
	END LOOP `membershiploop`;
END$$

DELIMITER ;

DELIMITER ;


	SET @staffid = 1;
	SET @streetid = rand_addressid();
	SET @street = street_from_streetid(@streetid);
	SET @suburb = suburb_from_streetid(@streetid);
	SET @state = state_from_streetid(@streetid);
	SET @postcode = postcode_from_state_and_suburb(@suburb);
	SET @phone = 400000000 + RAND()*10000000 DIV 1;
	 INSERT INTO `staff` (password, isAdmin, dateRegistered, firstName, lastName, email, streetAddress, suburb, postcode, state, phone)
	VALUES('admin',1,NOW(),rand_firstname(), rand_lastname(),CONCAT(@staffid,'@staff.centrelink.gov.au'),CONCAT(((RAND()*1000) DIV 1),' ',@street),@suburb,@postcode,@state,CONCAT('0',@phone));



call populate_staff(10);
call populate_staff(20);
call populate_staff(30);
call populate_staff(40);
call populate_staff(50);
call populate_staff(60);
call populate_staff(70);
call populate_staff(80);
call populate_staff(90);
call populate_staff(100);
call populate_staff(100);
call populate_staff(100);
call populate_staff(100);
call populate_staff(100);
call populate_staff(100);
call populate_staff(100);
CALL make_rand_memberships(1150);
CALL make_rand_memberships(350);