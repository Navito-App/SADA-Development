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
// Page 6 about info.
$name = 'theme_zuum/page06info';
$heading = get_string('page06info', 'theme_zuum');
$information = get_string('page06infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 navbar title.
$name = 'theme_zuum/page06navbar';
$title = get_string('page06navbar', 'theme_zuum');
$description = get_string('page06navbardesc', 'theme_zuum');
$default = "Contact";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 header.
$name = 'theme_zuum/page06header';
$title = get_string('page06header', 'theme_zuum');
$description = get_string('page06headerdesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 Caption.
$name = 'theme_zuum/page06caption';
$title = get_string('page06caption', 'theme_zuum');
$description = get_string('page06captiondesc', 'theme_zuum');
$default = "Esse excepteur ad aliquip amet elit reprehenderit ut nostrud magna ex esse dolore magna excepteur.";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 img select.
$name = 'theme_zuum/page06img';
$title = get_string('page06img', 'theme_zuum');
$description = get_string('page06imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page06img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 1.
$page->add(new admin_setting_heading('page06section1', get_string('page06section1', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 6 section 1 enable or disable .
$name = 'theme_zuum/page06s1enabled';
$title = get_string('page06s1enabled', 'theme_zuum');
$description = get_string('page06s1enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 6 section 1 header.
$name = 'theme_zuum/page06s1header';
$title = get_string('page06s1header', 'theme_zuum');
$description = get_string('page06s1headerdesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 section 1 section 1Caption.
$name = 'theme_zuum/page06s1caption';
$title = get_string('page06s1caption', 'theme_zuum');
$description = get_string('page06s1captiondesc', 'theme_zuum');
$default = "Esse excepteur ad aliquip amet elit reprehenderit ut nostrud magna ex esse dolore magna excepteur.";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 section 1 phone.
$name = 'theme_zuum/page06s1phone';
$title = get_string('page06s1phone', 'theme_zuum');
$description = get_string('page06s1phonedesc', 'theme_zuum');
$default = "+012 (345) 789 99 <br>
+012 (345) 789 99";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 section 1 email.
$name = 'theme_zuum/page06s1email';
$title = get_string('page06s1email', 'theme_zuum');
$description = get_string('page06s1emaildesc', 'theme_zuum');
$default = "support@themesalmond.com <br>
shop@themesalmond.com";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 section 1 location.
$name = 'theme_zuum/page06s1location';
$title = get_string('page06s1location', 'theme_zuum');
$description = get_string('page06s1locationdesc', 'theme_zuum');
$default = "354 Oakridge, Camden NJ 08102<br>
08102 United States";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 6 section 1 map link.
$name = 'theme_zuum/page06s1maplink';
$title = get_string('page06s1maplink', 'theme_zuum');
$description = get_string('page06s1maplinkdesc', 'theme_zuum');
$default = "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d24466.900549295005!2d-75.13719104638898
!3d39.955645773786294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s354%20Oakridge%2C%20Camden%20NJ%2008102
!5e0!3m2!1sen!2str!4v1711808777454!5m2!1sen!2str";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '3');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 2 .
$page->add(new admin_setting_heading('page06section2', get_string('page06section2', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 6 section 2 enable or disable .
$name = 'theme_zuum/page06s2enabled';
$title = get_string('page06s2enabled', 'theme_zuum');
$description = get_string('page06s2enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 6 section 2 header.
$name = 'theme_zuum/page06s2header';
$title = get_string('page06s2header', 'theme_zuum');
$description = get_string('page06s2headerdesc', 'theme_zuum');
$default = "Have Any Questions Let’s Started Talk";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
