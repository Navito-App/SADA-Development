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
// Page courses info.
$name = 'theme_zuum/page03info';
$heading = get_string('page03info', 'theme_zuum');
$information = get_string('page03infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 navbar title.
$name = 'theme_zuum/page03navbar';
$title = get_string('page03navbar', 'theme_zuum');
$description = get_string('page03navbardesc', 'theme_zuum');
$default = "COURSE DETAILS";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 header.
$name = 'theme_zuum/page03header';
$title = get_string('page03header', 'theme_zuum');
$description = get_string('page03headerdesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 Caption.
$name = 'theme_zuum/page03caption';
$title = get_string('page03caption', 'theme_zuum');
$description = get_string('page03captiondesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 Course detail page enroll button.
$name = 'theme_zuum/page03enrollbutton';
$title = get_string('page03enrollbutton', 'theme_zuum');
$description = get_string('page03enrollbuttondesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 Course detail page enroll button link.
$name = 'theme_zuum/page03enrollbuttonlink';
$title = get_string('page03enrollbuttonlink', 'theme_zuum');
$description = get_string('page03enrollbuttondesc', 'theme_zuum');
$default = '?zuumpage=2';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Page 3 img select.
$name = 'theme_zuum/page03img';
$title = get_string('page03img', 'theme_zuum');
$description = get_string('page03imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page03img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 teacher role.
$name = 'theme_zuum/page03teacherrole';
$title = get_string('page03teacherrole', 'theme_zuum');
$description = get_string('page03teacherroledesc', 'theme_zuum');
$default = '';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
    $options[$roles->id] = $roles->shortname;
    if ($roles->shortname == 'editingteacher') {
        $default = $roles->id;
    }
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 3 enroll role.
$name = 'theme_zuum/page03enrollrole';
$title = get_string('page03enrollrole', 'theme_zuum');
$description = get_string('page03enrollroledesc', 'theme_zuum');
$default = '';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
    $options[$roles->id] = $roles->shortname;
    if ($roles->shortname == 'student') {
        $default = $roles->id;
    }
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
