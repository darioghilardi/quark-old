CREATE TABLE accept (id BIGINT AUTO_INCREMENT, question_id BIGINT NOT NULL, answer_id BIGINT NOT NULL, created_at DATETIME NOT NULL, INDEX question_id_idx (question_id), INDEX answer_id_idx (answer_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE answer (id BIGINT AUTO_INCREMENT, question_id BIGINT NOT NULL, user_id BIGINT NOT NULL, body TEXT, created_at DATETIME NOT NULL, votes BIGINT DEFAULT 0, accepted TINYINT(1) DEFAULT '0', INDEX question_id_idx (question_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE interest (id BIGINT AUTO_INCREMENT, question_id BIGINT NOT NULL, user_id BIGINT NOT NULL, value BIGINT NOT NULL, created_at DATETIME NOT NULL, INDEX question_id_idx (question_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE question (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, title VARCHAR(255) NOT NULL, body TEXT, views BIGINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, interested_users BIGINT DEFAULT 0, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rating (id BIGINT AUTO_INCREMENT, answer_id BIGINT NOT NULL, user_id BIGINT NOT NULL, value BIGINT NOT NULL, created_at DATETIME NOT NULL, INDEX answer_id_idx (answer_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE static_content (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, title VARCHAR(255) NOT NULL, body TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, email_new VARCHAR(255) UNIQUE, firstname VARCHAR(255), lastname VARCHAR(255), validate_at DATETIME, validate VARCHAR(33), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX user_id_unique_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE accept ADD CONSTRAINT accept_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id) ON DELETE CASCADE;
ALTER TABLE accept ADD CONSTRAINT accept_answer_id_answer_id FOREIGN KEY (answer_id) REFERENCES answer(id) ON DELETE CASCADE;
ALTER TABLE answer ADD CONSTRAINT answer_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE answer ADD CONSTRAINT answer_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id) ON DELETE CASCADE;
ALTER TABLE interest ADD CONSTRAINT interest_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE interest ADD CONSTRAINT interest_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id) ON DELETE CASCADE;
ALTER TABLE question ADD CONSTRAINT question_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE rating ADD CONSTRAINT rating_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE rating ADD CONSTRAINT rating_answer_id_answer_id FOREIGN KEY (answer_id) REFERENCES answer(id) ON DELETE CASCADE;
ALTER TABLE static_content ADD CONSTRAINT static_content_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_profile ADD CONSTRAINT sf_guard_user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
