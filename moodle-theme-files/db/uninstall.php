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
 * Theme ZUUM - Uninstall file.
 *
 * @package    theme_zuum
 * @copyright  2024 Hüseyin Yemen <yemenhuseyin@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Plugin uninstall steps.
 */
function xmldb_theme_zuum_uninstall() {
    global $DB;
    $DB->delete_records('user_info_field', ['shortname' => 'zuum_user_job']);
    $DB->delete_records('user_info_field', ['shortname' => 'zuum_social_media']);
    $DB->delete_records('user_info_field', ['shortname' => 'zuum_skills']);
    $DB->delete_records('user_info_category', ['name' => 'ZUUM-Custom field']);

    $DB->delete_records('customfield_field', ['shortname' => 'zuum_course_duration']);
    $DB->delete_records('customfield_field', ['shortname' => 'zuum_skill_level']);
    $DB->delete_records('customfield_category', ['name' => 'ZUUM-Course content']);
}
