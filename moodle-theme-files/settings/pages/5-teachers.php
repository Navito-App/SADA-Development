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
 * Zuum page settings.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// Page 5 about info.
$name = 'theme_zuum/page05info';
$heading = get_string('page05info', 'theme_zuum');
$information = get_string('page05infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 5 navbar title.
$name = 'theme_zuum/page05navbar';
$title = get_string('page05navbar', 'theme_zuum');
$description = get_string('page05navbardesc', 'theme_zuum');
$default = "TEACHER DETAIL";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 5 header.
$name = 'theme_zuum/page05header';
$title = get_string('page05header', 'theme_zuum');
$description = get_string('page05headerdesc', 'theme_zuum');
$default = "Our Expert Teachers";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 5 Caption.
$name = 'theme_zuum/page05caption';
$title = get_string('page05caption', 'theme_zuum');
$description = get_string('page05captiondesc', 'theme_zuum');
$default = "Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet sagittis
id consectetur. Sit amet porttitor eget dolor morbi";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 5 img select.
$name = 'theme_zuum/page05img';
$title = get_string('page05img', 'theme_zuum');
$description = get_string('page05imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page05img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 1.
$page->add(new admin_setting_heading('page05section1', get_string('page05section1', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 5 section 1 enable or disable .
$name = 'theme_zuum/page05s1enabled';
$title = get_string('page05s1enabled', 'theme_zuum');
$description = get_string('page05s1enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// SECTION 2 .
$page->add(new admin_setting_heading('page05section2', get_string('page05section2', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 5 section 2 enable or disable .
$name = 'theme_zuum/page05s2enabled';
$title = get_string('page05s2enabled', 'theme_zuum');
$description = get_string('page05s2enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 5 part 2 phone number show.
$name = 'theme_zuum/page05s2phoneshow';
$title = get_string('page05s2phoneshow', 'theme_zuum');
$description = get_string('page05s2phoneshowdesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 5 part 2 e-mail show.
$name = 'theme_zuum/page05s2emailshow';
$title = get_string('page05s2emailshow', 'theme_zuum');
$description = get_string('page05s2emailshowdesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
