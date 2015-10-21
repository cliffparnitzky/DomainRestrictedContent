<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package DomainRestrictedContent
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'CliffParnitzky',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'CliffParnitzky\DomainRestrictedContentDcaHelper' => 'system/modules/DomainRestrictedContent/classes/DomainRestrictedContentDcaHelper.php',
	'CliffParnitzky\DomainRestrictedContentHooksImpl' => 'system/modules/DomainRestrictedContent/classes/DomainRestrictedContentHooksImpl.php',
));
