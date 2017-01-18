-- -----------------------------------------------------
-- Table `user_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `USER_ID` VARCHAR(45) NOT NULL DEFAULT '',
  `USER_NAME` VARCHAR(100) NULL DEFAULT NULL,
  `ADDRESS1` VARCHAR(450) NULL DEFAULT NULL,
  `ADDRESS2` VARCHAR(450) NULL DEFAULT NULL,
  `PHONE1` VARCHAR(15) NULL DEFAULT NULL,
  `PHONE2` VARCHAR(15) NULL DEFAULT NULL,
  `EMAIL` VARCHAR(15) NULL DEFAULT NULL,
  `DOB` TIMESTAMP NULL DEFAULT NULL,
  `DEPARTMENT` VARCHAR(45) NULL DEFAULT NULL,
  `DESIGNATION` VARCHAR(45) NULL DEFAULT NULL,
  `REPORTING_TO` VARCHAR(45) NULL DEFAULT NULL,
  `LOGIN_ID` VARCHAR(15) NULL DEFAULT NULL,
  `LOGIN_PWD` VARCHAR(15) NULL DEFAULT NULL,
  `REGION` VARCHAR(45) NULL DEFAULT NULL,
  `TEAM_ID` VARCHAR(15) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(100) NULL DEFAULT NULL,
  `LOCATION` VARCHAR(15) NULL DEFAULT NULL,
  `PHOTO` VARCHAR(255) NULL DEFAULT NULL,
  `USER_STATE` VARCHAR(15) NULL DEFAULT NULL,
  `UPDATE_USER` VARCHAR(15) NULL DEFAULT NULL,
  `UPDATE_TIMESTAMP` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `USER_ID`),
  INDEX `pk_user_details1_idx` (`USER_ID` ASC)
  );


-- -----------------------------------------------------
-- Table `chat_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_data` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `CHAT_ID` VARCHAR(45) NULL DEFAULT NULL,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `FROM_NUM` VARCHAR(45) NULL DEFAULT NULL,
  `TO_NUM` VARCHAR(45) NULL DEFAULT NULL,
  `MESSAGE` VARCHAR(45) NULL DEFAULT NULL,
  `TYPE` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `CHATGROUPID` VARCHAR(45) NULL DEFAULT NULL,
  `ATTACHMENT` VARCHAR(45) NULL DEFAULT NULL,
  `SUBJECT` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chat_data_user_details1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_chat_data_user_details1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `chat_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_group` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `CHAT_GROUPGROUP_ID` VARCHAR(45) NULL DEFAULT NULL,
  `GROUP_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `USER` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `currency`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `currency` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `CURRENCY_ID` VARCHAR(45) NULL DEFAULT NULL,
  `CURRENCY_CATEGORY` VARCHAR(45) NULL DEFAULT NULL,
  `CURRENCY_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `email_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `email_data` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `FROM` VARCHAR(45) NULL DEFAULT NULL,
  `TO` VARCHAR(45) NULL DEFAULT NULL,
  `SUBJECT` VARCHAR(45) NULL DEFAULT NULL,
  `MESSAGE` VARCHAR(45) NULL DEFAULT NULL,
  `CC` VARCHAR(45) NULL DEFAULT NULL,
  `BCC` VARCHAR(45) NULL DEFAULT NULL,
  `STATUS` VARCHAR(45) NOT NULL,
  `ATTACHMENT` VARCHAR(45) NULL DEFAULT NULL,
  `EMAIL_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `EMAIL_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `STATUS`),
  INDEX `fk_email_data_user_details_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_email_data_user_details`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `user_email_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_email_settings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `EMAIL_SETTINGS_ID` VARCHAR(45) NOT NULL,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `SETTINGS_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `SETTINGS_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  `INCOMING_HOSTNAME` VARCHAR(45) NULL DEFAULT NULL,
  `INCOMING_PORTNUMBER` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_HOSTNAME` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_PORTNUMBER` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `EMAIL_SETTINGS_ID`),
  INDEX `pk_user_email_settings_idx` (`EMAIL_SETTINGS_ID` ASC),
  INDEX `fk_user_email_settings_user_details1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_user_email_settings_user_details1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `email_template`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `email_template` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `TEMPLATE_ID` VARCHAR(45) NULL DEFAULT NULL,
  `EMAIL_SETTINGS_ID` VARCHAR(45) NULL DEFAULT NULL,
  `TEMPLATE_TITTLE` VARCHAR(45) NULL DEFAULT NULL,
  `TEMPLATE_SUBJECT` VARCHAR(45) NULL DEFAULT NULL,
  `TEMPLATE_BODY` VARCHAR(2000) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `TEMPLATE_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `TEMPLATE_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_email_template_user_email_settings1_idx` (`EMAIL_SETTINGS_ID` ASC),
  CONSTRAINT `fk_email_template_user_email_settings1`
    FOREIGN KEY (`EMAIL_SETTINGS_ID`)
    REFERENCES `user_email_settings` (`EMAIL_SETTINGS_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `expense_master`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `expense_master` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_MASTER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `CATEGORY_ID` VARCHAR(45) NULL DEFAULT NULL,
  `CATEGORY_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `EXPENSE_MASTER_ID`),
  INDEX `pk_expense_master_idx` (`EXPENSE_MASTER_ID` ASC)
);

-- -----------------------------------------------------
-- Table `expense_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `expense_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `EXPENSE_ID` VARCHAR(45) NULL DEFAULT NULL,
  `EXPENSE_MASTER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `EXPENSE_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `CATEGORY_ID` VARCHAR(45) NULL DEFAULT NULL,
  `CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `DATE` VARCHAR(45) NULL DEFAULT NULL,
  `AMOUNT` VARCHAR(45) NULL DEFAULT NULL,
  `LEADID` VARCHAR(45) NULL DEFAULT NULL,
  `FILE_PATH` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `LOCATION` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_expense_details_expense_master1_idx` (`EXPENSE_MASTER_ID` ASC),
  CONSTRAINT `fk_expense_details_expense_master1`
    FOREIGN KEY (`EXPENSE_MASTER_ID`)
    REFERENCES `expense_master` (`EXPENSE_MASTER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

-- -----------------------------------------------------
-- Table `lead_info`
-- -----------------------------------------------------
CREATE TABLE `lead_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LEADID` varchar(45) DEFAULT NULL,
  `LEADNAME` varchar(45) DEFAULT NULL,
  `LEADCONTACT` varchar(45) DEFAULT NULL,
  `LEADDESG` varchar(45) DEFAULT NULL,
  `LEADMOB` varchar(45) DEFAULT NULL,
  `LEADPHONE` varchar(45) DEFAULT NULL,
  `LEADEMAIL` varchar(45) DEFAULT NULL,
  `LEADTADDRESS` varchar(1000) DEFAULT NULL,
  `LEADWEBSITE` varchar(45) DEFAULT NULL,
  `LEADCITY` varchar(45) DEFAULT NULL,
  `LEADLOGO` varchar(45) DEFAULT NULL,
  `LEADREMARKS` varchar(45) DEFAULT NULL,
  `LEADSOURCE` varchar(45) DEFAULT NULL,
  `LEADLAT` varchar(45) DEFAULT NULL,
  `LEADLNG` varchar(45) DEFAULT NULL,
  `LEADLOC` varchar(45) DEFAULT NULL,
  `EDIT_STATUS` varchar(45) DEFAULT NULL,
  `PRODUCTID` varchar(45) DEFAULT NULL,
  `PROD_VALUE` varchar(45) DEFAULT NULL,
  `LOCATION_TRACKING` varchar(45) DEFAULT NULL,
  `CALL_RECORDING` varchar(45) DEFAULT NULL,
  `WRK_START_TIME` varchar(45) DEFAULT NULL,
  `WRK_END_TIME` varchar(45) DEFAULT NULL,
  `ROUND_CLOCK_TRACKING` varchar(45) DEFAULT NULL,
  `USER` varchar(45) DEFAULT NULL,
  `LEADMOB2` varchar(45) DEFAULT NULL,
  `LEADMOB3` varchar(45) DEFAULT NULL,
  `LEADMOB4` varchar(45) DEFAULT NULL,
  `LEADMOB5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`, `LEADID`),
  INDEX `pk_lead_info_idx` (`LEADID` ASC)
);

-- -----------------------------------------------------
-- Table `lead_details`
-- -----------------------------------------------------
CREATE TABLE `lead_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEEID` varchar(45) DEFAULT NULL,
  `LEADID` varchar(45) DEFAULT NULL,
  `EMPLOYEENAME` varchar(45) DEFAULT NULL,
  `EMPLOYEEDESG` varchar(45) DEFAULT NULL,
  `EMPLOYEECOMPID` varchar(45) DEFAULT NULL,
  `EMPLOYEEEMAIL` varchar(45) DEFAULT NULL,
  `EMPLOYEEPHONE1` varchar(45) DEFAULT NULL,
  `EMPLOYEEPHONE2` varchar(45) DEFAULT NULL,
  `EMPLOYEEPHOTO` varchar(45) DEFAULT NULL,
  `EMPLOYEEEMAIL2` varchar(45) DEFAULT NULL,
  `CONTACT_TYPE` varchar(45) DEFAULT NULL,
  `EDIT_STATUS` varchar(45) DEFAULT NULL,
  `USER` varchar(45) DEFAULT NULL,
  `EMPLOYEEPHONE3` varchar(45) DEFAULT NULL,
  `EMPLOYEEPHONE4` varchar(45) DEFAULT NULL,
  `LOCATION_ID` varchar(45) DEFAULT NULL,
  `LOCATION_NAME` varchar(45) DEFAULT NULL,
  `LOCATION_PATH` varchar(45) DEFAULT NULL,
  `LIB_ID` varchar(45) DEFAULT NULL,
  `LIB_NAME` varchar(45) DEFAULT NULL,
  `LIB_PATH` varchar(45) DEFAULT NULL,
  `LEAD_DETAILScol` varchar(45) NOT NULL,
  `REMARKS` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `lead_reminder`
-- -----------------------------------------------------
CREATE TABLE `lead_reminder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LEAD_REMINDER_ID` varchar(45) DEFAULT NULL,
  `LEAD_ID` varchar(45) DEFAULT NULL,
  `SUBID` varchar(45) DEFAULT NULL,
  `LEADEMPID` varchar(45) DEFAULT NULL,
  `REMI_DATE` varchar(45) DEFAULT NULL,
  `REM_TIME` varchar(45) DEFAULT NULL,
  `CONNTYPE` varchar(45) DEFAULT NULL,
  `STATUS` varchar(45) DEFAULT NULL,
  `MEETING_START` varchar(45) DEFAULT NULL,
  `MEETING_END` varchar(45) DEFAULT NULL,
  `ADDREMTIME` varchar(45) DEFAULT NULL,
  `MANAGERID` varchar(45) DEFAULT NULL,
  `TIMESTAMP` varchar(45) DEFAULT NULL,
  `REMARKS` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `lead_store`
-- -----------------------------------------------------
CREATE TABLE `lead_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LED_STORE_ID` varchar(45) DEFAULT NULL,
  `LEAD_KEY` varchar(45) DEFAULT NULL,
  `LEAD_VALUE` varchar(45) DEFAULT NULL,
  `REMARKS` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

	
-- -----------------------------------------------------
-- Table `lookup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lookup` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `LOOKUP_ID` VARCHAR(45) NULL DEFAULT NULL,
  `LOOKUP_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `LOOKUP_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `LOOKUP_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `rep_lead_mapping`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rep_lead_mapping` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `REP_LEAD_MAP_ID` VARCHAR(45) NULL DEFAULT NULL,
  `REP_ID` VARCHAR(45) NULL DEFAULT NULL,
  `LEAD_ID` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `rep_location_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rep_location_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `LOCATION_ID` VARCHAR(45) NULL DEFAULT NULL,
  `SUBSCRIBERID` VARCHAR(45) NULL DEFAULT NULL,
  `LATITUDE` VARCHAR(45) NULL DEFAULT NULL,
  `LONGITUDE` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  `TRAVELSTATE` VARCHAR(45) NULL DEFAULT NULL,
  `LEAD_ID` VARCHAR(45) NULL DEFAULT NULL,
  `DISTANCE` VARCHAR(45) NULL DEFAULT NULL,
  `AGENDA` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `rep_transaction_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rep_transaction_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `REP_TRANSACTION_ID` VARCHAR(45) NULL DEFAULT NULL,
  `REP_ID` VARCHAR(45) NULL DEFAULT NULL,
  `LEAD_TYPE` VARCHAR(45) NULL DEFAULT NULL,
  `LEAD_STATE` VARCHAR(45) NULL DEFAULT NULL,
  `APP_STATUS` VARCHAR(45) NULL DEFAULT NULL,
  `TIME` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(45) NULL DEFAULT NULL,
  `UPDATE_USER` VARCHAR(45) NULL DEFAULT NULL,
  `UPDATE_TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `representative_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `representative_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `REPRESENTATIVE_ID` VARCHAR(45) NULL DEFAULT NULL,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `PRODUCTID` VARCHAR(45) NULL DEFAULT NULL,
  `USER_LOCATION_TRACKING` VARCHAR(45) NULL DEFAULT NULL,
  `CALL_RECORDING` VARCHAR(45) NULL DEFAULT NULL,
  `WORKING_DAYS` VARCHAR(45) NULL DEFAULT NULL,
  `WRK_START_TIME` VARCHAR(45) NULL DEFAULT NULL,
  `WRK_END_TIME` VARCHAR(45) NULL DEFAULT NULL,
  `ROUND_CLOCK_TRACKING` VARCHAR(45) NULL DEFAULT NULL,
  `SUBSCRIBERISDCODE` VARCHAR(45) NULL DEFAULT NULL,
  `EXPENSES_CATEGORY_ID` VARCHAR(45) NULL DEFAULT NULL,
  `CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `RESOURCE_CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `RESOURCE_COST` VARCHAR(45) NULL DEFAULT NULL,
  `TRAVEL_CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `TRAVEL_COST` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_CALL_CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_CALL_COST` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_SMS_CURRENCY` VARCHAR(45) NULL DEFAULT NULL,
  `OUTGOING_SMS_COST` VARCHAR(45) NULL DEFAULT NULL,
  `SUBSCRIBERPROFILE` VARCHAR(45) NULL DEFAULT NULL,
  `REP_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `REP_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  `UPDATE_USER` VARCHAR(45) NULL DEFAULT NULL,
  `UPDATE_TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_representative_details_user_details1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_representative_details_user_details1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `user_access_rights`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_access_rights` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `ACCESS_ID` VARCHAR(45) NOT NULL DEFAULT '',
  `ACCESS_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `ACCESS_KEY` VARCHAR(15) NULL DEFAULT NULL,
  `ACCESS_VALUE` VARCHAR(15) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(255) NULL DEFAULT NULL,
  `ROLE_ID` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `ACCESS_ID`));


-- -----------------------------------------------------
-- Table `user_chat_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_chat_settings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `HISTORY_PERIOD` VARCHAR(45) NULL DEFAULT NULL,
  `DISK_SPACE` VARCHAR(45) NULL DEFAULT NULL,
  `TIMESTAMP` VARCHAR(45) NULL DEFAULT NULL,
  `AUDIO` VARCHAR(45) NULL DEFAULT NULL,
  `VIDEO` VARCHAR(45) NULL DEFAULT NULL,
  `IMAGE` VARCHAR(45) NULL DEFAULT NULL,
  `DOCUMENTS` VARCHAR(45) NULL DEFAULT NULL,
  `LOCATION` VARCHAR(45) NULL DEFAULT NULL,
  `CHAT_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `CHAT_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_chat_settings_user_details1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_user_chat_settings_user_details1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_user_chat_settings_user_details2`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `user_responsibilities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_responsibilities` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `RESPONSIBILITY_ID` VARCHAR(15) NOT NULL DEFAULT '',
  `RESPONSIBILITY_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `RESPONSIBILITY_KEY` VARCHAR(15) NULL DEFAULT NULL,
  `RESPONSIBILITY_VALUE` VARCHAR(15) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(255) NULL DEFAULT NULL,
  `ROLE_ID` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `RESPONSIBILITY_ID`));


-- -----------------------------------------------------
-- Table `user_role_responsibilities_access_mapping`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_role_responsibilities_access_mapping` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  `ROLE_ID` VARCHAR(45) NULL DEFAULT NULL,
  `RESPONSIBILITY_ID` VARCHAR(45) NULL DEFAULT NULL,
  `ACCESS_ID` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_role_responsibilities_access_mapping_user_details1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_user_role_responsibilities_access_mapping_user_details1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `user_details` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `ROLE_ID` VARCHAR(45) NOT NULL DEFAULT '',
  `ROLE_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `ROLE_KEY` VARCHAR(45) NULL DEFAULT NULL,
  `ROLE_VALUE` VARCHAR(45) NULL DEFAULT NULL,
  `REMARKS` VARCHAR(255) NULL DEFAULT NULL,
  `USER_ID` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `ROLE_ID`));