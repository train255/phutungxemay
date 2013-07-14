<?php
/**===========================================================================================
# mod_ot_minitabs        OT Mini Tabs module for Joomla 1.7
#=============================================================================================
# author                OmegaTheme.com
# copyright             Copyright (C) 2011 OmegaTheme.com. All rights reserved.
# @license              http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website               http://omegatheme.com
# Technical support     Forum - http://omegatheme.com/forum/
#=============================================================================================*/

/**------------------------------------------------------------------------
* file:           mod_ot_minitabs.php 1.7.0 00001, Mar 2011 12:00:00Z OmegaTheme:Linh $
* package:        OT Mini Tabs module
* description:    main module file
*------------------------------------------------------------------------*/

defined('_JEXEC') or die ('Restricteted access');

JHTML::_('behavior.framework', true);
$doc = &Jfactory::getDocument();
$doc->addStyleSheet(JURI::root().'modules/mod_ot_minitabs/css/mod_ot_minitabs.css');

require_once (dirname(__FILE__).DS.'helper.php');
$list_of_tabs = modOtMiniTabsHelper::getTabsSelection($params);

require JModuleHelper::getLayoutPath('mod_ot_minitabs', $params->get('layout', 'default'));
?>
