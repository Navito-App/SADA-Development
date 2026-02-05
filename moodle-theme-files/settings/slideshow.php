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
$page = new admin_settingpage('theme_zuum_slide', get_string('slideshow', 'theme_zuum'));
$page->add(new admin_setting_heading('theme_zuum_slideshow', get_string('slideshowheading', 'theme_zuum'),
format_text(get_string('slideshowheadingdesc', 'theme_zuum'), FORMAT_MARKDOWN)));
// Slideshow desing select.
$name = 'theme_zuum/sliderdesing';
$title = get_string('sliderdesing', 'theme_zuum');
$description = get_string('sliderdesingdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Enable or disable Slideshow settings.
$name = 'theme_zuum/sliderenabled';
$title = get_string('sliderenabled', 'theme_zuum');
$description = get_string('sliderenableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Slider autoplay.
$name = 'theme_zuum/slideautoplay';
$title = get_string('slideautoplay', 'theme_zuum');
$description = get_string('slideautoplaydesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Slider pagination.
$name = 'theme_zuum/slidepagination';
$title = get_string('slidepagination', 'theme_zuum');
$description = get_string('slidepaginationdesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Count Slideshow settings.
$name = 'theme_zuum/slidercount';
$title = get_string('slidercount', 'theme_zuum');
$description = get_string('slidercountdesc', 'theme_zuum');
$default = 4;
$options = [];
for ($i = 1; $i <= 6; $i++) {
    $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// If we don't have an slide yet, default to the preset.
$slidercount = get_config('theme_zuum', 'slidercount');

if (!$slidercount) {
    $slidercount = 1;
}
for ($count = 1; $count <= $slidercount; $count++) {
    $name = 'theme_zuum/slide' . $count . 'info';
    $heading = get_string('slideno', 'theme_zuum', ['slide' => $count]);
    $information = get_string('slidenodesc', 'theme_zuum', ['slide' => $count]);
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    // Slider image.
    $fileid = 'sliderimage'.$count;
    $name = 'theme_zuum/sliderimage'.$count;
    $title = get_string('sliderimage', 'theme_zuum');
    $description = get_string('sliderimagedesc', 'theme_zuum');
    $opts = ['accepted_types' => ['.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
    $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid,  0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Slider background color.
    $fileid = 'sliderbgcolor'.$count;
    $name = 'theme_zuum/sliderbgcolor'.$count;
    $title = get_string('sliderbgcolor', 'theme_zuum');
    $description = get_string('sliderbgcolordesc', 'theme_zuum');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Slider header.
    $name = 'theme_zuum/sliderheader' . $count;
    $title = get_string('sliderheader', 'theme_zuum');
    $description = get_string('sliderheaderdesc', 'theme_zuum');
    $default = "Learning Excellence";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Slider header color class.
    $name = 'theme_zuum/sliderheadercolor' . $count;
    $title = get_string('sliderheadercolor', 'theme_zuum');
    $description = get_string('sliderheadercolordesc', 'theme_zuum');
    $default = 'text-white';
    $options = [
        'text-primary' => 'text-primary',
        'text-secondary' => 'text-secondary',
        'text-success' => 'text-success',
        'text-danger' => 'text-danger',
        'text-warning' => 'text-warning',
        'text-info' => 'text-info',
        'text-light' => 'text-light',
        'text-dark' => 'text-dark',
        'text-body' => 'text-body',
        'text-muted' => 'text-muted',
        'text-white' => 'text-white',
        'text-black-50' => 'text-black-50',
        'text-white-50' => 'text-white-50',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);
    // Slider title.
    $name = 'theme_zuum/slidertitle' . $count;
    $title = get_string('slidertitle', 'theme_zuum');
    $description = get_string('slidertitledesc', 'theme_zuum');
    $default = "The Best Moodle Theme of All Time";
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
    $page->add($setting);
    // Slider title color class.
    $name = 'theme_zuum/slidertitlecolor' . $count;
    $title = get_string('slidertitlecolor', 'theme_zuum');
    $description = get_string('slidertitlecolordesc', 'theme_zuum');
    $default = 'text-white';
    // The slider uses the options in the header.
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);
    // Slider caption.
    $name = 'theme_zuum/slidercap' . $count;
    $title = get_string('slidercaption', 'theme_zuum');
    $description = get_string('slidercaptiondesc', 'theme_zuum');
    $default = "Using a series of utilities, you can create this jumbotron, just like the one in previous
    versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.";
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);
    // Slider button 1.
    $name = 'theme_zuum/sliderbutton' . $count;
    $title = get_string('sliderbutton', 'theme_zuum');
    $description = get_string('sliderbuttondesc', 'theme_zuum');
    $default = 'Start Learning';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Slide button link 1.
    $name = 'theme_zuum/sliderurl'. $count;
    $title = get_string('sliderbuttonurl', 'theme_zuum');
    $description = get_string('sliderbuttonurldesc', 'theme_zuum');
    $default = 'http://www.example.com/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $page->add($setting);
    // Slider button 2.
    $name = 'theme_zuum/sliderbutton2' . $count;
    $title = get_string('sliderbutton2', 'theme_zuum');
    $description = get_string('sliderbutton2desc', 'theme_zuum');
    $default = 'Free Join Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);
    // Slide button link 2.
    $name = 'theme_zuum/sliderurl2'. $count;
    $title = get_string('sliderbuttonurl2', 'theme_zuum');
    $description = get_string('sliderbuttonurl2desc', 'theme_zuum');
    $default = 'http://www.example.com/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $page->add($setting);
}
$page->add(new admin_setting_heading('theme_zuum_slideend', get_string('slideshowend', 'theme_zuum'),
format_text(get_string('slideshowenddesc', 'theme_zuum'), FORMAT_MARKDOWN)));
$settings->add($page);
