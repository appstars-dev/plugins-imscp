<?php
/**
 * i-MSCP - internet Multi Server Control Panel
 * Copyright (C) 2010-2014 by i-MSCP Team
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @category    iMSCP
 * @package     iMSCP_Plugin
 * @subpackage  RoundcubePlugins
 * @copyright   Rene Schuster <mail@reneschuster.de>
 * @copyright   Sascha Bay <info@space2place.de>
 * @author      Rene Schuster <mail@reneschuster.de>
 * @author      Sascha Bay <info@space2place.de>
 * @link        http://www.i-mscp.net i-MSCP Home Site
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GPL v2
 */

$sqlUserHost = iMSCP_Registry::get('config')->DATABASE_USER_HOST;
$roundcubeConfig = new iMSCP_Config_Handler_File(iMSCP_Registry::get('config')->CONF_DIR . '/roundcube/roundcube.data');

return array(
	'up' => "
		GRANT SELECT (`mail_addr`), UPDATE (`mail_pass`, `status`) ON `imscp`.`mail_users` TO '" . $roundcubeConfig['DATABASE_USER'] . "'@'" . $sqlUserHost . "';
	",
	'down' => "
		REVOKE ALL PRIVILEGES ON `mail_users` FROM '" . $roundcubeConfig['DATABASE_USER'] . "'@'" . $sqlUserHost . "';
	"
);
