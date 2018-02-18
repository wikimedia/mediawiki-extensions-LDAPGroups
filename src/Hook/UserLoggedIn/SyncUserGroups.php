<?php

namespace MediaWiki\Extension\LDAPGroups\Hook\UserLoggedIn;

use MediaWiki\Extension\LDAPGroups\Config;

class SyncUserGroups extends \MediaWiki\Extension\LDAPProvider\Hook\UserLoggedIn {

	/**
	 * This is called by parent::process(). We use the connection
	 * established by the parent class that is specific to the domain
	 * for this user.
	 */
	protected function doProcess() {
		$groupList = $this->ldapClient->getUserGroups( $this->user->getName() );
		// TODO: sync them according to the current configuration
	}

	protected function getDomainConfigSection() {
		return Config::DOMAINCONFIG_SECTION;
	}
}