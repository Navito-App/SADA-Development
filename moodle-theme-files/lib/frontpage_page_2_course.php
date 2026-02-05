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
 * Theme zuum page all course.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Page 2 all course.
 *
 * @param int $id02 null.
 */
function theme_zuum_frontpagepage02($id02 = null) {
    GLOBAL $CFG, $DB, $OUTPUT, $PAGE;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    // Categories.
    $templatecontext['page02navbar'] = format_string($theme->settings->page02navbar);
    $templatecontext['page02maintitle'] = format_string($theme->settings->page02maintitle);
    $templatecontext['page02explanation'] = format_string($theme->settings->page02explanation);
    $img = $theme->setting_file_url('page02img', 'page02img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/course/course-2', 'theme');
    }
    $templatecontext['page02img'] = $img;
    $templatecontext['page02headline'] = format_string($theme->settings->page02headline);
    $templatecontext['page02header'] = format_string($theme->settings->page02header);
    $templatecontext['page02imgenabled'] = $theme->settings->page02imgenabled;
    $sql = "SELECT ca.id, ca.name, ca.parent, ca.coursecount, ca.visible, ca.depth, ca.path, ca.description";
    $sql = $sql." FROM {course_categories} ca";
    $sql = $sql." WHERE ca.coursecount > 0 and ca.visible = 1";
    $sql = $sql." ORDER BY ca.coursecount DESC";
    $categorys = $DB->get_records_sql($sql, []);
    $totalcourse = 0;
    if (!empty($categorys)) {
        $j = 0;
        foreach ($categorys as $category) {
            $coursecount = $DB->count_records('course', ['category' => $category->id, 'visible' => 1]);
            if ($coursecount > 0) {
                $templatecontext['page02-ctgry'][$j]['catagoryname'] = format_string($category->name);
                $templatecontext['page02-ctgry'][$j]['catagory_name'] = str_replace(' ', '-', $category->name);
                $templatecontext['page02-ctgry'][$j]['coursecount'] = $coursecount;
                $templatecontext['page02-ctgry'][$j]['description'] = format_text($category->description);
                $templatecontext['page02-ctgry'][$j]['catagoryURL'] =
                    new moodle_url('/course/index.php?categoryid='. $category->id);
                $templatecontext['page02-ctgry'][$j]['catagoryid'] = $category->id;
                $totalcourse = $totalcourse + $coursecount;
                $catagorycounter = $j + 1;
                $j++;
            }
        }
    }
    $templatecontext['page02catagorycounter'] = $catagorycounter;
    $templatecontext['page02totalcourse'] = $totalcourse;
    // Course.
    $templatecontext['page02fullname'] = 0;
    $templatecontext['page02shortname'] = 0;
    $count = $theme->settings->page02count;
    if ($theme->settings->block07title == 'shortname') {
        $templatecontext['page02shortname'] = 1;
    } else {
        $templatecontext['page02fullname'] = 1;
    }
    require_once( $CFG->libdir . '/filelib.php' );
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." *";
    } else {
        $sql = "SELECT *";
    }
    $sql = $sql." FROM {course}";
    $sql = $sql." WHERE visible = 1";
    $sql = $sql." ORDER BY timemodified DESC";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    $courses = $DB->get_records_sql($sql);

    foreach ($courses as $id => $course) {
        $category = $DB->get_record('course_categories', ['id' => $course->category]);
        if (!empty($category)) {
            $course->categoryName = format_string($category->name);
            $course->categoryId = $category->id;
            $allcourses[$id] = $course;
        }
    };
    $j = 0;
    // Course enrol, currency SQL.
    $sql = "SELECT  en.id, en.courseid, en.cost, en.currency";
    $sql = $sql." FROM {enrol} en";
    $sql = $sql." WHERE en.courseid = :courseid and en.status = 0 and en.cost != 'NULL'";
    // Course star SQL.
    $sqla = "SELECT fv.itemid, count(fv.itemid) as countstar";
    $sqla = $sqla." FROM {favourite} fv";
    $sqla = $sqla." WHERE fv.itemid = :courseid and fv.itemtype = 'courses'";
    $sqla = $sqla." GROUP BY fv.itemid";
    $templatecontext['page02priceshow'] = $theme->settings->block07priceshow;
    foreach ($allcourses as $course) {
        $context = context_course::instance($id);
        $summary = file_rewrite_pluginfile_urls($course->summary, 'pluginfile.php',
        $context->id, 'course', 'summary', false);
        $templatecontext['page02'][$j]['fullname'] = format_string($course->fullname);
        $templatecontext['page02'][$j]['shortname'] = format_string($course->shortname);
        $templatecontext['page02'][$j]['summary'] = format_text($summary);
        $sectiontotal = $DB->count_records('course_sections', ['course' => $course->id]);
        $templatecontext['page02'][$j]['format'] = $sectiontotal." of ". $course->format;
        $templatecontext['page02'][$j]['update'] = gmdate("M d,Y", $course->timemodified);
        $templatecontext['page02'][$j]['categoryName'] = format_string($course->categoryName);
        $templatecontext['page02'][$j]['courselink'] = "?course-details=".$course->id;
        $templatecontext['page02'][$j]['categorylink'] = "course/index.php?categoryid=".$course->categoryId;
        $templatecontext['page02'][$j]['idcategory'] = $course->categoryId;
        if ($theme->settings->page02imgenabled) {
            $templatecontext['page02'][$j]['imgurl'] = zuum_get_course_image($course->id, true);
        }
        $templatecontext['page02'][$j]['counter'] = $j + 1;
        $enrol = $DB->get_records_sql($sql, ['courseid' => $course->id]);
        $star = $DB->get_records_sql($sqla, ['courseid' => $course->id]);
        if (!empty($theme->settings->block07priceshow)) {
            if (empty($enrol)) {
                $templatecontext['page02'][$j]['currency'] = get_string('navmethod_free', 'quiz');
            } else {
                foreach ($enrol as $enrols) {
                    $templatecontext['page02'][$j]['cost'] = $enrols->cost;
                    $templatecontext['page02'][$j]['currency'] = $enrols->currency;
                };
            }
        }
        if (empty($star)) {
            $templatecontext['page02'][$j]['star'] = false;
        } else {
            foreach ($star as $stars) {
                $templatecontext['page02'][$j]['star'] = $stars->countstar;
            };
        }
        $context = context_course::instance($course->id);
        $role = $DB->get_field('role', 'id', ['shortname' => 'student']);
        $students = get_role_users($role, $context);
        $templatecontext['page02'][$j]['studentscount'] = count($students);
        $role = $DB->get_field('role', 'id', ['shortname' => 'editingteacher']);

        $teachers = get_role_users($role, $context);
        if (!empty($theme->settings->block07teacherenabled)) {
            foreach ($teachers as $teacher) {
                $templatecontext['page02'][$j]['teachername'] = format_string(fullname($teacher));
                $user = $DB->get_record('user', ['id'  => $teacher->id]);
                $templatecontext['page02'][$j]['userpicture'] = $OUTPUT->user_picture($user);
                $userpicture = new user_picture($user);
                $userpicture->size = 512;
                $url = $userpicture->get_url($PAGE)->out(false);
                $templatecontext['page02'][$j]['userpictureURL'] = $url;
                $templatecontext['page02'][$j]['teacherlink'] = '?teacher-details='.$teacher->id;
            }
        }
        $j++;
        if ($count == $j ) {
            break;
        }
    };
    return $templatecontext;
}
