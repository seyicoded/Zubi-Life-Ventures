CREATE TABLE `zubi_venture`.`investors` ( `i_id` INT NOT NULL AUTO_INCREMENT ,  `a_id` INT NOT NULL DEFAULT '1' ,  `i_name` TEXT NOT NULL ,  `i_email` TEXT NOT NULL ,  `i_password` TEXT NOT NULL ,  `i_phone` TEXT NOT NULL ,  `i_status` INT NOT NULL DEFAULT '1' ,  `date_updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`i_id`)) ENGINE = InnoDB;

ALTER TABLE `investors` CHANGE `i_email` `i_email` VARCHAR(760) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `investors` ADD UNIQUE(`i_email`);

ALTER TABLE `investors`  ADD `code` TEXT NOT NULL  AFTER `i_status`;
