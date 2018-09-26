<?php

namespace MediaWiki\Extension\LDAPGroups;

class GroupSyncProcess {

	/**
	 *
	 * @var \User
	 */
	protected $user = null;

	/**
	 *
	 * @var \Config
	 */
	protected $config = null;

	/**
	 *
	 * @var \Status
	 */
	protected $status = null;

	/**
	 *
	 * @param \User $user
	 * @param \Config $confit
	 */
	public function __construct( $user, $config ) {
		$this->user = $user;
		$this->config = $config;
	}

	/**
	 * @return \Status
	 */
	public function run() {
		$this->status = \Status::newGood();
		try {
			$this->prepareRequest();
			$this->executeRequest();
			$this->initializeSyncMechanism();
			$this->syncGroups();
		} catch ( \Exception $ex ) {
			$this->status = \Status::newFatal( $ex->getMessage() );
		}

		return $this->status;
	}

	private function prepareRequest() {

	}

	private function executeRequest() {

	}

	private function initializeSyncMechanism() {

	}

	private function syncGroups() {

	}

}