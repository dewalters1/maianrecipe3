ALTER TABLE mr_settings ADD COLUMN install_path VARCHAR(250) NOT NULL default '' AFTER language;
ALTER TABLE mr_settings ADD COLUMN modr ENUM('0','1') NOT NULL DEFAULT '0' AFTER smtp_port;
