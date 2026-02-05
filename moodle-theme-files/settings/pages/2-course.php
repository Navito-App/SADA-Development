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
 * Zuum all course single page settings.
 *
 * @package   theme_zuum
 * @copyright 2022 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
    // Page 2 info.
    $name = 'theme_zuum/page02info';
    $heading = get_string('page02info', 'theme_zuum');
    $information = get_string('page02infodesc', 'theme_zuum');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 navbar title.
    $name = 'theme_zuum/page02navbar';
    $title = get_string('page02navbar', 'theme_zuum');
    $description = get_string('page02navbardesc', 'theme_zuum');
    $default = "ALL COURSE";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 main title.
    $name = 'theme_zuum/page02maintitle';
    $title = get_string('page02maintitle', 'theme_zuum');
    $description = get_string('page02maintitledesc', 'theme_zuum');
    $default = "The Best Moodle Theme of All Time";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 explanation.
    $name = 'theme_zuum/page02explanation';
    $title = get_string('page02explanation', 'theme_zuum');
    $description = get_string('page02explanationdesc', 'theme_zuum');
    $default = 'Rutrum tellus pellentesque eu tincidunt. Venenatis cras sed felis eget velit aliquet
    sagittis id consectetur. Sit amet porttitor eget dolor morbi';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
    $page->add($setting);
    // Page 2 img select.
    $name = 'theme_zuum/page02img';
    $title = get_string('page02img', 'theme_zuum');
    $description = get_string('page02imgdesc', 'theme_zuum');
    $opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'page02img',  0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // SECTION 1.
    $page->add(new admin_setting_heading('page02section1', get_string('page02section1', 'theme_zuum'),
    format_text( '', FORMAT_MARKDOWN)));
    $page->add($setting);
    // Course image show-hide.
    $name = 'theme_zuum/page02imgenabled';
    $title = get_string('page02imgenabled', 'theme_zuum');
    $description = get_string('page02imgenableddesc', 'theme_zuum');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 count text.
    $name = 'theme_zuum/page02count';
    $title = get_string('page02count', 'theme_zuum');
    $description = get_string('page02countdesc', 'theme_zuum');
    $default = "50";
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT, '2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 headline.
    $name = 'theme_zuum/page02headline';
    $title = get_string('page02headline', 'theme_zuum');
    $description = get_string('page02headlinedesc', 'theme_zuum');
    $default = get_string('page02headlinedefault', 'theme_zuum');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 header.
    $name = 'theme_zuum/page02header';
    $title = get_string('page02header', 'theme_zuum');
    $description = get_string('page02headerdesc', 'theme_zuum');
    $default = get_string('page02headerdefault', 'theme_zuum');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Page 2 caption.
    $name = 'theme_zuum/page02caption';
    $title = get_string('page02caption', 'theme_zuum');
    $description = get_string('page02captiondesc', 'theme_zuum');
    $default = get_string('page02captiondefault', 'theme_zuum');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
