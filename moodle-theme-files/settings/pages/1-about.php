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
 * @copyright 2022 ThemesAlmond
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// Page 1 about info.
$name = 'theme_zuum/page01info';
$heading = get_string('page01info', 'theme_zuum');
$information = get_string('page01infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 navbar title.
$name = 'theme_zuum/page01navbar';
$title = get_string('page01navbar', 'theme_zuum');
$description = get_string('page01navbardesc', 'theme_zuum');
$default = "ABOUT US";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 header.
$name = 'theme_zuum/page01header';
$title = get_string('page01header', 'theme_zuum');
$description = get_string('page01headerdesc', 'theme_zuum');
$default = "About Us";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 Caption.
$name = 'theme_zuum/page01caption';
$title = get_string('page01caption', 'theme_zuum');
$description = get_string('page01captiondesc', 'theme_zuum');
$default = "Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet sagittis
id consectetur. Sit amet porttitor eget dolor morbi";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 img select.
$name = 'theme_zuum/page01img';
$title = get_string('page01img', 'theme_zuum');
$description = get_string('page01imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page01img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 1.
$page->add(new admin_setting_heading('page01section1', get_string('page01section1', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 1 header.
$name = 'theme_zuum/page01s1header';
$title = get_string('page01s1header', 'theme_zuum');
$description = get_string('page01headerdesc', 'theme_zuum');
$default = "About Us";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 title.
$name = 'theme_zuum/page01s1title';
$title = get_string('page01s1title', 'theme_zuum');
$description = get_string('page01s1titledesc', 'theme_zuum');
$default = "We Are Always Ensure Best Course For Your Learning";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 Caption.
$name = 'theme_zuum/page01s1caption';
$title = get_string('page01s1caption', 'theme_zuum');
$description = get_string('page01s1captiondesc', 'theme_zuum');
$default = "Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet
sagittis id consectetur. Sit amet porttitor eget dolor morbi";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 img select.
$name = 'theme_zuum/page01s1img';
$title = get_string('page01s1img', 'theme_zuum');
$description = get_string('page01s1imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'page01s1img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 subtitle 1.
$name = 'theme_zuum/page01s1subtitle1';
$title = get_string('page01s1subtitle1', 'theme_zuum');
$description = get_string('page01s1subtitle1desc', 'theme_zuum');
$default = "Sharing a Screen";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 sub definition 1.
$name = 'theme_zuum/page01s1subdefinition1';
$title = get_string('page01s1subdefinition1', 'theme_zuum');
$description = get_string('page01s1subdefinition1desc', 'theme_zuum');
$default = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do tempor incididunt
ut labore et dolore magna aliqua.";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 subtitle 2.
$name = 'theme_zuum/page01s1subtitle2';
$title = get_string('page01s1subtitle2', 'theme_zuum');
$description = get_string('page01s1subtitle2desc', 'theme_zuum');
$default = "Sharing a Screen";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 sub definition 2.
$name = 'theme_zuum/page01s1subdefinition2';
$title = get_string('page01s1subdefinition2', 'theme_zuum');
$description = get_string('page01s1subdefinition2desc', 'theme_zuum');
$default = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do tempor incididunt
ut labore et dolore magna aliqua.";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 section 1 button.
$name = 'theme_zuum/page01s1button';
$title = get_string('page01s1button', 'theme_zuum');
$description = get_string('page01s1button', 'theme_zuum');
$default = "Read More";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 section 1 button link.
$name = 'theme_zuum/page01s1buttonlink';
$title = get_string('page01s1buttonlink', 'theme_zuum');
$description = get_string('page01s1buttonlinkdesc', 'theme_zuum');
$default = 'https://themesalmond.com';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// SECTION 2.
$page->add(new admin_setting_heading('page01section2', get_string('page01section2', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 1 headline.
$name = 'theme_zuum/page01s2headline';
$title = get_string('page01s2headline', 'theme_zuum');
$description = get_string('page01s2headlinedesc', 'theme_zuum');
$default = "Start Learning";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 title.
$name = 'theme_zuum/page01s2title';
$title = get_string('page01s2title', 'theme_zuum');
$description = get_string('page01s2titledesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = "Build Better skills, faster From Today.";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
for ($i = 1; $i <= 3; $i++) {
    // Page 1 subtitle 1.
    $name = 'theme_zuum/page01s2header'.$i;
    $title = get_string('page01s2header', 'theme_zuum', ['block' => $i]);
    $description = get_string('page01s2headerdesc', 'theme_zuum');
    $default = "Quality Education";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 1 sub definition 1.
    $name = 'theme_zuum/page01s2caption'.$i;
    $title = get_string('page01s2caption', 'theme_zuum', ['block' => $i]);
    $description = get_string('page01s2captiondesc', 'theme_zuum');
    $default = "Lorem ipsum dolor sit amet, consectetur notted adipisicing
    elit sed do eiusmod tempor incididunt ut labore.";
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 1 button.
    $name = 'theme_zuum/page01s2button'.$i;
    $title = get_string('page01s2button', 'theme_zuum', ['block' => $i]);
    $description = get_string('page01s2buttondesc', 'theme_zuum');
    $default = "Explore";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 1 button link.
    $name = 'theme_zuum/page01s2buttonlink'.$i;
    $title = get_string('page01s2buttonlink', 'theme_zuum', ['block' => $i]);
    $description = get_string('page01s2buttonlinkdesc', 'theme_zuum');
    $description = $description.get_string('underline', 'theme_zuum');
    $default = 'https://themesalmond.com';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
// SECTION 3 .
$page->add(new admin_setting_heading('page01section3', get_string('page01section3', 'theme_zuum'),
format_text( '', FORMAT_MARKDOWN)));
$page->add($setting);
// Page 1 teachers show total number of courses and students.
$name = 'theme_zuum/page01s3total';
$title = get_string('page01s3total', 'theme_zuum');
$description = get_string('page01s3totaldesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Page 1 teachers select show role.
$name = 'theme_zuum/page01s3showrole';
$title = get_string('page01s3showrole', 'theme_zuum');
$description = get_string('page01s3showroledesc', 'theme_zuum');
$default = '3';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
     $options[$roles->id] = $roles->shortname;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 teachers select student role.
$name = 'theme_zuum/page01s3studentrole';
$title = get_string('page01s3studentrole', 'theme_zuum');
$description = get_string('page01s3studentroledesc', 'theme_zuum');
$default = '5';
$options = [];
$role = $DB->get_records('role');
foreach ($role as $roles) {
     $options[$roles->id] = $roles->shortname;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Page 1 teachers ID text.
$name = 'theme_zuum/page01s3teacherid';
$title = get_string('page01s3teacherid', 'theme_zuum');
$description = get_string('page01s3teacheriddesc', 'theme_zuum');
$default = "";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Page 1 teachers header text.
$name = 'theme_zuum/page01s3header';
$title = get_string('page01s3header', 'theme_zuum');
$description = get_string('page01s3headerdesc', 'theme_zuum');
$default = "Team Member";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Page 1 teachers caption text.
$name = 'theme_zuum/page01s3caption';
$title = get_string('page01s3caption', 'theme_zuum');
$description = get_string('page01s3captiondesc', 'theme_zuum');
$default = "Our Expert Teachers";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');;
$page->add($setting);
