CREATE TABLE `zubi_venture`.`investors_packages_linker` ( `u_id` INT NOT NULL AUTO_INCREMENT ,  `p_id` INT NOT NULL ,  `duration_count` INT NOT NULL ,  `duration_paid` INT NOT NULL DEFAULT '0' ,  `amount_paid` TEXT NOT NULL DEFAULT '0' ,  `currency` VARCHAR(760) NOT NULL DEFAULT 'NGN' ,  `amount_to_pay` TEXT NOT NULL ,  `last_four_card_numb` TEXT NULL ,  `email` TEXT NULL ,  `reusable` INT NULL ,  `auth_code` INT NULL ,  `status` INT NOT NULL DEFAULT '0' ,  `date_updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`u_id`)) ENGINE = InnoDB;

ALTER TABLE `investors_packages_linker`  ADD `tnx_ref` TEXT NOT NULL  AFTER `duration_count`;

ALTER TABLE `investors_packages_linker`  ADD `i_id` INT NOT NULL  AFTER `u_id`;
