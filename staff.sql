CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(45) NULL,
  `isAdmin` BIT NULL,
  `dateRegistered` DATETIME NULL,
  `firstName` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `streetAddsress` VARCHAR(45) NULL,
  `suburb` VARCHAR(45) NULL,
  `postcode` INT NULL,
  `state` VARCHAR(3) NULL,
  `phone` VARCHAR(45) NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE INDEX `idstaff_UNIQUE` (`staffID` ASC));

  INSERT INTO `staff` (password, isAdmin, dateRegistered, firstName, lastName, email, streetAddress, suburb, postcode, state, phone)
  VALUES ('poorsecret123',1,NOW(),'John','Smith','john.smith@gmail.com','72 Parry Street','Seymour',3660,'VIC','04195884615'),
  ('password',0,NOW(),'Bob','Myers','bob@hotmail.com','48 Meriwa Street','Nedlands',6009,'WA','0893824687')
	