<?php

namespace MediaWiki\Extension\LDAPGroups;

interface ISyncMechanism {

	/**
	 * @param \User $user
	 * @return \Status
	 */
	public function sync( $user );
}