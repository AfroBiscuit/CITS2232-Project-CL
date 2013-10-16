CREATE TABLE IF NOT EXISTS`login_details` (
  `username` VARCHAR(4) NOT NULL,
  `pass` VARCHAR(45) NULL,
  `userID` int(1) NULL,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  PRIMARY KEY (`username`));
  
  INSERT INTO `login_details` (username, pass, userID) VALUES ('admin', 'admin', 0), ('office', 'office', 1), ('staff', 'staff', 2), ('user', 'user', 3);