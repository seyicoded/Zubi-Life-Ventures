-- create package dB
CREATE TABLE `zubi_venture`.`packages` ( `p_id` INT NOT NULL AUTO_INCREMENT ,  `c_id` INT NOT NULL ,  `p_name` TEXT NOT NULL ,  `p_route_name` TEXT NOT NULL ,  `p_desc` LONGBLOB NOT NULL ,  `p_image` TEXT NOT NULL ,  `duration` INT NOT NULL COMMENT 'in days' ,  `amount_type` INT NOT NULL DEFAULT '1' ,  `amount_one` INT NOT NULL ,  `amount_two` INT NOT NULL ,  `currency` VARCHAR(7600) NOT NULL DEFAULT 'NGN' ,  `status` INT(1) NOT NULL ,  `date_updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`p_id`)) ENGINE = InnoDB;

CREATE TABLE `zubi_venture`.`package_other_images` ( `po_id` INT NOT NULL AUTO_INCREMENT ,  `p_id` INT NOT NULL ,  `images` INT NOT NULL ,  `status` INT NOT NULL DEFAULT '1' ,  `date_` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`po_id`)) ENGINE = InnoDB;

ALTER TABLE `packages` CHANGE `status` `status` INT(1) NOT NULL DEFAULT '1';

ALTER TABLE `package_other_images` CHANGE `images` `images` TEXT NOT NULL;
