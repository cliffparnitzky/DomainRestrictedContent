<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2015-2015
 * @author     Cliff Parnitzky
 * @package    DomainRestrictedContent
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace CliffParnitzky;

/**
 * Class DomainRestrictedContentDcaHelper
 *
 * Special helper class for dca
 * @copyright  Cliff Parnitzky 2015-2015
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class DomainRestrictedContentDcaHelper
{
	/**
	 * Returns the current defined active domains used for restriction
	 */
	public static function getActiveRestrictionDomains()
	{
		$arrActiveRestrictionDomains = array();
		$arrRestrictionDomains = deserialize(\Config::get('restrictionDomains'), true);
		foreach ($arrRestrictionDomains as $domain)
		{
			if ($domain['active'])
			{
				$arrActiveRestrictionDomains[] = $domain['name'];
			}
		}
		return $arrActiveRestrictionDomains;
	}
	
	/**
	 * Remove http/https from domain name and other clean ups
	 */
	public static function cleanUpDomainName($value)
	{
		$value = preg_replace('@^https?://@', '', $value);
		$value = strtolower($value);
		$value = str_replace(',', '.', $value);
		return $value;
	}
}
?>
