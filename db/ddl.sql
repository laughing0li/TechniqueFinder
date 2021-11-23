-- drop database if exists techfinder;
-- create database techfinder default character set utf8 default collate utf8_general_ci;
-- create tables
use techfinder;
create table case_study (id bigint not null auto_increment, version bigint not null, name varchar(255) not null, url varchar(1024) not null, primary key (id)) ENGINE=InnoDB;
create table contact (id bigint not null auto_increment, version bigint not null, contact_position varchar(255) not null, title varchar(25) not null, technique_contact bit not null, location_id bigint not null, telephone varchar(25) not null, email varchar(255) not null, name varchar(255) not null, primary key (id)) ENGINE=InnoDB;
create table location (id bigint not null auto_increment, version bigint not null, priority integer not null, status varchar(255) not null, address longtext not null, center_name varchar(255) not null, state varchar(255) not null, institution varchar(255) not null unique, primary key (id)) ENGINE=InnoDB;
create table media (id bigint not null auto_increment, version bigint not null, thumbnail_id bigint not null, name varchar(255) not null, original_id bigint not null, caption varchar(500) not null, media_type varchar(255) not null, primary key (id)) ENGINE=InnoDB;
create table media_file (id bigint not null auto_increment, version bigint not null, height integer not null, location varchar(255) not null, width integer not null, mime varchar(255) not null, size bigint not null, primary key (id)) ENGINE=InnoDB;
create table media_in_section (id bigint not null auto_increment, version bigint not null, technique_id bigint not null, priority integer not null, media_id bigint not null, section varchar(255) not null, primary key (id)) ENGINE=InnoDB;
create table option_choice (id bigint not null auto_increment, version bigint not null, priority integer not null, name varchar(255) not null, type varchar(255) not null, science varchar(255) not null, primary key (id)) ENGINE=InnoDB;
create table option_combination (id bigint not null auto_increment, version bigint not null, technique_id bigint not null, priority integer not null, left_id bigint not null, right_id bigint not null, primary key (id)) ENGINE=InnoDB;
create table pending_email_confirmation (id bigint not null auto_increment, version bigint not null, timestamp datetime not null, user_token varchar(500), email_address varchar(80) not null, confirmation_token varchar(80) not null, primary key (id)) ENGINE=InnoDB;
create table review (id bigint not null auto_increment, version bigint not null, title varchar(255) not null, full_reference varchar(2048) not null, reference_names varchar(255) not null, url varchar(1024) not null, primary key (id)) ENGINE=InnoDB;
create table role (id bigint not null auto_increment, version bigint not null, authority varchar(255) not null unique, description varchar(255) not null, primary key (id)) ENGINE=InnoDB;
create table role_people (role_id bigint not null, user_id bigint not null, primary key (role_id, user_id)) ENGINE=InnoDB;
create table static_content (id bigint not null auto_increment, version bigint not null, text longtext not null, name varchar(255) not null unique, primary key (id)) ENGINE=InnoDB;
create table technique (id bigint not null auto_increment, version bigint not null, summary longtext not null, keywords longtext not null, description longtext not null, name varchar(255) not null unique, alternative_names longtext not null, primary key (id)) ENGINE=InnoDB;
create table technique_case_study (technique_case_studies_id bigint, case_study_id bigint) ENGINE=InnoDB;
create table technique_contact (technique_contacts_id bigint, contact_id bigint) ENGINE=InnoDB;
create table technique_review (technique_reviews_id bigint, review_id bigint) ENGINE=InnoDB;
create table user (id bigint not null auto_increment, version bigint not null, enabled bit not null, passwd varchar(255) not null, second_email varchar(255) not null, username varchar(255) not null unique, full_name varchar(255) not null, reset_password_key varchar(255),primary key (id)) ENGINE=InnoDB;
-- indexes and constraints
alter table contact add index FK38B7242092368C73 (location_id), add constraint FK38B7242092368C73 foreign key (location_id) references location (id);
alter table media add index FK62F6FE4E62EBA10 (original_id), add constraint FK62F6FE4E62EBA10 foreign key (original_id) references media_file (id);
alter table media add index FK62F6FE469B5D915 (thumbnail_id), add constraint FK62F6FE469B5D915 foreign key (thumbnail_id) references media_file (id);
alter table media_in_section add index FKA1C10D0662953801 (technique_id), add constraint FKA1C10D0662953801 foreign key (technique_id) references technique (id);
alter table media_in_section add index FKA1C10D061DF1B01 (media_id), add constraint FKA1C10D061DF1B01 foreign key (media_id) references media (id);
alter table option_combination add index FKB65D1A05C1C49DE1 (left_id), add constraint FKB65D1A05C1C49DE1 foreign key (left_id) references option_choice (id);
alter table option_combination add index FKB65D1A0568DDC7AC (right_id), add constraint FKB65D1A0568DDC7AC foreign key (right_id) references option_choice (id);
alter table option_combination add index FKB65D1A0562953801 (technique_id), add constraint FKB65D1A0562953801 foreign key (technique_id) references technique (id);
create index emailconf_token_Idx on pending_email_confirmation (confirmation_token);
create index emailconf_timestamp_Idx on pending_email_confirmation (timestamp);
alter table role_people add index FK28B75E787F3750EF (role_id), add constraint FK28B75E787F3750EF foreign key (role_id) references role (id);
alter table role_people add index FK28B75E78246214CF (user_id), add constraint FK28B75E78246214CF foreign key (user_id) references user (id);
alter table technique_case_study add index FK815B95491FA7634A (technique_case_studies_id), add constraint FK815B95491FA7634A foreign key (technique_case_studies_id) references technique (id);
alter table technique_case_study add index FK815B95496B33840 (case_study_id), add constraint FK815B95496B33840 foreign key (case_study_id) references case_study (id);
alter table technique_contact add index FK546CF1319BE40BC1 (contact_id), add constraint FK546CF1319BE40BC1 foreign key (contact_id) references contact (id);
alter table technique_contact add index FK546CF131DC7947AF (technique_contacts_id), add constraint FK546CF131DC7947AF foreign key (technique_contacts_id) references technique (id);
alter table technique_review add index FK4512C4278F70AFA5 (technique_reviews_id), add constraint FK4512C4278F70AFA5 foreign key (technique_reviews_id) references technique (id);
alter table technique_review add index FK4512C427E05E27D3 (review_id), add constraint FK4512C427E05E27D3 foreign key (review_id) references review (id);
-- alter table user ADD reset_password_key varchar(255);

-- 20180619 - CH - I don't know where these two indexes came form they are not in the original DDL and break the data import
-- ALTER TABLE role_people ADD UNIQUE (user_id);
-- alter table role_people add index FK28B75E78246214CE (user_id), add constraint FK28B75E78246214CE foreign key (user_id) references user (id) ON DELETE CASCADE;

alter table technique add fulltext index fulltext_index (`name` ASC, alternative_names ASC, summary ASC, `description` ASC, keywords ASC);
alter table contact add fulltext index fulltext_index (`name` ASC, contact_position ASC, telephone ASC, email ASC);
alter table `location` add fulltext index fulltext_index (institution ASC, center_name ASC, `address` ASC, `state` ASC);
alter table case_study add fulltext index fulltext_index (`name` ASC, `url` ASC);
alter table review add fulltext index fulltext_index (reference_names ASC, title ASC, full_reference, `url` ASC);
alter table option_choice add fulltext index fulltext_index (`name` ASC);
alter table media add fulltext index fulltext_index (caption ASC);