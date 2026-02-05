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
 * Zuum pages.
 *
 * @package   theme_zuum
 * @copyright 2023 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
$page = new admin_settingpage('theme_zuum_page', get_string('frontpagepage', 'theme_zuum'));

require('pages/1-about.php');
require('pages/2-course.php');
require('pages/3-courses.php');
require('pages/4-teachers.php');
require('pages/5-teachers.php');
require('pages/6-contact.php');

$page->add(new admin_setting_heading('theme_zuum_pageend', "",
format_text(get_string('frontpagepageenddesc', 'theme_zuum'), FORMAT_MARKDOWN)));
$settings->add($page);
