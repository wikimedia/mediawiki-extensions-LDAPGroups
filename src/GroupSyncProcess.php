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
	 * @var \MediaWiki\Extension\LDAPProvider\Client
	 */
	protected $client = null;

	/**
	 *
	 * @var \Status
	 */
	protected $status = null;

	/**
	 *
	 * @param \User $user
	 * @param \Config $config
	 * @param \MediaWiki\Extension\LDAPProvider\Client $client
	 */
	public function __construct( $user, $config, $client ) {
		$this->user = $user;
		$this->config = $config;
		$this->client = $client;
	}

	/**
	 * @return \Status
	 */
	public function run() {
		$this->status = \Status::newGood();
		try {
			$this->prepareRequest();

			if( $this->status->isGood() ) {
				$this->executeRequest();
			}
			if( $this->status->isGood() ) {
				$this->initializeSyncMechanism();
			}
			if( $this->status->isGood() ) {
				$this->syncGroups();
			}
		} catch ( \Exception $ex ) {
			$this->status = \Status::newFatal( $ex->getMessage() );
		}

		return $this->status;
	}

	/**
	 *
	 * @var type 
	 */
	private $groupRequest = null;

	private function prepareRequest() {
		$this->groupRequest = $
	}

	private function executeRequest() {

	}

	private function initializeSyncMechanism() {

	}

	private function syncGroups() {

	}

}