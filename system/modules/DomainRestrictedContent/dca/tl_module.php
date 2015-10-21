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
 * @package    VisJsTimeline
 * @license    LGPL
 */

/**
 * Add palettes to tl_module
 */
foreach ($GLOBALS['TL_DCA']['tl_module']['palettes'] as $key => $palette)
{
	if ($key == '__selector__')
	{
			continue;
	}
	$GLOBALS['TL_DCA']['tl_module']['palettes'][$key] = str_replace('{expert_legend:hide}', '{expert_legend:hide},restrictionDomains', $palette);
}

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['restrictionDomains'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['restrictionDomains'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('DomainRestrictedContentDcaHelper', 'getActiveRestrictionDomains'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>''),
	'sql'                     => "blob NULL"
);

?>