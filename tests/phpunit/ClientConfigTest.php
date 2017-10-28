<?php

namespace MediaWiki\Extension\LDAPGroups\Tests;

use \MediaWiki\Extension\LDAPGroups\GroupConfig;

class ClientConfigTest extends \MediaWikiTestCase {

	public function testChangeConfigFile() {
		$config = new GroupConfig( __DIR__ . '/data/test.json' );

		$this->assertEquals( 'PHPUNIT_SERVER', $config->get( "groups" ) );
	}
}
