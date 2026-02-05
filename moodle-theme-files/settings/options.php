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
 * Zuum theme general settings.
 *
 * @package   theme_zuum
 * @copyright 2025 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Zuum section.
 *
 */
function theme_zuum_section() {
    for ($i = 1; $i <= 19; $i++) {
        if ($i < 10 ) {
            $j = "0".$i;
        }
        if ($i > 9 ) {
            $j = $i;
        }
        $comboboxtitle = get_string('block'.$j.'info', 'theme_zuum');
        if ($comboboxtitle != '[[block'.$j.'info]]') {
            $options[$i] = substr($comboboxtitle, 1, strlen($comboboxtitle) - 1 );
        }
    }
    $options[0] = 'None';
    return $options;
}
/**
 * Front page category.
 *
 */
function theme_zuum_all_category() {
    GLOBAL  $DB;
    $options = [];
    $categorys = $DB->get_records('course_categories', ['visible' => 1], 'name ASC');
    foreach ($categorys as $category) {
        $options[$category->id] = $category->name;
    }
    return $options;
}
/**
 * Front page course select.
 *
 */
function theme_zuum_all_course() {
    GLOBAL  $DB;
    $options = [];
    $courses = $DB->get_records('course', ['visible' => 1], 'fullname ASC');
    foreach ($courses as $course) {
        if ($course->id != 1) {
            $options[$course->id] = $course->fullname."(". $course->category . ")";
        }
    }
    return $options;
}
