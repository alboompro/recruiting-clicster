CREATE SCHEMA `alboom` DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

CREATE TABLE `clients` (
  `cli_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cli_name` VARCHAR(100) NOT NULL,
  `cli_company` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`cli_id`));

  INSERT INTO `clients` (`cli_name`, `cli_company`) VALUES ('Nome1', 'Empresa1');
  INSERT INTO `clients` (`cli_name`, `cli_company`) VALUES ('Nome2', 'Empresa2');


  CREATE TABLE IF NOT EXISTS `mydb`.`emails` (
  `ema_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `ema_email` VARCHAR(200) NOT NULL,
  `ema_id_clients` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ema_id`),
  INDEX `fk_emails_1_idx` (`ema_id_clients` ASC),
  CONSTRAINT `fk_emails_1`
    FOREIGN KEY (`ema_id_clients`)
    REFERENCES `mydb`.`clients` (`cli_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Table for all client\'s emails'
