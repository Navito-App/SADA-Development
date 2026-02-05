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
// Block 06 info.
$name = 'theme_zuum/block06info';
$heading = get_string('block06info', 'theme_zuum');
$information = get_string('block06infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 06 settings.
$name = 'theme_zuum/block06enabled';
$title = get_string('block06enabled', 'theme_zuum');
$description = get_string('block06enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 05 desing select.
$name = 'theme_zuum/block06desing';
$title = get_string('block06desing', 'theme_zuum');
$description = get_string('block06desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 06 background color.
$name = 'theme_zuum/block06color';
$title = get_string('block06color', 'theme_zuum');
$description = get_string('block06colordesc', 'theme_zuum');
$setting = new admin_setting_configcolourpicker($name, $title, $description, '');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 6 img select.
$name = 'theme_zuum/block06img';
$title = get_string('block06img', 'theme_zuum');
$description = get_string('block06imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 4];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block06img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 06 header text.
$name = 'theme_zuum/block06header';
$title = get_string('block06header', 'theme_zuum');
$description = get_string('block06headerdesc', 'theme_zuum');
$default = "Responsive features block with image";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 06 caption.
$name = 'theme_zuum/block06caption';
$title = get_string('block06caption', 'theme_zuum');
$description = get_string('block06captiondesc', 'theme_zuum');
$default = "Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
extensive prebuilt components, and powerful JavaScript plugins.";
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$page->add($setting);
// Block 06 button.
$name = 'theme_zuum/block06button';
$title = get_string('block06button', 'theme_zuum');
$description = get_string('block06buttondesc', 'theme_zuum');
$default = "Explore Courses";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 06 button link.
$name = 'theme_zuum/block06buttonlink';
$title = get_string('block06buttonlink', 'theme_zuum');
$description = get_string('block06buttonlinkdesc', 'theme_zuum');
$default = 'http://www.example.com/';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$page->add($setting);
