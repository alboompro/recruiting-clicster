CREATE SCHEMA `alboom` DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

CREATE TABLE `clients` (
  `cli_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cli_name` VARCHAR(100) NOT NULL,
  `cli_company` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`cli_id`));

  INSERT INTO `clients` (`cli_name`, `cli_company`) VALUES ('Nome1', 'Empresa1');
  INSERT INTO `clients` (`cli_name`, `cli_company`) VALUES ('Nome2', 'Empresa2');
