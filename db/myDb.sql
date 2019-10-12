-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS devices_device_id_seq;

-- Table Definition
CREATE TABLE "public"."devices" (
    "device_id" int4 NOT NULL DEFAULT nextval('devices_device_id_seq'::regclass),
    "user_id" int4 NOT NULL,
    "floor_id" int4 NOT NULL,
    "device_description" varchar(255) NOT NULL,
    "device_notes" text,
    "device_address" text NOT NULL,
    "device_canFrame" bool NOT NULL,
    PRIMARY KEY ("device_id")
);

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS floors_floor_id_seq;

-- Table Definition
CREATE TABLE "public"."floors" (
    "floor_id" int4 NOT NULL DEFAULT nextval('floors_floor_id_seq'::regclass),
    "location_id" int4 NOT NULL,
    "floor_name" varchar(255) NOT NULL,
    "user_id" int4 NOT NULL,
    PRIMARY KEY ("floor_id")
);

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS locations_location_id_seq;

-- Table Definition
CREATE TABLE "public"."locations" (
    "location_id" int4 NOT NULL DEFAULT nextval('locations_location_id_seq'::regclass),
    "location_name" varchar(255) NOT NULL,
    "user_id" int4 NOT NULL,
    PRIMARY KEY ("location_id")
);

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS users_user_id_seq;

-- Table Definition
CREATE TABLE "public"."users" (
    "user_id" int4 NOT NULL DEFAULT nextval('users_user_id_seq'::regclass),
    "username" varchar(255) NOT NULL,
    "user_password" varchar(255) NOT NULL,
    "user_email" varchar(255) NOT NULL,
    "firstname" varchar(255) NOT NULL,
    "lastname" varchar(255) NOT NULL,
    "company" varchar(255),
    "created_on" timestamp NOT NULL,
    "last_login" timestamp,
    PRIMARY KEY ("user_id")
);

INSERT INTO "public"."devices" ("device_id", "user_id", "floor_id", "device_description", "device_notes", "device_address", "device_canFrame") VALUES ('1', '2', '1', 'Brother Printer', 'Network only', 'http://192.168.0.7', 't');

INSERT INTO "public"."floors" ("floor_id", "location_id", "floor_name", "user_id") VALUES ('1', '2', 'First', '2');

INSERT INTO "public"."locations" ("location_id", "location_name", "user_id") VALUES ('2', 'Home', '2');

INSERT INTO "public"."users" ("user_id", "username", "user_password", "user_email", "firstname", "lastname", "company", "created_on", "last_login") VALUES ('2', 'dmoster', 'newpass=1', 'test@example.com', 'Daniel', 'Moster', 'Mostermind', '2019-10-12 21:00:22.55197', NULL);


