use test;
CREATE TABLE IF NOT EXISTS`office` (
  `officeCode` VARCHAR(4) NOT NULL,
  `name` VARCHAR(45) NULL,
  `officeType` VARCHAR(45) NULL,
  `typeCode` VARCHAR(3) NULL,
  `streetAddress` VARCHAR(90) NULL,
  `suburb` VARCHAR(45) NULL,
  `postcode` INT(4) NULL,
  `state` VARCHAR(3) NULL,
  `openHours` VARCHAR(180) NULL,
  `postal` VARCHAR(90) NULL,
  `longtitude` FLOAT(10) NULL,
  `latitude` FLOAT(10) NULL,
  UNIQUE INDEX `officeCode_UNIQUE` (`officeCode` ASC),
  PRIMARY KEY (`officeCode`));

  INSERT INTO  `office` (officeCode, name, officeType, typeCode, streetAddress, suburb, postcode, state, postal, openHours, longtitude, latitude)
  VALUES 
  ('691', 'Moora', 'Agent (Rural)', 'CB', '72 Padbury St', 'Moora', 6510, 'WA', 'Central Midlands Aboriginal Progress Association PO Box 17 Moora WA 6510', 'Sun:Closed;Mon:10:00 to 12:30;Tue:10:00 to 12:30;Wed:10:00 to 12:30;Thu:10:00 to 12:30;Fri:10:00 to 12:30;Sat:Closed;',116.00720, -30.63710),
  ('YNG', 'Young', 'Centrelink Customer Service Centre', 'R', '130 Lovell St', 'Young', 2594, 'NSW', 'PO Box 946 Young NSW 2594', 'Sun:Closed;Mon:9:00 to 4:30;Tue:9:00 to 4:30;Wed:9:00 to 4:30;Thu:9:00 to 4:30;Fri:9:00 to 4:30;Sat:Closed;',148.29214,-34.31094)