<?php

namespace MediaWiki\Extension\LDAPGroups\Hook\UserLoggedIn;

use MediaWiki\Extension\LDAPGroups\Config;

class SyncUserGroups extends \MediaWiki\Extension\LDAPProvider\Hook\UserLoggedIn {

	protected function doProcess() {
		$groupList = $this->ldapClient->getUserGroups( $this->user->getName() );
		//TODO: sync themaccording to the current configuration
		return true;
	}

	protected function getDomainConfigSection() {
		return Config::DOMAINCONFIG_SECTION;
	}
}