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
 * Front page settings file.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Course, user report.
 *
 * @param int $roleid role.
 * @param int $courseid course id.
 *
 */
function zuum_reports_course_role_count($roleid = null, $courseid = null) {
    GLOBAL $DB;
    $sql = "SELECT COUNT(course.id) AS total ";
    $sql = $sql. "FROM {role_assignments} asg ";
    $sql = $sql. "JOIN {context} context ON asg.contextid = context.id AND context.contextlevel = 50 ";
    $sql = $sql. "JOIN {user} usr ON usr.id = asg.userid ";
    $sql = $sql. "JOIN {course} course ON context.instanceid = course.id ";
    $sql = $sql. "WHERE asg.roleid = ".$roleid;
    if (!empty($courseid)) {
        $sql = $sql. " AND course.id = ".$courseid;
    }
    $sql = $sql. " ORDER BY COUNT(course.id) DESC";
    $reports = $DB->get_records_sql($sql);
    foreach ($reports as $report) {
           $count = $report->total;
    }
    return $count;
}
/**
 * Table count records.
 *
 * @param string $table name.
 *
 */
function theme_zuum_countrecords($table = null) {
    global $DB;
    return $DB->count_records($table);
}
