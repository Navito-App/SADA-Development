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
 * Theme zuum settings.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_zuum_frontpage', get_string('frontpagezuum', 'theme_zuum'));
// Frontpage choice.
$page->add(new admin_setting_heading('theme_zuum_frontpagehead', get_string('frontpageheading', 'theme_zuum'),
format_text(get_string('frontpagedesc', 'theme_zuum'), FORMAT_MARKDOWN)));
// Frontpage desing select.
$name = 'theme_zuum/frontpagechoice';
$title = get_string('frontpagechoice', 'theme_zuum');
$description = get_string('frontpagechoicedesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Frontpage back color.
$name = 'theme_zuum/fpbackcolor';
$title = get_string('fpbackcolor', 'theme_zuum');
$description = get_string('fpbackcolordesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Frontpage heading select.
$page->add(new admin_setting_heading('theme_zuum_frontpagenav', get_string('frontpagenav', 'theme_zuum'),
format_text(get_string('frontpagenavdesc', 'theme_zuum'), FORMAT_MARKDOWN)));
$name = 'theme_zuum/frontpagenavchoice';
$title = get_string('frontpagenavchoice', 'theme_zuum');
$description = get_string('frontpagenavchoicedesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 2; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Frontpage header logo select.
$name = 'theme_zuum/headerlogo';
$title = get_string('headerlogo', 'theme_zuum');
$description = get_string('headerlogodesc', 'theme_zuum');
$default = "Logo";
$options = [
    'None' => 'None',
    'Logo' => 'Logo',
    'Compact logo' => 'Compact logo',
];
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Navbar back color.
$name = 'theme_zuum/navbarbackcolor';
$title = get_string('navbarbackcolor', 'theme_zuum');
$description = get_string('navbarbackcolor_desc', 'theme_zuum');
$default = "#FEFED6";
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Navbar link color.
$name = 'theme_zuum/navbarlinkcolor';
$title = get_string('navbarlinkcolor', 'theme_zuum');
$description = get_string('navbarlinkcolor_desc', 'theme_zuum');
$default = "#010B46";
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Navbar link hover color.
$name = 'theme_zuum/navbarlinkhovercolor';
$title = get_string('navbarlinkhovercolor', 'theme_zuum');
$description = get_string('navbarlinkhovercolor_desc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = "#0F73FA";
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Frontpage nav link area.
$name = 'theme_zuum/frontpagenavlink';
$title = get_string('frontpagenavlink', 'theme_zuum');
$description = get_string('frontpagenavlinkdesc', 'theme_zuum');
$default = "Home|?
Courses||english|en
-All courses|course/|english|en
-Course search|course/search.php|english|en
Kurse||German|de
-Alle Kurse|course/|deutsch|de
-Kurssuche|course/search.php|deutsch|de
Cours||French|fr
-Tous les cours|course/|françe|fr
-Recherche de cours|course/search.php|farnçe|fr
Cursos||spanish|es
-Todos los cursos|course/|spanish|es
-Preguntas más frecuentes|https://example.org/pmf|only appears in spanish|es|_self
Pages
-About|?zuumpage=1
-Courses|?zuumpage=2
-Instructors|?zuumpage=4
-Contact|?zuumpage=6
Documentation|https://themesalmond.com/documents|english|en|_blank
Documentation|https://themesalmond.com/documents|francais|fr|_blank
Dokumentation|https://themesalmond.com/documents|deutsch|de|_blank
Documentación|https://themesalmond.com/documents|español|es|_blank
توثيق|https://themesalmond.com/documents|arabic|ar";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '6');
$page->add($setting);
// Select the blocks to be displayed on the Front Page.
$page->add(new admin_setting_heading('theme_zuum_frontpage1', get_string('frontpageheading1', 'theme_zuum'),
format_text(get_string('frontpageheadingdesc1', 'theme_zuum'), FORMAT_MARKDOWN)));

$name = 'theme_zuum/frontpagesection1_1';
$title = get_string('frontpagesection1_1', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_1', 'theme_zuum');
$default = '2';
// Used in all combo boxes!.
$options = theme_zuum_section();
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_2';
$title = get_string('frontpagesection1_2', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_2', 'theme_zuum');
$default = '6';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_3';
$title = get_string('frontpagesection1_3', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_3', 'theme_zuum');
$default = '9';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_4';
$title = get_string('frontpagesection1_4', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_4', 'theme_zuum');
$default = '7';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_5';
$title = get_string('frontpagesection1_5', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_5', 'theme_zuum');
$default = '5';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_6';
$title = get_string('frontpagesection1_6', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_6', 'theme_zuum');
$default = '19';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_7';
$title = get_string('frontpagesection1_7', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_7', 'theme_zuum');
$default = '10';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_8';
$title = get_string('frontpagesection1_8', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_8', 'theme_zuum');
$default = '8';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_9';
$title = get_string('frontpagesection1_9', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_9', 'theme_zuum');
$default = '3';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_zuum/frontpagesection1_10';
$title = get_string('frontpagesection1_10', 'theme_zuum');
$description = get_string('frontpagesectiondesc1_10', 'theme_zuum');
$default = '11';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
$page->add(new admin_setting_heading('theme_zuum_frontpageend', get_string('frontpageend', 'theme_zuum'),
format_text(get_string('frontpageenddesc', 'theme_zuum'), FORMAT_MARKDOWN)));
$settings->add($page);
