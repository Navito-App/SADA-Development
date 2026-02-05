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
// Block 20 info.
$name = 'theme_zuum/block20info';
$heading = get_string('block20info', 'theme_zuum');
$information = get_string('block20infodesc', 'theme_zuum');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);
// Enable or disable block 20 settings.
$name = 'theme_zuum/block20enabled';
$title = get_string('block20enabled', 'theme_zuum');
$description = get_string('block20enableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Block 20 logo image.
$name = 'theme_zuum/block20logo';
$title = get_string('block20logo', 'theme_zuum');
$description = get_string('block20logodesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$opts = ['accepted_types' => ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.tiff', '.svg'], 'maxfiles' => 1];
$setting = new admin_setting_configstoredfile($name, $title, $description, 'block20logo',  0, $opts);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Newsletter enable or disable block 20 settings.
$name = 'theme_zuum/block20nlenabled';
$title = get_string('block20nlenabled', 'theme_zuum');
$description = get_string('block20nlenableddesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 1);
$page->add($setting);
// Newsletter explanation block 20 settings.
$name = 'theme_zuum/block20nlheader';
$title = get_string('block20nlheader', 'theme_zuum');
$description = get_string('block20nlheaderdesc', 'theme_zuum');
$default = "Sign up to get The Latest Updates";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Newsletter explanation block 20 settings.
$name = 'theme_zuum/block20nlexplanation';
$title = get_string('block20nlexplanation', 'theme_zuum');
$description = get_string('block20nlexplanationdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = "Our approach to it is unique around how to work and how to get hands-on with you like";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$page->add($setting);
// Block 20 design select.
$name = 'theme_zuum/block20design';
$title = get_string('block20design', 'theme_zuum');
$description = get_string('block20designdesc', 'theme_zuum');
$default = 1;
$options = [];
for ($i = 1; $i <= 1; $i++) {
     $options[$i] = $i;
}
$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Block 20 background color palet.
$name = 'theme_zuum/footerbackgroundcolor';
$title = get_string('footerbackgroundcolor', 'theme_zuum');
$description = get_string('footerbackgroundcolordesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$setting = new admin_setting_configcolourpicker($name, $title, $description, '');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Block 20 col 1 header.
$name = 'theme_zuum/block20col1header';
$title = get_string('block20col1header', 'theme_zuum');
$description = get_string('block20col1headerdesc', 'theme_zuum');
$default = "Site Name";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 20 col 1 caption.
$name = 'theme_zuum/block20col1caption';
$title = get_string('block20col1caption', 'theme_zuum');
$description = get_string('block20col1captiondesc', 'theme_zuum');
$default = get_string('block20col1captiondefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '3');
$page->add($setting);
// Block 20 social links.
$name = 'theme_zuum/block20social';
$title = get_string('block20social', 'theme_zuum');
$description = get_string('block20socialdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = get_string('block20socialdefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '5');
$page->add($setting);
// Block 20 col 2 header.
$name = 'theme_zuum/block20col2header';
$title = get_string('block20col2header', 'theme_zuum');
$description = get_string('block20col2headerdesc', 'theme_zuum');
$default = "Quick Link";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 20 col 2 link area.
$name = 'theme_zuum/block20col2link';
$title = get_string('block20col2link', 'theme_zuum');
$description = get_string('block20col2linkdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = get_string('block20col2linkdefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '6');
$page->add($setting);
// Block 20 col 3 header.
$name = 'theme_zuum/block20col3header';
$title = get_string('block20col3header', 'theme_zuum');
$description = get_string('block20col3headerdesc', 'theme_zuum');
$default = "Courses";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 20 col 3 link area.
$name = 'theme_zuum/block20col3link';
$title = get_string('block20col3link', 'theme_zuum');
$description = get_string('block20col3linkdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = get_string('block20col3linkdefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '6');
$page->add($setting);
// Block 20 col 4 header.
$name = 'theme_zuum/block20col4header';
$title = get_string('block20col4header', 'theme_zuum');
$description = get_string('block20col4headerdesc', 'theme_zuum');
$default = "Help Center";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 20 col 4 link area.
$name = 'theme_zuum/block20col4link';
$title = get_string('block20col4link', 'theme_zuum');
$description = get_string('block20col4linkdesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default = get_string('block20col4linkdefault', 'theme_zuum');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '6');
$page->add($setting);
// Block 20 col 5 header.
$name = 'theme_zuum/block20col5header';
$title = get_string('block20col5header', 'theme_zuum');
$description = get_string('block20col5headerdesc', 'theme_zuum');
$default = "Get In Touch";
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
$page->add($setting);
// Block 20 col 5 address.
$name = 'theme_zuum/block20col5address';
$title = get_string('block20col5address', 'theme_zuum');
$description = get_string('block20col5addressdesc', 'theme_zuum');
$default = "Adress27 Division Sat, Barakuti, No 12G02, Us";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '1');
$page->add($setting);
// Block 20 col 5 phone.
$name = 'theme_zuum/block20col5phone';
$title = get_string('block20col5phone', 'theme_zuum');
$description = get_string('block20col5phonedesc', 'theme_zuum');
$default =
"<a href='tel:123456789865'>+123 456 789 865</a>
<a href='tel:741852963856'>+741 852 963 856</a>";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$page->add($setting);
// Block 20 col 5 e-mail.
$name = 'theme_zuum/block20col5email';
$title = get_string('block20col5email', 'theme_zuum');
$description = get_string('block20col5emaildesc', 'theme_zuum');
$description = $description.get_string('underline', 'theme_zuum');
$default =
"<a href='mailto:zuum@gmail.com'>zuum@gmail.com</a>
<a href='mailto:zuum@gmail.com'>zuum@gmail.com</a>";
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$page->add($setting);
// Block 20 Copyright.
$name = 'theme_zuum/block20copyright';
$title = get_string('block20copyright', 'theme_zuum');
$description = get_string('block20copyrightdesc', 'theme_zuum');
$default = '<a href="https://themesalmond.com/"> Almond Themes </a> © <b> Zuum </b> Template All rights reserved Copyrights ';
$default .= date('Y');
$setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW, '1', '2');
$page->add($setting);
// Enable or disable moodle frontpage orjinal button.
$name = 'theme_zuum/block20moodle';
$title = get_string('block20moodle', 'theme_zuum');
$description = get_string('block20moodledesc', 'theme_zuum');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
