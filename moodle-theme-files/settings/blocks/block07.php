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
 * @copyright 2022 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// Block 07 info.
$name = 'theme_zuum/block07info';
$heading = get_string('block07info', 'theme_zuum');
$information = get_string('block07infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 07 settings.
$name = 'theme_zuum/block07enabled';
$title = get_string('block07enabled', 'theme_zuum');
$description = get_string('block07enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 07 desing select.
$name = 'theme_zuum/block07desing';
$title = get_string('block07desing', 'theme_zuum');
$description = get_string('block07desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 2; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 07 settings, show as slide .
$name = 'theme_zuum/block07slide';
$title = get_string('block07slide', 'theme_zuum');
$description = get_string('block07slidedesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
// Block 07 course image show-hide.
$name = 'theme_zuum/block07imgenabled';
$title = get_string('block07imgenabled', 'theme_zuum');
$description = get_string('block07imgenableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 07 count text.
$name = 'theme_zuum/block07count';
$title = get_string('block07count', 'theme_zuum');
$description = get_string('block07countdesc', 'theme_zuum');
$default = get_string('block07countdefault', 'theme_zuum');
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, '2');
$page->add($setting);
// Block 07 select show course.
$name = 'theme_zuum/block07crselect';
$title = get_string('block07crselect', 'theme_zuum');
$description = get_string('block07crselectdesc', 'theme_zuum');
$default = [];
$options = theme_zuum_all_course();
$setting = new admin_setting_configmultiselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 07 teacher role.
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
     $options[$roles->id] = $roles->shortname;
}
$name = 'theme_zuum/block07teacherrole';
$title = get_string('block07teacherrole', 'theme_zuum');
$description = get_string('block07teacherroledesc', 'theme_zuum');
$default = '3';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 07 student role.
$name = 'theme_zuum/block07studentrole';
$title = get_string('block07studentrole', 'theme_zuum');
$description = get_string('block07studentroledesc', 'theme_zuum');
$default = '5';
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Teacher enabled/disabled .
$name = 'theme_zuum/block07teacherenabled';
$title = get_string('block07teacherenabled', 'theme_zuum');
$description = get_string('block07teacherenableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Show price .
$name = 'theme_zuum/block07priceshow';
$title = get_string('block07priceshow', 'theme_zuum');
$description = get_string('block07priceshowdesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
// Block 07 tile select.
$name = 'theme_zuum/block07title';
$title = get_string('block07title', 'theme_zuum');
$description = get_string('block07titledesc', 'theme_zuum');
$default = "shortname";
$options = [
'shortname' => 'shortname',
'fullname' => 'fullname',
];
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 07 header text.
$name = 'theme_zuum/block07header';
$title = get_string('block07header', 'theme_zuum');
$description = get_string('block07headerdesc', 'theme_zuum');
$default = get_string('block07headerdefault', 'theme_zuum');
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 07 caption.
$name = 'theme_zuum/block07caption';
$title = get_string('block07caption', 'theme_zuum');
$description = get_string('block07captiondesc', 'theme_zuum');
$default = get_string('block07captiondefault', 'theme_zuum');
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$page->add($setting);
// Block 07 button.
$name = 'theme_zuum/block07button';
$title = get_string('block07button', 'theme_zuum');
$description = get_string('block07buttondesc', 'theme_zuum');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 07 button link.
$name = 'theme_zuum/block07buttonlink';
$title = get_string('block07buttonlink', 'theme_zuum');
$description = get_string('block07buttonlinkdesc', 'theme_zuum');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$page->add($setting);
