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
// Page 4 about info.
$name = 'theme_zuum/page04info';
$heading = get_string('page04info', 'theme_zuum');
$information = get_string('page04infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 navbar title.
$name = 'theme_zuum/page04navbar';
$title = get_string('page04navbar', 'theme_zuum');
$description = get_string('page04navbardesc', 'theme_zuum');
$default = "TEACHERS";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 header.
$name = 'theme_zuum/page04header';
$title = get_string('page04header', 'theme_zuum');
$description = get_string('page04headerdesc', 'theme_zuum');
$default = "Our Expert Teachers";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 Caption.
$name = 'theme_zuum/page04caption';
$title = get_string('page04caption', 'theme_zuum');
$description = get_string('page04captiondesc', 'theme_zuum');
$default = "Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet sagittis
id consectetur. Sit amet porttitor eget dolor morbi";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 img select.
$name = 'theme_zuum/page04img';
$title = get_string('page04img', 'theme_zuum');
$description = get_string('page04imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page04img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 1.
$page->add(new admin_setting_heading('page04section1', get_string('page04section1', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 4 section 1 enable or disable .
$name = 'theme_zuum/page04s1enabled';
$title = get_string('page04s1enabled', 'theme_zuum');
$description = get_string('page04s1enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 4 headline.
$name = 'theme_zuum/page04s1headline';
$title = get_string('page04s1headline', 'theme_zuum');
$description = get_string('page04s1headlinedesc', 'theme_zuum');
$default = "Start Learning";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 title.
$name = 'theme_zuum/page04s1title';
$title = get_string('page04s1title', 'theme_zuum');
$description = get_string('page04s1titledesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = "Build Better skills, faster From Today.";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
for ($i = 1; $i <= 3; $i++) {
    // Page 4 subtitle 1.
    $name = 'theme_zuum/page04s1header'.$i;
    $title = get_string('page04s1header', 'theme_zuum', ['block' => $i]);
    $description = get_string('page04s1headerdesc', 'theme_zuum');
    $default = "Quality Education";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 4 sub definition 1.
    $name = 'theme_zuum/page04s1caption'.$i;
    $title = get_string('page04s1caption', 'theme_zuum', ['block' => $i]);
    $description = get_string('page04s1captiondesc', 'theme_zuum');
    $default = "Lorem ipsum dolor sit amet, consectetur notted adipisicing
    elit sed do eiusmod tempor incididunt ut labore.";
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 4 button.
    $name = 'theme_zuum/page04s1button'.$i;
    $title = get_string('page04s1button', 'theme_zuum', ['block' => $i]);
    $description = get_string('page04s1buttondesc', 'theme_zuum');
    $default = "Explore";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 4 button link.
    $name = 'theme_zuum/page04s1buttonlink'.$i;
    $title = get_string('page04s1buttonlink', 'theme_zuum', ['block' => $i]);
    $description = get_string('page04s1buttonlinkdesc', 'theme_zuum');
    $description = $description.get_string('underline', 'theme_zuum');
    $default = 'https://themesalmond.com';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
// SECTION 2 .
$page->add(new admin_setting_heading('page04section2', get_string('page04section2', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 4 teacher count show.
$name = 'theme_zuum/page04count';
$title = get_string('page04count', 'theme_zuum');
$description = get_string('page04countdesc', 'theme_zuum');
$default = "12";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 teachers show total number of courses and students.
$name = 'theme_zuum/page04s2total';
$title = get_string('page04s2total', 'theme_zuum');
$description = get_string('page04s2totaldesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 4 teachers select show role.
$name = 'theme_zuum/page04s2showrole';
$title = get_string('page04s2showrole', 'theme_zuum');
$description = get_string('page04s2showroledesc', 'theme_zuum');
$default = '3';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
     $options[$roles->id] = $roles->shortname;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 teachers select student role.
$name = 'theme_zuum/page04s2studentrole';
$title = get_string('page04s2studentrole', 'theme_zuum');
$description = get_string('page04s2studentroledesc', 'theme_zuum');
$default = '5';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
     $options[$roles->id] = $roles->shortname;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 4 teachers header text.
$name = 'theme_zuum/page04s2header';
$title = get_string('page04s2header', 'theme_zuum');
$description = get_string('page04s2headerdesc', 'theme_zuum');
$default = "Team Member";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Page 4 teachers caption text.
$name = 'theme_zuum/page04s2caption';
$title = get_string('page04s2caption', 'theme_zuum');
$description = get_string('page04s2captiondesc', 'theme_zuum');
$default = "Our Expert Teachers";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');;
$page->add($setting);
// SECTION 3.
$page->add(new admin_setting_heading('page04section3', get_string('page04section3', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 4 section 3 enable or disable .
$name = 'theme_zuum/page04s3enabled';
$title = get_string('page04s3enabled', 'theme_zuum');
$description = get_string('page04s3enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
