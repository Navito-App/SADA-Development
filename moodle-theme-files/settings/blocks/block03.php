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
// Block 03 info.
$name = 'theme_zuum/block03info';
$heading = get_string('block03info', 'theme_zuum');
$information = get_string('block03infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 03 settings.
$name = 'theme_zuum/block03enabled';
$title = get_string('block03enabled', 'theme_zuum');
$description = get_string('block03enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);

// Block 3 desing select.
$name = 'theme_zuum/block03desing';
$title = get_string('block03desing', 'theme_zuum');
$description = get_string('block03desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 03 header.
$name = 'theme_zuum/block03header';
$title = get_string('block03header', 'theme_zuum');
$description = get_string('block03headerdesc', 'theme_zuum');
$default = 'Features';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 03 explanation.
$name = 'theme_zuum/block03explanation';
$title = get_string('block03explanation', 'theme_zuum');
$description = get_string('block03explanationdesc', 'theme_zuum');
$default = 'What to Expect from a Almond Theme';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$page->add($setting);
// Block 03 icon list.
$name = 'theme_zuum/block03iconnew';
$title = get_string('block03iconnew', 'theme_zuum');
$description = get_string('block03icondescnew', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = 'fa-solid fa-book-open, fa-solid fa-person-chalkboard, fa-solid fa-user-graduate,
fa-solid fa-chalkboard-user, fa-solid fa-school, fa-solid fa-microscope';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Block 03 general settings END.
// ------------------------------------------------------------------------------------.
for ($i = 1; $i <= 6; $i++) {
     // Block 03 title.
     $name = 'theme_zuum/block03title'.$i;
     $title = get_string('block03title', 'theme_zuum', ['block' => $i]);
     $description = get_string('block03titledesc', 'theme_zuum');
     $default = 'Top Investment Advisors';
     $setting = new admin_setting_configtext($name, $title, $description, $default);
     $page->add($setting);
     // Block 03 caption.
     $name = 'theme_zuum/block03caption'.$i;
     $title = get_string('block03caption', 'theme_zuum', ['block' => $i]);
     $description = get_string('block03captiondesc', 'theme_zuum');
     $default = get_string('block03captiondefault', 'theme_zuum');
     $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
     $page->add($setting);
     // Block 03 link.
     $name = 'theme_zuum/block03link'.$i;
     $title = get_string('block03link', 'theme_zuum', ['block' => $i]);
     $description = get_string('block03linkdesc', 'theme_zuum');
     $description = $description.get_string('underline', 'theme_zuum');
     $default = get_string('buttonlink', 'theme_zuum');
     $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
     $page->add($setting);
}
