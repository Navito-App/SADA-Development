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
GLOBAL  $DB;
// Block 09 info.
$name = 'theme_zuum/block09info';
$heading = get_string('block09info', 'theme_zuum');
$information = get_string('block09infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 09 settings.
$name = 'theme_zuum/block09enabled';
$title = get_string('block09enabled', 'theme_zuum');
$description = get_string('block09enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 09 desing select.
$name = 'theme_zuum/block09desing';
$title = get_string('block09desing', 'theme_zuum');
$description = get_string('block09desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 09 settings, show as slide .
$name = 'theme_zuum/block09slide';
$title = get_string('block09slide', 'theme_zuum');
$description = get_string('block09slidedesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
// Block 09 background color or picture select.
$name = 'theme_zuum/block09background';
$title = get_string('block09background', 'theme_zuum');
$description = get_string('block09backgrounddesc', 'theme_zuum');
$default = "0";
$options = [
     '0' => 'none',
     '1' => 'color',
     '2' => 'picture',
];
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 09 count .
$name = 'theme_zuum/block09count';
$title = get_string('block09count', 'theme_zuum');
$description = get_string('block09countdesc', 'theme_zuum');
$default = "8";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, '1');
$page->add($setting);
// Block 09 header text.
$name = 'theme_zuum/block09header';
$title = get_string('block09header', 'theme_zuum');
$description = get_string('block09headerdesc', 'theme_zuum');
$default = "Our Course Categories";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 09 caption text.
$name = 'theme_zuum/block09caption';
$title = get_string('block09caption', 'theme_zuum');
$description = get_string('block09captiondesc', 'theme_zuum');
$default = "Explore top subjects 1200+ Course";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');;
$page->add($setting);
// Block 09 select show category.
$name = 'theme_zuum/block09ctselect';
$title = get_string('block09ctselect', 'theme_zuum');
$description = get_string('block09ctselectdesc', 'theme_zuum');
$default = [];
$options = theme_zuum_all_category();
$setting = new admin_setting_configmultiselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 09 icon list.
$name = 'theme_zuum/block09icon';
$title = get_string('block09icon', 'theme_zuum');
$description = get_string('block09icondesc', 'theme_zuum');
$default = get_string('block09icondefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
