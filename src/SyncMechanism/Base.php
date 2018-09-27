<?php

namespace MediaWiki\Extension\LDAPGroups\SyncMechanism;

use MediaWiki\Extension\LDAPGroups\ISyncMechanism;

abstract class Base implements ISyncMechanism {
	public static function factory() {
		return new static();
	}
}