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
// Block 19 info.
$name = 'theme_zuum/block19info';
$heading = get_string('block19info', 'theme_zuum');
$information = get_string('block19infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 19 settings.
$name = 'theme_zuum/block19enabled';
$title = get_string('block19enabled', 'theme_zuum');
$description = get_string('block19enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 19 desing select.
$name = 'theme_zuum/block19desing';
$title = get_string('block19desing', 'theme_zuum');
$description = get_string('block19desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 19 settings, show as slide .
$name = 'theme_zuum/block19slide';
$title = get_string('block19slide', 'theme_zuum');
$description = get_string('block19slidedesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
// Enable or disable block 19 header settings.
$name = 'theme_zuum/block19headerenabled';
$title = get_string('block19headerenabled', 'theme_zuum');
$description = get_string('block19headerenableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 19 header.
$name = 'theme_zuum/block19header';
$title = get_string('block19header', 'theme_zuum');
$description = get_string('block19headerdesc', 'theme_zuum');
$default = 'Brands';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 19 caption.
$name = 'theme_zuum/block19caption';
$title = get_string('block19caption', 'theme_zuum');
$description = get_string('block19captiondesc', 'theme_zuum');
$default = 'Trusted By Leading Universities & Companies';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$page->add($setting);
// Block 19 img select.
$name = 'theme_zuum/block19img';
$title = get_string('block19img', 'theme_zuum');
$description = get_string('block19imgdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 30];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block19img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 19 link.
$name = 'theme_zuum/block19link';
$title = get_string('block19link', 'theme_zuum');
$description = get_string('block19linkdesc', 'theme_zuum');
$default = 'https://themesalmond.com, https://themesalmond.com, https://themesalmond.com, https://themesalmond.com';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '3');
$page->add($setting);
