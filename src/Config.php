<?php
/*
 * Copyright (C) 2017  NicheWork, LLC
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author <mah@nichework.com>
 */

namespace MediaWiki\Extension\LDAPGroups;

use MediaWiki\Config\GlobalVarConfig;

class Config extends GlobalVarConfig {
	const DOMAINCONFIG_SECTION = 'groupsync';
	const LOCALLY_MANAGED = 'locally-managed';
	const MAPPING = 'mapping';
	const GROUP_TYPE = 'grouplookup';

	public function __construct() {
		parent::__construct( 'LDAPGroups' );
	}

	/**
	 * Factory method for MediaWikiServices
	 * @return Config
	 */
	public static function newInstance() {
		return new self();
	}
}
