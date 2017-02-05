-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema payroll_test
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `payroll_test` ;

-- -----------------------------------------------------
-- Schema payroll_test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `payroll_test` DEFAULT CHARACTER SET utf8 ;
USE `payroll_test` ;

-- -----------------------------------------------------
-- Table `payroll_test`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`role` (
  `code` VARCHAR(32) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`company` (
  `code` VARCHAR(32) NOT NULL,
  `name` VARCHAR(128) NULL,
  `address` TEXT NULL,
  `last_payroll_closing_date` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  `created_by` VARCHAR(32) NULL,
  `update_at` TIMESTAMP NULL,
  `updated_by` VARCHAR(32) NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`location` (
  `code` VARCHAR(32) NOT NULL,
  `company_code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NULL,
  `address` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `created_by` VARCHAR(32) NULL,
  `updated_at` TIMESTAMP NULL,
  `updated_by` VARCHAR(32) NULL,
  PRIMARY KEY (`code`, `company_code`),
  INDEX `fk_location_company1_idx` (`company_code` ASC),
  CONSTRAINT `fk_location_company1`
    FOREIGN KEY (`company_code`)
    REFERENCES `payroll_test`.`company` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`position_level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`position_level` (
  `code` VARCHAR(12) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  `level` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`position` (
  `code` BIGINT NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `parent_code` BIGINT NULL,
  `name` VARCHAR(32) NOT NULL,
  `position_level_code` VARCHAR(12) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `created_by` VARCHAR(32) NULL,
  `updated_at` TIMESTAMP NULL,
  `updated_by` VARCHAR(32) NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_position_position1_idx` (`parent_code` ASC),
  INDEX `fk_position_position_level1_idx` (`position_level_code` ASC),
  CONSTRAINT `fk_position_position1`
    FOREIGN KEY (`parent_code`)
    REFERENCES `payroll_test`.`position` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_position_position_level1`
    FOREIGN KEY (`position_level_code`)
    REFERENCES `payroll_test`.`position_level` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`tax_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`tax_category` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  `exemption_amount` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`policy_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`policy_settings` (
  `code` VARCHAR(32) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `grace_period` INT NULL DEFAULT 5,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`policy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`policy` (
  `code` VARCHAR(32) NOT NULL,
  `short_description` VARCHAR(64) NOT NULL,
  `long_description` TEXT NULL,
  `policy_settings_code` VARCHAR(32) NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_policy_policy_settings1_idx` (`policy_settings_code` ASC),
  CONSTRAINT `fk_policy_policy_settings1`
    FOREIGN KEY (`policy_settings_code`)
    REFERENCES `payroll_test`.`policy_settings` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`employee` (
  `code` VARCHAR(24) NOT NULL,
  `salary` DOUBLE NOT NULL DEFAULT 1,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `email` VARCHAR(64) NOT NULL,
  `first_name` VARCHAR(32) NOT NULL,
  `middle_name` VARCHAR(32) NULL,
  `last_name` VARCHAR(32) NOT NULL,
  `address` TEXT NULL,
  `birth_date` DATE NULL,
  `gender_code` VARCHAR(1) NULL,
  `civil_status_code` VARCHAR(1) NULL,
  `contact_number_1` VARCHAR(32) NULL,
  `contact_number_2` VARCHAR(32) NULL,
  `phone_number` VARCHAR(32) NULL,
  `date_hired` DATE NULL,
  `date_dismissed` DATE NULL,
  `location_code` VARCHAR(32) NOT NULL,
  `company_code` VARCHAR(32) NOT NULL,
  `position_code` BIGINT NOT NULL,
  `tax_category_code` VARCHAR(32) NOT NULL,
  `policy_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_employee_location1_idx` (`location_code` ASC, `company_code` ASC),
  INDEX `fk_employee_position1_idx` (`position_code` ASC),
  INDEX `fk_employee_tax_category1_idx` (`tax_category_code` ASC),
  INDEX `fk_employee_policy1_idx` (`policy_code` ASC),
  CONSTRAINT `fk_employee_location1`
    FOREIGN KEY (`location_code` , `company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_position1`
    FOREIGN KEY (`position_code`)
    REFERENCES `payroll_test`.`position` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_tax_category1`
    FOREIGN KEY (`tax_category_code`)
    REFERENCES `payroll_test`.`tax_category` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_policy1`
    FOREIGN KEY (`policy_code`)
    REFERENCES `payroll_test`.`policy` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`user` (
  `id` VARCHAR(32) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `role_code` VARCHAR(32) NOT NULL,
  `employee_code` VARCHAR(24) NULL,
  `display_name` VARCHAR(64) NOT NULL,
  `default_location_code` VARCHAR(32) NOT NULL,
  `default_company_code` VARCHAR(32) NOT NULL,
  `password` VARCHAR(120) NOT NULL,
  `remember_token` VARCHAR(120) NULL,
  `created_at` TIMESTAMP NULL,
  `created_by` VARCHAR(32) NULL,
  `updated_at` TIMESTAMP NULL,
  `updated_by` VARCHAR(32) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_SYS_Users_SYS_Roles_idx` (`role_code` ASC),
  INDEX `fk_user_location1_idx` (`default_location_code` ASC, `default_company_code` ASC),
  INDEX `fk_user_employee1_idx` (`employee_code` ASC),
  CONSTRAINT `fk_SYS_Users_SYS_Roles`
    FOREIGN KEY (`role_code`)
    REFERENCES `payroll_test`.`role` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_location1`
    FOREIGN KEY (`default_location_code` , `default_company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`module_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`module_group` (
  `code` VARCHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `description` VARCHAR(64) NULL,
  `relative_url` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE INDEX `relative_url_UNIQUE` (`relative_url` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`module`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`module` (
  `code` VARCHAR(32) NOT NULL,
  `with_number_series` TINYINT(1) NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `description` VARCHAR(64) NULL,
  `module_group_code` VARCHAR(32) NOT NULL,
  `relative_url` VARCHAR(64) NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_module_module_groups1_idx` (`module_group_code` ASC),
  CONSTRAINT `fk_module_module_groups1`
    FOREIGN KEY (`module_group_code`)
    REFERENCES `payroll_test`.`module_group` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`module_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`module_access` (
  `role_code` VARCHAR(32) NOT NULL,
  `module_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`role_code`),
  INDEX `fk_access_list_module1_idx` (`module_code` ASC),
  CONSTRAINT `fk_access_list_roles1`
    FOREIGN KEY (`role_code`)
    REFERENCES `payroll_test`.`role` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_access_list_module1`
    FOREIGN KEY (`module_code`)
    REFERENCES `payroll_test`.`module` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`number_series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`number_series` (
  `code` VARCHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `description` VARCHAR(64) NULL,
  `module_code` VARCHAR(32) NOT NULL,
  `start_number` INT(11) NOT NULL DEFAULT 0,
  `end_number` BIGINT NOT NULL,
  `last_number_used` BIGINT NOT NULL,
  `last_date_used` TIMESTAMP NULL,
  `expiry_date` TIMESTAMP NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_number_series_list_module1_idx` (`module_code` ASC),
  CONSTRAINT `fk_number_series_list_module1`
    FOREIGN KEY (`module_code`)
    REFERENCES `payroll_test`.`module` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`user_location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`user_location` (
  `user_id` VARCHAR(32) NOT NULL,
  `location_code` VARCHAR(32) NOT NULL,
  `company_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_locations_has_users_users1_idx` (`user_id` ASC),
  INDEX `fk_user_location_location1_idx` (`location_code` ASC, `company_code` ASC),
  CONSTRAINT `fk_locations_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `payroll_test`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_location_location1`
    FOREIGN KEY (`location_code` , `company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`function_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`function_access` (
  `role_code` VARCHAR(32) NOT NULL,
  `module_code` VARCHAR(32) NOT NULL,
  `function_code` VARCHAR(32) NOT NULL,
  INDEX `fk_function_access_list_role1_idx` (`role_code` ASC),
  INDEX `fk_function_access_list_module1_idx` (`module_code` ASC),
  CONSTRAINT `fk_function_access_list_role1`
    FOREIGN KEY (`role_code`)
    REFERENCES `payroll_test`.`role` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_function_access_list_module1`
    FOREIGN KEY (`module_code`)
    REFERENCES `payroll_test`.`module` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`holiday_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`holiday_type` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`holiday`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`holiday` (
  `code` VARCHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `holiday_type_code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  `date_start` TIMESTAMP NULL,
  `date_end` TIMESTAMP NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_holiday_holiday_type1_idx` (`holiday_type_code` ASC),
  CONSTRAINT `fk_holiday_holiday_type1`
    FOREIGN KEY (`holiday_type_code`)
    REFERENCES `payroll_test`.`holiday_type` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`location_has_holiday`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`location_has_holiday` (
  `location_code` VARCHAR(32) NOT NULL,
  `location_company_code` VARCHAR(32) NOT NULL,
  `holiday_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`location_code`, `location_company_code`, `holiday_code`),
  INDEX `fk_location_has_holiday_holiday1_idx` (`holiday_code` ASC),
  INDEX `fk_location_has_holiday_location1_idx` (`location_code` ASC, `location_company_code` ASC),
  CONSTRAINT `fk_location_has_holiday_location1`
    FOREIGN KEY (`location_code` , `location_company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_location_has_holiday_holiday1`
    FOREIGN KEY (`holiday_code`)
    REFERENCES `payroll_test`.`holiday` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`shift`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`shift` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  `scheduled_in` TIME NOT NULL,
  `scheduled_out` TIME NOT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`shift_break`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`shift_break` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  `break_start` TIME NOT NULL,
  `break_end` TIME NOT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`shift_has_break`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`shift_has_break` (
  `shift_code` VARCHAR(32) NOT NULL,
  `shift_break_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`shift_code`, `shift_break_code`),
  INDEX `fk_shift_break_has_shift_shift1_idx` (`shift_code` ASC),
  INDEX `fk_shift_break_has_shift_shift_break1_idx` (`shift_break_code` ASC),
  CONSTRAINT `fk_shift_break_has_shift_shift_break1`
    FOREIGN KEY (`shift_break_code`)
    REFERENCES `payroll_test`.`shift_break` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shift_break_has_shift_shift1`
    FOREIGN KEY (`shift_code`)
    REFERENCES `payroll_test`.`shift` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`work_schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`work_schedule` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`work_schedule_has_shift`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`work_schedule_has_shift` (
  `work_schedule_code` VARCHAR(32) NOT NULL,
  `shift_code` VARCHAR(32) NOT NULL,
  `week_day` INT NOT NULL,
  PRIMARY KEY (`work_schedule_code`, `shift_code`, `week_day`),
  INDEX `fk_work_schedule_has_shift_shift1_idx` (`shift_code` ASC),
  INDEX `fk_work_schedule_has_shift_work_schedule1_idx` (`work_schedule_code` ASC),
  CONSTRAINT `fk_work_schedule_has_shift_work_schedule1`
    FOREIGN KEY (`work_schedule_code`)
    REFERENCES `payroll_test`.`work_schedule` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_work_schedule_has_shift_shift1`
    FOREIGN KEY (`shift_code`)
    REFERENCES `payroll_test`.`shift` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`employee_work_schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`employee_work_schedule` (
  `employee_code` VARCHAR(24) NOT NULL,
  `effective_date` DATE NOT NULL,
  `work_schedule_code` VARCHAR(32) NOT NULL,
  `locked` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`employee_code`, `effective_date`),
  INDEX `fk_employee_has_work_schedule_work_schedule1_idx` (`work_schedule_code` ASC),
  INDEX `fk_employee_has_work_schedule_employee1_idx` (`employee_code` ASC),
  CONSTRAINT `fk_employee_has_work_schedule_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_has_work_schedule_work_schedule1`
    FOREIGN KEY (`work_schedule_code`)
    REFERENCES `payroll_test`.`work_schedule` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`shift_adjustment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`shift_adjustment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_applied` DATE NOT NULL,
  `shift_code` VARCHAR(32) NOT NULL,
  `employee_code` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_shift_adjustment_shift1_idx` (`shift_code` ASC),
  INDEX `fk_shift_adjustment_employee1_idx` (`employee_code` ASC),
  CONSTRAINT `fk_shift_adjustment_shift1`
    FOREIGN KEY (`shift_code`)
    REFERENCES `payroll_test`.`shift` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shift_adjustment_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`location_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`location_group` (
  `code` VARCHAR(32) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`location_group_has_location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`location_group_has_location` (
  `location_group_code` VARCHAR(32) NOT NULL,
  `location_code` VARCHAR(32) NOT NULL,
  `location_company_code` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`location_group_code`, `location_code`, `location_company_code`),
  INDEX `fk_location_group_has_location_location1_idx` (`location_code` ASC, `location_company_code` ASC),
  INDEX `fk_location_group_has_location_location_group1_idx` (`location_group_code` ASC),
  CONSTRAINT `fk_location_group_has_location_location_group1`
    FOREIGN KEY (`location_group_code`)
    REFERENCES `payroll_test`.`location_group` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_location_group_has_location_location1`
    FOREIGN KEY (`location_code` , `location_company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`payroll_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`payroll_item` (
  `code` VARCHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `description` VARCHAR(64) NOT NULL,
  `standard` TINYINT(1) NOT NULL DEFAULT 0,
  `taxable` TINYINT(1) NOT NULL DEFAULT 1,
  `type` CHAR(1) NOT NULL DEFAULT 'D' COMMENT '(D)eduction or (E)arnings',
  `computation_basis` CHAR(2) NOT NULL COMMENT '(D)ay, (H)our, (M)inute, (EA) - Exact Amount',
  `special_holiday_rate` FLOAT NOT NULL DEFAULT 1,
  `regular_holiday_rate` FLOAT NOT NULL DEFAULT 1,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`payroll`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`payroll` (
  `pay_period` DATE NOT NULL,
  `open` TINYINT(1) NOT NULL DEFAULT 1,
  `cutoff_start` DATE NOT NULL,
  `cutoff_end` DATE NOT NULL,
  `next_pay_period` DATE NOT NULL,
  `tax` TINYINT(1) NOT NULL DEFAULT 0,
  `sss` TINYINT(1) NOT NULL DEFAULT 0,
  `pagibig` TINYINT(1) NOT NULL DEFAULT 0,
  `philhealth` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`pay_period`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`payroll_entry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`payroll_entry` (
  `employee_code` VARCHAR(12) NOT NULL,
  `payroll_item_code` VARCHAR(10) NOT NULL,
  `date_applied` DATE NOT NULL,
  `payroll_pay_period` DATE NOT NULL,
  `qty` FLOAT NOT NULL DEFAULT 1,
  `amount` FLOAT NOT NULL DEFAULT 0,
  `remarks` VARCHAR(64) NULL,
  INDEX `fk_payroll_entries_employee1_idx` (`employee_code` ASC),
  INDEX `fk_payroll_entries_payroll_items1_idx` (`payroll_item_code` ASC),
  PRIMARY KEY (`employee_code`, `payroll_item_code`, `date_applied`),
  INDEX `fk_payroll_entry_payroll1_idx` (`payroll_pay_period` ASC),
  CONSTRAINT `fk_payroll_entries_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_entries_payroll_items1`
    FOREIGN KEY (`payroll_item_code`)
    REFERENCES `payroll_test`.`payroll_item` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_entry_payroll1`
    FOREIGN KEY (`payroll_pay_period`)
    REFERENCES `payroll_test`.`payroll` (`pay_period`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`policy_payroll_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`policy_payroll_item` (
  `policy_code` VARCHAR(32) NOT NULL,
  `payroll_item_code` VARCHAR(32) NOT NULL,
  `overrides_payroll_item` VARCHAR(32) NULL,
  PRIMARY KEY (`policy_code`, `payroll_item_code`),
  INDEX `fk_policy_has_payroll_item_payroll_item1_idx` (`payroll_item_code` ASC),
  INDEX `fk_policy_has_payroll_item_policy1_idx` (`policy_code` ASC),
  INDEX `fk_policy_payroll_item_payroll_item1_idx` (`overrides_payroll_item` ASC),
  CONSTRAINT `fk_policy_has_payroll_item_policy1`
    FOREIGN KEY (`policy_code`)
    REFERENCES `payroll_test`.`policy` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_policy_has_payroll_item_payroll_item1`
    FOREIGN KEY (`payroll_item_code`)
    REFERENCES `payroll_test`.`payroll_item` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_policy_payroll_item_payroll_item1`
    FOREIGN KEY (`overrides_payroll_item`)
    REFERENCES `payroll_test`.`payroll_item` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`chrono_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`chrono_log` (
  `employee_code` VARCHAR(24) NOT NULL,
  `location_code` VARCHAR(32) NOT NULL,
  `location_company_code` VARCHAR(32) NOT NULL,
  `entry_date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`employee_code`, `entry_date`),
  INDEX `fk_chrono_log_employee1_idx` (`employee_code` ASC),
  INDEX `fk_chrono_log_location1_idx` (`location_code` ASC, `location_company_code` ASC),
  CONSTRAINT `fk_chrono_log_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chrono_log_location1`
    FOREIGN KEY (`location_code` , `location_company_code`)
    REFERENCES `payroll_test`.`location` (`code` , `company_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `payroll_test`.`face_recognition_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payroll_test`.`face_recognition_images` (
  `employee_code` VARCHAR(24) NOT NULL,
  `relative_path` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`relative_path`),
  INDEX `fk_face_recognition_images_employee1_idx` (`employee_code` ASC),
  CONSTRAINT `fk_face_recognition_images_employee1`
    FOREIGN KEY (`employee_code`)
    REFERENCES `payroll_test`.`employee` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `payroll_test`.`holiday_type`
-- -----------------------------------------------------
START TRANSACTION;
USE `payroll_test`;
INSERT INTO `payroll_test`.`holiday_type` (`code`, `description`) VALUES ('REG', 'Regular');
INSERT INTO `payroll_test`.`holiday_type` (`code`, `description`) VALUES ('SNW', 'Special Non Working');

COMMIT;

