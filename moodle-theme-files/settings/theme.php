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
// Theme settings.
$page = new admin_settingpage('theme_zuum_theme', get_string('themesettings', 'theme_zuum'));

// Theme font @import .
$name = 'theme_zuum/fontimport';
$title = get_string('fontimport', 'theme_zuum');
$description = get_string('fontimportdesc', 'theme_zuum');
$default = "@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap');";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Theme font family.
$name = 'theme_zuum/fontfamily';
$title = get_string('fontfamily', 'theme_zuum');
$description = get_string('fontfamilydesc', 'theme_zuum');
$default = "Barlow,sans-serif;";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 60);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Must add the page after definiting all the settings!
// Login page position select.
$name = 'theme_zuum/loginposition';
$title = get_string('loginposition', 'theme_zuum');
$description = get_string('loginpositiondesc', 'theme_zuum');
$default = "Center";
$options = [
    'Center' => 'Center',
    'Left' => 'Left',
    'Right' => 'Right',
];
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Dashboard footer select.
$name = 'theme_zuum/footerselect';
$title = get_string('footerselect', 'theme_zuum');
$description = get_string('footerselectdesc', 'theme_zuum');
$default = "1";
$options = [
    '1' => 'Moodle footer',
    '2' => 'Frontpage footer',
];
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);
