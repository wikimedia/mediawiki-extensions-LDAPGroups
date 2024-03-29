<?php

namespace MediaWiki\Extension\LDAPGroups\SyncMechanism;

use MediaWiki\Extension\LDAPGroups\Config;
use MediaWiki\User\UserGroupManager;

class AllGroups extends Base {

	/**
	 * See https://github.com/wikimedia/mediawiki-extensions-LdapAuthentication/blob/752c03c1b4807797b54d80e1fc6eddd1322afe2b/LdapAuthenticationPlugin.php#L1931
	 * @var string[]
	 */
	protected $implicitLocallyManagedGroups = [ 'bot', 'sysop', 'bureaucrat' ];

	/**
	 * Normalized to lower case
	 * @var string[]
	 */
	protected $localAvailableGroups = [];

	/**
	 * @param \Psr\Log\LoggerInterface $logger
	 * @param UserGroupManager $userGroupManager
	 * @param string[]|null $localAvailableGroups
	 */
	public function __construct( $logger, $userGroupManager, $localAvailableGroups = null ) {
		parent::__construct( $logger, $userGroupManager );
		if ( $localAvailableGroups === null ) {
			$localAvailableGroups = $userGroupManager->listAllGroups();
		}

		$this->localAvailableGroups = $localAvailableGroups;
	}

	/**
	 *
	 */
	protected function doSync() {
		$locallyManagedGroups = array_merge(
			$this->implicitLocallyManagedGroups,
			$this->config->get( Config::LOCALLY_MANAGED )
		);

		$currentGroups = array_map( 'strtolower', $this->userGroupManager->getUserGroups( $this->user ) );
		$ldapGroups = $this->groupList->getShortNames();

		$groupsToAdd = array_diff( $ldapGroups, $currentGroups );
		$groupsToRemove = array_diff( $currentGroups, $ldapGroups );

		foreach ( $this->localAvailableGroups as $localAvailableGroup ) {
			if ( in_array( $localAvailableGroup, $locallyManagedGroups ) ) {
				continue;
			}

			// `GroupList::getShortNames` are normalized to lower case
			$normLocalAvailGroup = strtolower( $localAvailableGroup );
			if ( in_array( $normLocalAvailGroup, $groupsToAdd ) ) {
				$this->addGroup( $localAvailableGroup );
			}
			if ( in_array( $normLocalAvailGroup, $groupsToRemove ) ) {
				$this->removeGroup( $localAvailableGroup );
			}
		}
	}
}
