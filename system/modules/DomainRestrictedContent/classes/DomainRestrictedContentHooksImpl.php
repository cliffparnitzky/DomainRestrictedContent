<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    BackendCustomStartpage
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace CliffParnitzky;

/**
 * Class BackendCustomStartpageHook
 *
 * Special hook implementation for redirect to the custom startpage
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class DomainRestrictedContentHooksImpl
{
	/**
	 * Check wheather this article / content element / module should be visible on the current domain.
	 */
	public function isVisibleElement($objElement, $blnIsVisible)
	{
		$arrRestrictionDomains = deserialize($objElement->restrictionDomains, true);
		if ($blnIsVisible && !empty($arrRestrictionDomains))
		{
			$arrRestrictionDomains = array_intersect($arrRestrictionDomains, \DomainRestrictedContentDcaHelper::getActiveRestrictionDomains());
			if (!in_array(\Environment::get('host'), $arrRestrictionDomains))
			{
				$blnIsVisible = false;
			}
		}
		return $blnIsVisible;
	}
}
?>
