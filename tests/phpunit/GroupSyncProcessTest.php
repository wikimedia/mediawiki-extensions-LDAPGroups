<?php

namespace MediaWiki\Extension\LDAPGroups\Tests;

use MediaWiki\Config\HashConfig;
use MediaWiki\Extension\LDAPGroups\GroupSyncProcess;
use MediaWiki\User\User;
use MediaWikiIntegrationTestCase;

class GroupSyncProcessTest extends MediaWikiIntegrationTestCase {

	/**
	 * @covers MediaWiki\Extension\LDAPGroups\GroupSyncProcess::__construct
	 */
	public function testInstance() {
		$user = $this->createMock( User::class );
		$domainConfig = new HashConfig( [] );
		$builder = $this->getMockBuilder( \MediaWiki\Extension\LDAPProvider\Client::class );
		$builder->disableOriginalConstructor();
		$client = $builder->getMock();
		$callbackRegistry = [];

		$groupSyncProcess = new GroupSyncProcess(
			$user,
			$domainConfig,
			$client,
			$callbackRegistry
		);

		$this->assertInstanceOf(
			\MediaWiki\Extension\LDAPGroups\GroupSyncProcess::class,
			$groupSyncProcess
		);
	}
}
