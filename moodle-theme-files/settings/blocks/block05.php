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
// Block 5 info.
$name = 'theme_zuum/block05info';
$heading = get_string('block05info', 'theme_zuum');
$information = get_string('block05infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 5 settings.
$name = 'theme_zuum/block05enabled';
$title = get_string('block05enabled', 'theme_zuum');
$description = get_string('block05enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 5 desing select.
$name = 'theme_zuum/block05desing';
$title = get_string('block05desing', 'theme_zuum');
$description = get_string('block05desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i < 2; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 05 background color.
$name = 'theme_zuum/block05color';
$title = get_string('block05color', 'theme_zuum');
$description = get_string('block05colordesc', 'theme_zuum');
$setting = new admin_setting_configcolourpicker($name, $title, $description, '');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 5 img select.
$name = 'theme_zuum/block05img';
$title = get_string('block05img', 'theme_zuum');
$description = get_string('block05imgdesc', 'theme_zuum');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block05img');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 5 header text.
$name = 'theme_zuum/block05header';
$title = get_string('block05header', 'theme_zuum');
$description = get_string('block05headerdesc', 'theme_zuum');
$default = "Supporting Student Learning in Your Course";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 100);
$page->add($setting);
// Block 05 comment .
$name = 'theme_zuum/block05comment';
$title = get_string('block05comment', 'theme_zuum');
$description = get_string('block05commentdesc', 'theme_zuum');
$default = "Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet sagittis id consectetur.
Sit amet porttitor eget dolor morbi";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 05 button.
$name = 'theme_zuum/block05button';
$title = get_string('block05button', 'theme_zuum');
$description = get_string('block05buttondesc', 'theme_zuum');
$default = "Explore Courses";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 05 button link.
$name = 'theme_zuum/block05buttonlink';
$title = get_string('block05buttonlink', 'theme_zuum');
$description = get_string('block05buttonlinkdesc', 'theme_zuum');
$default = 'course/index.php';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$page->add($setting);
// Block 05 icon .
$name = 'theme_zuum/block05icon';
$title = get_string('block05icon', 'theme_zuum');
$description = get_string('block05icondesc', 'theme_zuum');
$default = "fs-6 fa fa-square, fs-6 fa fa-square ,fs-6 fa fa-square";
$description = $description.get_string('underline', 'theme_zuum');
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 60);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Block 05 general settings END.
// ------------------------------------------------------------------------------------.
for ($i = 1; $i <= 3; $i++) {
    // Block 05 title.
    $name = 'theme_zuum/block05title'.$i;
    $title = get_string('block05title', 'theme_zuum', ['block' => $i]);
    $description = get_string('block05titledesc', 'theme_zuum');
    $default = 'Awesome Design '.$i;
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);
    // Block 05 caption.
    $name = 'theme_zuum/block05caption'.$i;
    $title = get_string('block05caption', 'theme_zuum', ['block' => $i]);
    $description = get_string('block05captiondesc', 'theme_zuum');
    $default = '';
    if ( $i == 1 ) {
        $default = 'Learn in-demand skills with over 183,000 video courses';
    } else if ( $i == 2 ) {
        $default = 'Choose courses taught by real-world experts';
    } else {
        $default = 'Learn at your own pace, with lifetime access on mobile and desktop';
    }
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
    $page->add($setting);
    // Block 05 link .
    $name = 'theme_zuum/block05link'.$i;
    $title = get_string('block05link', 'theme_zuum', ['block' => $i]);
    $description = get_string('block05linkdesc', 'theme_zuum');
    $description = $description.get_string('underline', 'theme_zuum');
    $default = "https://moodle.org/";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $page->add($setting);
}
