<?php

namespace MediaWiki\Extension\LDAPGroups;

class Setup {
	public static function onRegistration() {
		die( \MediaWiki\MediaWikiServices::getInstance()->getConfigFactory()->get( Config::GROUP_MAP_FILE ) );
	}
}
