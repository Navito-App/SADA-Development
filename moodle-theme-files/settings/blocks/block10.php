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
// Block 10 info.
$name = 'theme_zuum/block10info';
$heading = get_string('block10info', 'theme_zuum');
$information = get_string('block10infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 10 settings.
$name = 'theme_zuum/block10enabled';
$title = get_string('block10enabled', 'theme_zuum');
$description = get_string('block10enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 10 desing select.
$name = 'theme_zuum/block10desing';
$title = get_string('block10desing', 'theme_zuum');
$description = get_string('block10desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 10 settings, show as slide .
$name = 'theme_zuum/block10slide';
$title = get_string('block10slide', 'theme_zuum');
$description = get_string('block10slidedesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Count block 2 settings.
$name = 'theme_zuum/block10count';
$title = get_string('block10count', 'theme_zuum');
$description = get_string('block10countdesc', 'theme_zuum');
$default = 3;
$options = [];
for ($i = 2; $i < 9; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
$count = get_config('theme_zuum', 'block10count');
// Block 10 header text.
$name = 'theme_zuum/block10header';
$title = get_string('block10header', 'theme_zuum');
$description = get_string('block10headerdesc', 'theme_zuum');
$default = 'Testimonials';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 10 caption text.
$name = 'theme_zuum/block10explanation';
$title = get_string('block10explanation', 'theme_zuum');
$description = get_string('block10explanationdesc', 'theme_zuum');
$default = 'Creating A Community Of Life Long Learners';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, 100);
$page->add($setting);
// Block 10 img select.
$name = 'theme_zuum/block10img';
$title = get_string('block10img', 'theme_zuum');
$description = get_string('block10imgdesc', 'theme_zuum');
$description = $description . get_string('underline', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 8];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block10img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 10 general settings END.
// ------------------------------------------------------------------------------------.
for ($i = 1; $i <= $count; $i++) {
    // Block 10 name.
    $name = 'theme_zuum/block10name' . $i;
    $title = get_string('block10name', 'theme_zuum', ['block' => $i]);
    $description = get_string('block10namedesc', 'theme_zuum');
    $default = '';
    switch ($i) {
        case 1:
            $default = 'JOHN WILD';
            break;
        case 2:
            $default = 'NAHIA COLUNGA';
            break;
        case 3:
            $default = 'Mcleod Wagner';
            break;
    }
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Block 10 job.
    $name = 'theme_zuum/block10job' . $i;
    $title = get_string('block10job', 'theme_zuum', ['block' => $i]);
    $description = get_string('block10jobdesc', 'theme_zuum');
    $default = '';
    switch ($i) {
        case 1:
            $default = 'Software Engineer';
            break;
        case 2:
            $default = 'IT Manager';
            break;
        case 3:
            $default = 'Designer';
            break;
    }
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Block 10 title.
    $name = 'theme_zuum/block10title' . $i;
    $title = get_string('block10title', 'theme_zuum', ['block' => $i]);
    $description = get_string('block10titledesc', 'theme_zuum');
    $default = "";
    switch ($i) {
        case 1:
            $default = 'I love this theme.';
            break;
        case 2:
            $default = 'Very interesting course';
            break;
        case 3:
            $default = 'Quality courses';
            break;
    }
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Block 10 caption.
    $name = 'theme_zuum/block10caption' . $i;
    $title = get_string('block10caption', 'theme_zuum', ['block' => $i]);
    $description = get_string('block10captiondesc', 'theme_zuum');
    $default = 'Elit ut aliquam purus sit amet luctus venenatis lectus magna.
Sed nisi lacus sed viverra tellus in hac habitasse platea';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
    $page->add($setting);
    // Block 10 button link.
    $name = 'theme_zuum/block10link' . $i;
    $title = get_string('block10link', 'theme_zuum', ['block' => $i]);
    $description = get_string('block10linkdesc', 'theme_zuum');
    $description = $description . get_string('underline', 'theme_zuum');
    $default = get_string('buttonlink', 'theme_zuum');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $page->add($setting);
}
