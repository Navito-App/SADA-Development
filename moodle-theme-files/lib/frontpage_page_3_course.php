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
 * Theme zuum page course detail.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Page 3 course details.
 *
 * @param int $courseid course id.
 */
function theme_zuum_frontpagepage03($courseid) {
    GLOBAL $PAGE, $OUTPUT, $DB;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    $templatecontext['page03enrollbutton'] = format_string($theme->settings->page03enrollbutton);
    $templatecontext['page03enrollbuttonlink'] = $theme->settings->page03enrollbuttonlink;
    $templatecontext['page03enrollrole'] = $theme->settings->page03enrollrole;
    $img = $theme->setting_file_url('page03img', 'page03img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/course/course-1', 'theme');
    }
    $templatecontext['page03img'] = $img;

    if (!empty($courseid)) {
        $courses = $DB->get_records_sql("SELECT * FROM {course} WHERE  id =".$courseid);
    }
    $j = 0;
    $sql = "SELECT  en.id, en.courseid, en.cost, en.currency";
    $sql = $sql." FROM {enrol} en";
    $sql = $sql." WHERE en.courseid = :courseid and en.status = 0 and en.cost != 'NULL'";
    if (!empty($courses)) {
        foreach ($courses as $course) {
            $context = context_course::instance($course->id);
            $summary = file_rewrite_pluginfile_urls($course->summary, 'pluginfile.php',
            $context->id, 'course', 'summary', false);
            if (empty($theme->settings->page03navbar)) {
                $templatecontext['page03navbar'] = format_string($course->shortname);
            } else {
                $templatecontext['page03navbar'] = format_string($theme->settings->page03navbar);
            }
            if (empty($theme->settings->page03header)) {
                $templatecontext['page03header'] = format_string($course->fullname);
            } else {
                $templatecontext['page03header'] = format_string($theme->settings->page03header);
            }
            if (empty($theme->settings->page03caption)) {
                $templatecontext['page03caption'] = format_text($summary);
            } else {
                $templatecontext['page03caption'] = format_string($theme->settings->page03caption);
            }
            $languages = get_string_manager()->get_list_of_translations();
            $lang = "";
            foreach ($languages as $name => $value) {
                if ($name == $course->lang) {
                    $lang = $value;
                }
            }
            $templatecontext['page03_course_lang'] = $lang;
            $templatecontext['page03_course_category'] = format_string(theme_zuum_frontpageblockcategory($course->category));
            $templatecontext['page03_course_fullname'] = format_string($course->fullname);
            $templatecontext['page03_course_summary'] = format_text($summary);
            $templatecontext['page03_course_imgurl'] = zuum_get_course_image($course->id, true);
            $templatecontext['page03_course_shortname'] = format_string($course->shortname);
            $templatecontext['page03_course_update'] = gmdate("M d,Y", $course->timemodified);
            $templatecontext['page03_course_start_date'] = gmdate("d M Y", $course->startdate);
            $templatecontext['page03_course_courselink'] = "course/view.php?id=".$course->id;
            $templatecontext['page03_course_counter'] = $j + 1;
            $sectiontotal = $DB->count_records('course_sections', ['course' => $course->id]);
            $templatecontext['page03_course_format'] = $sectiontotal." of ". $course->format;
            $role = $DB->get_field('role', 'id', ['id' => $theme->settings->page03enrollrole]);
            $students = get_role_users($role, $context);
            $templatecontext['page03_course_studentscount'] = count($students);
            $enrol = $DB->get_records_sql($sql, ['courseid' => $course->id]);
            if (empty($enrol)) {
                $templatecontext['page03_course_currency'] = get_string('navmethod_free', 'quiz');
            } else {
                foreach ($enrol as $enrols) {
                    $templatecontext['page03_course_cost'] = $enrols->cost;
                    $templatecontext['page03_course_currency'] = $enrols->currency;
                };
            }
            // Teacher role forma eklenecek.
            $role = $theme->settings->page03teacherrole;
            $teachers = get_role_users($role, $context);
            if (!empty($teachers)) {
                $i = 0;
                foreach ($teachers as $teacher) {
                    $templatecontext['page03_teacher'][$i]['teachername'] = format_string(fullname($teacher));
                    $user = $DB->get_record('user', ['id'  => $teacher->id]);
                    $personcontext = context_user::instance($user->id);
                    $userdescription = file_rewrite_pluginfile_urls($user->description, 'pluginfile.php',
                    $personcontext->id, 'user', 'profile', false);
                    $templatecontext['page03_teacher'][$i]['description'] = format_text($userdescription);
                    $teacher->imagealt = get_string('defaultcourseteacher', 'moodle');
                    $userpicture = new user_picture($teacher);
                    $userpicture->size = 512;
                    $templatecontext['page03_teacher'][$i]['userpicture'] = $userpicture->get_url($PAGE)->out(false);
                    $userpicture = new user_picture($user);
                    $templatecontext['page03_teacher'][$i]['userURL'] =
                            new moodle_url('/user/profile.php', ['id' => $teacher->id]);
                    $templatecontext['page03_teacher'][$i]['teacherlink'] = '?teacher-details='.$teacher->id;

                    // Teacher job.
                    $otherareas = zuum_otherareas_ready($teacher->id);
                    $templatecontext['page03_teacher'][$i]['job'] = $otherareas['job'];
                    // Teacher course.
                    $teacherrole = $theme->settings->page03teacherrole;
                    $coursecount = 0;
                    $studentscount = 0;
                    $courses = get_courses('all', 'c.timemodified DESC');
                    foreach ($courses as $crs) {
                        $context = context_course::instance($crs->id);
                        $teachers = get_role_users($teacherrole, $context);
                        foreach ($teachers as $teacher) {
                            if ($teacher->username == $user->username) {
                                $coursecount++;
                                $studentrole = $DB->get_field('role', 'id', ['id' => $theme->settings->page03enrollrole]);
                                $students = get_role_users($studentrole, $context);
                                $studentscount = $studentscount + count($students);
                            }
                        }
                    }
                    $templatecontext['page03_teacher'][$i]['coursecount'] = $coursecount;
                    $templatecontext['page03_teacher'][$i]['studentscount'] = $studentscount;
                    $i++;
                }
            }

            // Comments.
            $context = context_course::instance($course->id);
            $comments = $DB->get_records('comments',  ['contextid' => $context->id]);
            if (!empty($comments)) {
                $i = 0;
                foreach ($comments as $comment) {
                    $templatecontext['page03_comment'][$i]['content'] = $comment->content;
                    $templatecontext['page03_comment'][$i]['timecreated'] = gmdate("d M Y", $comment->timecreated);
                    $person = $DB->get_record('user', ['id' => $comment->userid]);
                    $templatecontext['page03_comment'][$i]['username'] = format_string(fullname($person));
                    $userpicture = new user_picture($person);
                    $userpicture->size = 100;
                    $templatecontext['page03_comment'][$i]['userimg'] = $userpicture->get_url($PAGE)->out(false);
                    $i++;
                }
            }
            // Teacher course.
            $templatecontext['page03_course_courseduration'] =
                theme_zuum_course_customfield("zuum_course_duration", $course->id);
            $templatecontext['page03_course_skilllevel'] =
                theme_zuum_course_customfield("zuum_skill_level", $course->id);
            $j++;
        };
    }
    return $templatecontext;
}
