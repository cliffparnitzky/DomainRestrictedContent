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
 * Table tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('DomainRestrictedContentDcaHelper', 'extendArticlePalettes');

/**
 * Add fields to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['restrictionDomains'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['restrictionDomains'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('DomainRestrictedContentDcaHelper', 'getActiveRestrictionDomains'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>''),
	'sql'                     => "blob NULL"
);

?>