<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme zuum settings file.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// Block 17 info.
$name = 'theme_zuum/block17info';
$heading = get_string('block17info', 'theme_zuum');
$information = get_string('block17infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable settings.
$name = 'theme_zuum/block17enabled';
$title = get_string('block17enabled', 'theme_zuum');
$description = get_string('block17enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block title.
$name = 'theme_zuum/block17title';
$title = get_string('block17title', 'theme_zuum');
$description = get_string('block17titledesc', 'theme_zuum');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page caption.
$name = 'theme_zuum/block17caption';
$title = get_string('block17caption', 'theme_zuum');
$description = get_string('block17captiondesc', 'theme_zuum');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page css link.
$name = 'theme_zuum/block17csslink';
$title = get_string('block17csslink', 'theme_zuum');
$description = get_string('block17csslinkdesc', 'theme_zuum');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page css.
$name = 'theme_zuum/block17css';
$title = get_string('block17css', 'theme_zuum');
$description = get_string('block17cssdesc', 'theme_zuum');
$default = '';
$setting = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
