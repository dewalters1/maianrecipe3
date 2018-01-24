ALTER TABLE `mr_settings` ADD COLUMN smtp ENUM('0','1') NOT NULL DEFAULT '0' AFTER total;
ALTER TABLE `mr_settings` ADD COLUMN smtp_host varchar(100) NOT NULL default 'localhost' AFTER smtp;
ALTER TABLE `mr_settings` ADD COLUMN smtp_user varchar(100) NOT NULL default '' AFTER smtp_host;
ALTER TABLE `mr_settings` ADD COLUMN smtp_pass varchar(100) NOT NULL default '' AFTER smtp_user;
ALTER TABLE `mr_settings` ADD COLUMN smtp_port varchar(100) NOT NULL default '25' AFTER smtp_pass;