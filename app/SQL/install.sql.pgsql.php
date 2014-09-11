<?php
define('SQL_CREATE_TABLES', '');
define('SQL_CREATE_TABLE_CATEGORY','
	CREATE TABLE "%1$scategory" (
		"id" SERIAL NOT NULL PRIMARY KEY,	-- v0.7
		"name" VARCHAR(255) NOT NULL UNIQUE
	);
');

define('SQL_CREATE_TABLE_FEED','
	CREATE TABLE "%1$sfeed" (
		"id" SERIAL NOT NULL PRIMARY KEY,	-- v0.7
		"url" varchar(511) NOT NULL UNIQUE,
		"category" SMALLINT DEFAULT 0 REFERENCES "%1$scategory" ("id"),	-- v0.7
		"name" VARCHAR(255) NOT NULL,
		"website" VARCHAR(255),
		"description" TEXT,
		"lastUpdate" BIGINT DEFAULT 0,
		"priority" SMALLINT NOT NULL DEFAULT 10,
		"pathEntries" VARCHAR(511) DEFAULT NULL,
		"httpAuth" VARCHAR(511) DEFAULT NULL,
		"error" BOOLEAN DEFAULT FALSE,
		"keep_history" INTEGER NOT NULL DEFAULT -2,	-- v0.7
		"ttl" INTEGER NOT NULL DEFAULT -2,	-- v0.7.3
		"cache_nbEntries" INTEGER DEFAULT 0,	-- v0.7
		"cache_nbUnreads" INTEGER DEFAULT 0	-- v0.7
	);
');

define('SQL_CREATE_TABLE_ENTRY','
	CREATE TABLE "%1$sentry" (
		"id" BIGINT NOT NULL PRIMARY KEY,	-- v0.7
		"guid" VARCHAR(760) NOT NULL UNIQUE,	-- Maximum for UNIQUE is 767B
		"title" VARCHAR(255) NOT NULL,
		"author" VARCHAR(255),
		"content_bin" BYTEA,	-- v0.7
		"link" VARCHAR(1023) NOT NULL,
		"date" BIGINT,
		"is_read" BOOLEAN NOT NULL DEFAULT FALSE,
		"is_favorite" BOOLEAN NOT NULL DEFAULT FALSE,
		"id_feed" SMALLINT UNIQUE REFERENCES "%1$sfeed" ("id"),	-- v0.7
		"tags" VARCHAR(1023)
	);
');

define('SQL_INSERT_DEFAULT_CATEGORY','
	INSERT INTO "%1$scategory" ("id", "name") VALUES (1, "%2$s");
');

define('SQL_DROP_TABLES', '
	DROP TABLE %1$sentry;
	DROP TABLE %1$sfeed;
	DROP TABLE %1$scategory;
');

define('SQL_SHOW_TABLES', '');
