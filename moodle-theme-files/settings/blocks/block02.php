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
// Block 2 info.
$name = 'theme_zuum/block02info';
$heading = get_string('block02info', 'theme_zuum');
$information = get_string('block02infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 2 settings.
$name = 'theme_zuum/block02enabled';
$title = get_string('block02enabled', 'theme_zuum');
$description = get_string('block02enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 2 desing select.
$name = 'theme_zuum/block02desing';
$title = get_string('block02desing', 'theme_zuum');
$description = get_string('block02desingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Count block 2 settings.
$name = 'theme_zuum/block02count';
$title = get_string('block02count', 'theme_zuum');
$description = get_string('block02countdesc', 'theme_zuum');
$default = 3;
$options = [];
for ($i = 2; $i <= 4; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
$count = get_config('theme_zuum', 'block02count');
// Block 02 header.
$name = 'theme_zuum/block02header';
$title = get_string('block02header', 'theme_zuum');
$description = get_string('block02headerdesc', 'theme_zuum');
$default = 'Features';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 02 explanation.
$name = 'theme_zuum/block02explanation';
$title = get_string('block02explanation', 'theme_zuum');
$description = get_string('block02explanationdesc', 'theme_zuum');
$default = 'What to Expect from a Almond Theme';
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$page->add($setting);
// Block 2 img select.
$name = 'theme_zuum/block02img';
$title = get_string('block02img', 'theme_zuum');
$description = get_string('block02imgdesc', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 4];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block02img',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 2 icon.
$name = 'theme_zuum/block02icon';
$title = get_string('block02icon', 'theme_zuum');
$description = get_string('block02icondesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = get_string('block02icondefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Block 2 general settings END.
// ------------------------------------------------------------------------------------.
for ($i = 1; $i < $count + 1; $i++) {
     // Block 2 title.
     $name = 'theme_zuum/block02title'.$i;
     $title = get_string('block02title', 'theme_zuum', ['block' => $i]);
     $description = get_string('block02titledesc', 'theme_zuum');
     $default = get_string('block02titledefault', 'theme_zuum');
     $setting = new admin_setting_configtext($name, $title, $description, $default);
     $page->add($setting);
     // Block 2 caption.
     $name = 'theme_zuum/block02caption'.$i;
     $title = get_string('block02caption', 'theme_zuum', ['block' => $i]);
     $description = get_string('block02captiondesc', 'theme_zuum');
     $default = get_string('block02captiondefault', 'theme_zuum');
     $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
     $page->add($setting);
     // Block 2 button.
     $name = 'theme_zuum/block02button'.$i;
     $title = get_string('block02button', 'theme_zuum', ['block' => $i]);
     $description = get_string('block02buttondesc', 'theme_zuum');
     $default = 'Learn More';
     $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
     $page->add($setting);
     // Block 2 button link.
     $name = 'theme_zuum/block02buttonlink'.$i;
     $title = get_string('block02buttonlink', 'theme_zuum', ['block' => $i]);
     $description = get_string('block02buttonlinkdesc', 'theme_zuum');
     $description = $description.get_string('underline', 'theme_zuum');
     $default = get_string('buttonlink', 'theme_zuum');
     $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
     $page->add($setting);
}
