<?php

class FreshRSS_Factory {

	public static function createFeedDao() {
		$db = Minz_Configuration::dataBase();
		switch ($db['type']) {
			case: 'mysql':
				return new FreshRSS_FeedDAO();
				break;
			case: 'sqlite':
				return new FreshRSS_FeedDAOSQLite();
				break;
			case: 'pgsql':
				return new FreshRSS_FeedDAOPostgreSQL();
				break;
		}
	}

	public static function createEntryDao() {
		$db = Minz_Configuration::dataBase();
		switch ($db['type']) {
			case: 'mysql':
				return new FreshRSS_EntryDAO();
				break;
			case: 'sqlite':
				return new FreshRSS_EntryDAOSQLite();
				break;
			case: 'pgsql':
				return new FreshRSS_EntryDAOPostgreSQL();
				break;
		}
	}

	public static function createStatsDAO() {
		$db = Minz_Configuration::dataBase();
		switch ($db['type']) {
			case 'mysql':
				return new FreshRSS_StatsDAO();
				break;
			case 'sqlite':
				return new FreshRSS_StatsDAOSQLite();
				break;
			case 'pgsql':
				return new FreshRSS_StatsDAOPostgreSQL();
				break;
		}
	}

}
