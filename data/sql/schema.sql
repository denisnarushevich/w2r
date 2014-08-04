CREATE TABLE activity_translation (id BIGINT, name VARCHAR(255) NOT NULL, description text NOT NULL, summary text, visible TINYINT(1) DEFAULT '1', lang CHAR(2), slug VARCHAR(255), UNIQUE INDEX activity_translation_sluggable_idx (slug, lang, name), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity (id BIGINT AUTO_INCREMENT, id_category BIGINT NOT NULL, image VARCHAR(255), default_price BIGINT NOT NULL, stars BIGINT NOT NULL, firstname VARCHAR(255), lastname VARCHAR(255), phone VARCHAR(14), email VARCHAR(255), address VARCHAR(255), del TINYINT(1) DEFAULT '0', INDEX id_category_idx (id_category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity_category_translation (id BIGINT, name VARCHAR(255) NOT NULL, description text NOT NULL, visible TINYINT(1) DEFAULT '1', lang CHAR(2), slug VARCHAR(255), UNIQUE INDEX activity_category_translation_sluggable_idx (slug, lang, name), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity_category (id BIGINT AUTO_INCREMENT, image VARCHAR(255), del TINYINT(1) DEFAULT '0', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity_price_translation (id BIGINT, price BIGINT UNSIGNED NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity_price (id BIGINT AUTO_INCREMENT, id_activity BIGINT NOT NULL, date_begin DATE, date_end DATE, INDEX id_activity_idx (id_activity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE bonuspartner_translation (id BIGINT, comment VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE bonuspartner (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, id_partner BIGINT NOT NULL, code VARCHAR(255) NOT NULL, INDEX id_partner_idx (id_partner), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE booking (id BIGINT AUTO_INCREMENT, id_client BIGINT NOT NULL, id_activity BIGINT NOT NULL, id_planner BIGINT NOT NULL, date_begin DATE NOT NULL, date_end DATE NOT NULL, other_info text, nb_persons BIGINT NOT NULL, status VARCHAR(255) NOT NULL, log_price BIGINT UNSIGNED NOT NULL, INDEX id_client_idx (id_client), INDEX id_activity_idx (id_activity), INDEX id_planner_idx (id_planner), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE card (id BIGINT AUTO_INCREMENT, id_client BIGINT NOT NULL, card_name VARCHAR(255) NOT NULL, card_numero VARCHAR(255) NOT NULL, valid_to DATE NOT NULL, INDEX id_client_idx (id_client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE catalogue (cat_id BIGINT AUTO_INCREMENT, name VARCHAR(100), source_lang VARCHAR(100), target_lang VARCHAR(100), date_created BIGINT, date_modified BIGINT, author VARCHAR(255), PRIMARY KEY(cat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE comment (id BIGINT AUTO_INCREMENT, description TEXT, id_activity BIGINT NOT NULL, id_client BIGINT NOT NULL, valide TINYINT(1) DEFAULT '0', del TINYINT(1) DEFAULT '0', INDEX id_client_idx (id_client), INDEX id_activity_idx (id_activity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE contact (id BIGINT AUTO_INCREMENT, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, comment TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra_translation (id BIGINT, name VARCHAR(255) NOT NULL, description text NOT NULL, price BIGINT UNSIGNED NOT NULL, lang CHAR(2), slug VARCHAR(255), UNIQUE INDEX extra_translation_sluggable_idx (slug, lang, name), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra (id BIGINT AUTO_INCREMENT, id_category BIGINT, del TINYINT(1) DEFAULT '0', INDEX id_category_idx (id_category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra_activity (id BIGINT AUTO_INCREMENT, id_activity BIGINT, id_extra BIGINT, INDEX id_extra_idx (id_extra), INDEX id_activity_idx (id_activity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra_category_translation (id BIGINT, name VARCHAR(255) NOT NULL, description text NOT NULL, lang CHAR(2), slug VARCHAR(255), UNIQUE INDEX extra_category_translation_sluggable_idx (slug, lang, name), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra_category (id BIGINT AUTO_INCREMENT, del TINYINT(1) DEFAULT '0', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE extra_reserved (id BIGINT AUTO_INCREMENT, id_extra BIGINT NOT NULL, id_booking BIGINT NOT NULL, id_activity BIGINT NOT NULL, log_price BIGINT UNSIGNED NOT NULL, INDEX id_extra_idx (id_extra), INDEX id_booking_idx (id_booking), INDEX id_activity_idx (id_activity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE highlight_activity_translation (id BIGINT, activity BIGINT, title VARCHAR(255), title_blue VARCHAR(255), description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE highlight_activity (id BIGINT AUTO_INCREMENT, number BIGINT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE image (id BIGINT AUTO_INCREMENT, id_object BIGINT NOT NULL, type_object VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE informations_translation (id BIGINT, name TEXT, value TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE informations (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE langues (id BIGINT AUTO_INCREMENT, iso VARCHAR(255) NOT NULL UNIQUE, country VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE langues_money (id BIGINT AUTO_INCREMENT, langues_id BIGINT NOT NULL, money_id BIGINT NOT NULL, INDEX langues_id_idx (langues_id), INDEX money_id_idx (money_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE lexique_translation (id BIGINT, name VARCHAR(255), value TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE lexique (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE money (id BIGINT AUTO_INCREMENT, money_name VARCHAR(255) NOT NULL, money_curr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE partners (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, contact_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE planner (id BIGINT AUTO_INCREMENT, id_client BIGINT NOT NULL, id_employee BIGINT, date_begin DATE NOT NULL, date_end DATE NOT NULL, submit_date DATE NOT NULL, contact_name TEXT, contact_surname TEXT, other_info text, status VARCHAR(255) NOT NULL, log_price BIGINT UNSIGNED NOT NULL, bonus_code VARCHAR(255), INDEX id_client_idx (id_client), INDEX id_employee_idx (id_employee), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE review (id BIGINT AUTO_INCREMENT, id_client BIGINT NOT NULL, description TEXT NOT NULL, image VARCHAR(255), country VARCHAR(255), valide TINYINT(1) DEFAULT '0', del TINYINT(1) DEFAULT '0', INDEX id_client_idx (id_client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE slider (id BIGINT AUTO_INCREMENT, image VARCHAR(255) NOT NULL, id_activity BIGINT NOT NULL, title VARCHAR(255) NOT NULL, position BIGINT DEFAULT 0, active TINYINT(1) DEFAULT '0', lang BIGINT NOT NULL, INDEX id_activity_idx (id_activity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE slides_activity (id BIGINT AUTO_INCREMENT, id_object BIGINT NOT NULL, type_object VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, position BIGINT DEFAULT 0, active TINYINT(1) DEFAULT '0', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE trans_unit (msg_id BIGINT AUTO_INCREMENT, cat_id BIGINT, id VARCHAR(255), source LONGTEXT, target LONGTEXT, comments LONGTEXT, date_added BIGINT, date_modified BIGINT, author VARCHAR(255), translated TINYINT(1) DEFAULT '0', INDEX cat_id_idx (cat_id), PRIMARY KEY(msg_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE user (id BIGINT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, email VARCHAR(128) NOT NULL UNIQUE, firstname VARCHAR(80), lastname VARCHAR(80), phone VARCHAR(14) NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '0', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX name_idx_idx (username), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_activation_code (user_id BIGINT, code VARCHAR(128), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id)) ENGINE = INNODB;
CREATE TABLE video (id BIGINT AUTO_INCREMENT, id_object BIGINT NOT NULL, type_object VARCHAR(255) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE activity_translation ADD CONSTRAINT activity_translation_id_activity_id FOREIGN KEY (id) REFERENCES activity(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE activity ADD CONSTRAINT activity_id_category_activity_category_id FOREIGN KEY (id_category) REFERENCES activity_category(id);
ALTER TABLE activity_category_translation ADD CONSTRAINT activity_category_translation_id_activity_category_id FOREIGN KEY (id) REFERENCES activity_category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE activity_price_translation ADD CONSTRAINT activity_price_translation_id_activity_price_id FOREIGN KEY (id) REFERENCES activity_price(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE activity_price ADD CONSTRAINT activity_price_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE bonuspartner_translation ADD CONSTRAINT bonuspartner_translation_id_bonuspartner_id FOREIGN KEY (id) REFERENCES bonuspartner(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE bonuspartner ADD CONSTRAINT bonuspartner_id_partner_partners_id FOREIGN KEY (id_partner) REFERENCES partners(id);
ALTER TABLE booking ADD CONSTRAINT booking_id_planner_planner_id FOREIGN KEY (id_planner) REFERENCES planner(id);
ALTER TABLE booking ADD CONSTRAINT booking_id_client_user_id FOREIGN KEY (id_client) REFERENCES user(id);
ALTER TABLE booking ADD CONSTRAINT booking_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE card ADD CONSTRAINT card_id_client_user_id FOREIGN KEY (id_client) REFERENCES user(id);
ALTER TABLE comment ADD CONSTRAINT comment_id_client_user_id FOREIGN KEY (id_client) REFERENCES user(id);
ALTER TABLE comment ADD CONSTRAINT comment_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE extra_translation ADD CONSTRAINT extra_translation_id_extra_id FOREIGN KEY (id) REFERENCES extra(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE extra ADD CONSTRAINT extra_id_category_extra_category_id FOREIGN KEY (id_category) REFERENCES extra_category(id);
ALTER TABLE extra_activity ADD CONSTRAINT extra_activity_id_extra_extra_id FOREIGN KEY (id_extra) REFERENCES extra(id);
ALTER TABLE extra_activity ADD CONSTRAINT extra_activity_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE extra_category_translation ADD CONSTRAINT extra_category_translation_id_extra_category_id FOREIGN KEY (id) REFERENCES extra_category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE extra_reserved ADD CONSTRAINT extra_reserved_id_extra_extra_id FOREIGN KEY (id_extra) REFERENCES extra(id);
ALTER TABLE extra_reserved ADD CONSTRAINT extra_reserved_id_booking_booking_id FOREIGN KEY (id_booking) REFERENCES booking(id);
ALTER TABLE extra_reserved ADD CONSTRAINT extra_reserved_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE highlight_activity_translation ADD CONSTRAINT highlight_activity_translation_id_highlight_activity_id FOREIGN KEY (id) REFERENCES highlight_activity(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE informations_translation ADD CONSTRAINT informations_translation_id_informations_id FOREIGN KEY (id) REFERENCES informations(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE langues_money ADD CONSTRAINT langues_money_money_id_money_id FOREIGN KEY (money_id) REFERENCES money(id);
ALTER TABLE langues_money ADD CONSTRAINT langues_money_langues_id_langues_id FOREIGN KEY (langues_id) REFERENCES langues(id);
ALTER TABLE lexique_translation ADD CONSTRAINT lexique_translation_id_lexique_id FOREIGN KEY (id) REFERENCES lexique(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE planner ADD CONSTRAINT planner_id_employee_sf_guard_user_id FOREIGN KEY (id_employee) REFERENCES sf_guard_user(id);
ALTER TABLE planner ADD CONSTRAINT planner_id_client_user_id FOREIGN KEY (id_client) REFERENCES user(id);
ALTER TABLE review ADD CONSTRAINT review_id_client_user_id FOREIGN KEY (id_client) REFERENCES user(id);
ALTER TABLE slider ADD CONSTRAINT slider_id_activity_activity_id FOREIGN KEY (id_activity) REFERENCES activity(id);
ALTER TABLE trans_unit ADD CONSTRAINT trans_unit_cat_id_catalogue_cat_id FOREIGN KEY (cat_id) REFERENCES catalogue(cat_id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;