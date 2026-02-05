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
 * Theme zuum block function file.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Front page block 1.
 */
function theme_zuum_frontpageblock01() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block01enabled'] = $theme->settings->block01enabled;
    if (empty($templatecontext['block01enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block01desing1'] = true;
    $templatecontext['block01caption'] = format_text($theme->settings->block01caption);
    $templatecontext['block01button'] = format_string($theme->settings->block01button);
    $templatecontext['block01buttonlink'] = $theme->settings->block01buttonlink;
    $templatecontext['block01color'] = $theme->settings->block01color;

    $templatecontext['block01shape1'] = $OUTPUT->image_url('block01/shape-1-1', 'theme');
    $templatecontext['block01shape2'] = $OUTPUT->image_url('block01/shape-1-2', 'theme');
    return $templatecontext;
}
/**
 * Front page block 2.
 */
function theme_zuum_frontpageblock02() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block02enabled'] = $theme->settings->block02enabled;
    $templatecontext['block02desing'.$theme->settings->block02desing] = $theme->settings->block02desing;
    $templatecontext['block02header'] = format_string($theme->settings->block02header);
    $templatecontext['block02explanation'] = format_string($theme->settings->block02explanation);

    if (empty($templatecontext['block02enabled'])) {
        return $templatecontext;
    }
    $count = $theme->settings->block02count;
    $exp = explode(',', $theme->settings->block02icon);
    $iconcount = count($exp);
    $blockimg = zuum_block_image($count, 1, 'block02img');
    if ($blockimg['count'] > 0) {
        for ($i = 1, $j = 0; $i <= $blockimg['count']; $i++, $j++) {
            $templatecontext['block02'][$j]['block02img'] = $blockimg['blockimg'.$i];
        }
    }
    for ($i = 1, $j = 0; $i <= $count; $i++, $j++) {
        $block02title = "block02title{$i}";
        $block02caption = "block02caption{$i}";
        $block02button = "block02button{$i}";
        $block02buttonlink = "block02buttonlink{$i}";
        if ($j >= $iconcount ) {
            $templatecontext['block02'][$j]['icon'] = isset($exp[0]) ? $exp[0] : null;
        } else {
            $templatecontext['block02'][$j]['icon'] = isset($exp[$j]) ? $exp[$j] : null;
        }

        if (empty($templatecontext['block02'][$j]['block02img'])) {
            $templatecontext['block02'][$j]['block02img'] = $OUTPUT->image_url('block02/iconbox-'.$i, 'theme');
        }

        $templatecontext['block02'][$j]['title'] = format_string($theme->settings->$block02title);
        $templatecontext['block02'][$j]['caption'] = format_string($theme->settings->$block02caption);
        $templatecontext['block02'][$j]['button'] = format_string($theme->settings->$block02button);
        $templatecontext['block02'][$j]['buttonurl'] = format_string($theme->settings->$block02buttonlink);
        $templatecontext['block02'][$j]['say'] = $i;
    }
    if ($count == 2) {
        $templatecontext['count'] = "col-lg-6";
    } else if ($count == 3) {
        $templatecontext['count'] = "col-xl-4 col-lg-6";
    } else {
        $templatecontext['count'] = "col-xl-3 col-lg-6";
    }
    return $templatecontext;
}
/**
 * Front page block 3.
 */
function theme_zuum_frontpageblock03() {
    $theme = theme_config::load('zuum');
    $templatecontext['block03enabled'] = $theme->settings->block03enabled;
    if (empty($templatecontext['block03enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block03desing'.$theme->settings->block03desing] = $theme->settings->block03desing;
    $templatecontext['block03header'] = format_string($theme->settings->block03header);
    $templatecontext['block03explanation'] = format_string($theme->settings->block03explanation);
    $count = 6;
    $exp = explode(',', $theme->settings->block03iconnew);
    $iconcount = count($exp);
    for ($i = 1, $j = 0; $i <= $count; $i++, $j++) {
        $block03title = "block03title{$i}";
        $block03caption = "block03caption{$i}";
        $block03link = "block03link{$i}";
        if ($j >= $iconcount ) {
            $templatecontext['block03'][$j]['icon'] = isset($exp[0]) ? $exp[0] : null;
        } else {
            $templatecontext['block03'][$j]['icon'] = isset($exp[$j]) ? $exp[$j] : null;
        }
        $templatecontext['block03'][$j]['title'] = format_string($theme->settings->$block03title);
        $templatecontext['block03'][$j]['caption'] = format_string($theme->settings->$block03caption);
        if (empty($theme->settings->$block03link)) {
            $templatecontext['block03'][$j]['link'] = "#";
        } else {
            $templatecontext['block03'][$j]['link'] = format_string($theme->settings->$block03link);
        }
    }
    return $templatecontext;
}
/**
 * Front page block 4.
 */
function theme_zuum_frontpageblock04() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block04enabled'] = $theme->settings->block04enabled;
    if (empty($templatecontext['block04enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block04desing'.$theme->settings->block04desing] = $theme->settings->block04desing;

    for ($i = 1; $i <= 4; $i++) {
        $templatecontext['block04img'.$i] = $OUTPUT->image_url('block04/stats-'.$i, 'theme');
    }
    $blockimg = zuum_block_image(4, 1, 'block04img');
    if ($blockimg['count'] > 0) {
        for ($i = 1; $i <= $blockimg['count']; $i++) {
            $templatecontext['block04img'.$i] = $blockimg['blockimg'.$i];
        }
    }
    $templatecontext['block04totalcategories'] = theme_zuum_countrecords('course_categories');
    $templatecontext['block04totalcourse'] = theme_zuum_countrecords('course') - 1;
    $roleid = $theme->settings->block08studentrole;
    $templatecontext['block04totalstudent'] = zuum_reports_course_role_count($roleid);
    $roleid = $theme->settings->block08showrole;
    $templatecontext['block04totalteacher'] = zuum_reports_course_role_count($roleid);

    return $templatecontext;
}
/**
 * Front page block 5.
 */
function theme_zuum_frontpageblock05() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block05enabled'] = $theme->settings->block05enabled;
    if (empty($templatecontext['block05enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block05desing'.$theme->settings->block05desing] = $theme->settings->block05desing;
    $templatecontext['block05header'] = format_string($theme->settings->block05header);
    $templatecontext['block05comment'] = format_string($theme->settings->block05comment);
    $templatecontext['block05button'] = format_string($theme->settings->block05button);
    $templatecontext['block05buttonlink'] = $theme->settings->block05buttonlink;
    $templatecontext['block05color'] = $theme->settings->block05color;
    $image = $theme->setting_file_url('block05img', 'block05img');
    if (empty($image)) {
        $image = $OUTPUT->image_url('block05/why-we-block', 'theme');
    }

    $templatecontext['block05image'] = $image;
    $exp = explode(',', $theme->settings->block05icon);
    $iconcount = count($exp);
    for ($i = 1, $j = 0; $i <= 3; $i++, $j++) {
        $block05title = "block05title{$i}";
        $block05caption = "block05caption{$i}";
        $block05link = "block05link{$i}";

        if ($j >= $iconcount ) {
            $templatecontext['block05'][$j]['icon'] = isset($exp[0]) ? $exp[0] : null;
        } else {
            $templatecontext['block05'][$j]['icon'] = isset($exp[$j]) ? $exp[$j] : null;
        }
        $templatecontext['block05'][$j]['title'] = format_string($theme->settings->$block05title);
        $templatecontext['block05'][$j]['caption'] = format_string($theme->settings->$block05caption);
        $templatecontext['block05'][$j]['link'] = format_string($theme->settings->$block05link);
    }
    return $templatecontext;
}
/**
 * Front page block 6.
 */
function theme_zuum_frontpageblock06() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block06enabled'] = $theme->settings->block06enabled;
    if (empty($templatecontext['block06enabled'])) {
        return $templatecontext;
    }
    // Returns an array of `stored_file` instances.
    for ($i = 1; $i <= 4; $i++) {
        $templatecontext['block06img'.$i] = $OUTPUT->image_url('block06/grid-'.$i, 'theme');
    }
    $blockimg = zuum_block_image(4, 1, 'block06img');
    if ($blockimg['count'] > 0) {
        for ($i = 1; $i <= $blockimg['count']; $i++) {
            $templatecontext['block06img'.$i] = $blockimg['blockimg'.$i];
        }
    }

    $templatecontext['block06color'] = $theme->settings->block06color;
    $templatecontext['block06desing'.$theme->settings->block06desing] = $theme->settings->block06desing;
    $templatecontext['block06header'] = format_string($theme->settings->block06header);
    $templatecontext['block06caption'] = format_text($theme->settings->block06caption);
    $templatecontext['block06button'] = format_string($theme->settings->block06button);
    $templatecontext['block06buttonlink'] = $theme->settings->block06buttonlink;
    return $templatecontext;
}
/**
 * Front page block 7.
 */
function theme_zuum_frontpageblock07() {
    GLOBAL $CFG, $DB, $OUTPUT, $PAGE;
    $theme = theme_config::load('zuum');
    $templatecontext['block07enabled'] = $theme->settings->block07enabled;
    $templatecontext['block07teacherenabled'] = $theme->settings->block07teacherenabled;
    if (empty($templatecontext['block07enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block07desing'.$theme->settings->block07desing] = $theme->settings->block07desing;
    $templatecontext['block07slide'] = $theme->settings->block07slide;
    $templatecontext['block07imgenabled'] = $theme->settings->block07imgenabled;
    $templatecontext['block07header'] = format_string($theme->settings->block07header);
    $templatecontext['block07caption'] = format_string($theme->settings->block07caption);
    $templatecontext['block07button'] = format_string($theme->settings->block07button);
    $templatecontext['block07buttonlink'] = $theme->settings->block07buttonlink;
    $templatecontext['block07fullname'] = 0;
    $templatecontext['block07shortname'] = 0;
    if ($theme->settings->block07title == 'shortname') {
        $templatecontext['block07shortname'] = 1;
    } else {
        $templatecontext['block07fullname'] = 1;
    }
    require_once( $CFG->libdir . '/filelib.php' );
    $count = $theme->settings->block07count;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." c.id, c.fullname, c.shortname, c.summary, c.timemodified, c.category, c.visible";
    } else {
        $sql = "SELECT c.id, c.fullname, c.shortname, c.summary, c.timemodified, c.category, c.visible";
    }
    $sql = $sql." FROM {course} c";
    $sql = $sql." WHERE c.visible = 1 and c.id <> 1";
    if (!empty($theme->settings->block07crselect)) {
        $sql = $sql." and id IN (". $theme->settings->block07crselect .")";
    }
    $sql = $sql." ORDER BY c.timemodified DESC";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    $allcourses = [];
    $courses = $DB->get_records_sql($sql);
    foreach ($courses as $id => $course) {
        $category = $DB->get_record('course_categories', ['id' => $course->category]);
        if (!empty($category)) {
            $course->categoryName = $category->name;
            $course->categoryId = $category->id;
            $allcourses[$id] = $course;
        }
    };
    $j = 0;
    $sql = "SELECT  en.id, en.courseid, en.cost, en.currency";
    $sql = $sql." FROM {enrol} en";
    $sql = $sql." WHERE en.courseid = :courseid and en.status = 0 and en.cost != 'NULL'";
    $templatecontext['block07priceshow'] = $theme->settings->block07priceshow;
    foreach ($allcourses as $id => $course) {
        $templatecontext['block07'][$j]['fullname'] = format_string($course->fullname);
        $templatecontext['block07'][$j]['shortname'] = format_string($course->shortname);
        $templatecontext['block07'][$j]['summary'] = format_string($course->summary);
        $templatecontext['block07'][$j]['update'] = gmdate("M d,Y", $course->timemodified);
        $templatecontext['block07'][$j]['categoryName'] = format_string($course->categoryName);
        $templatecontext['block07'][$j]['courselink'] = "?course-details=".$id;
        $templatecontext['block07'][$j]['categorylink'] = "course/index.php?categoryid=".$course->categoryId;
        $templatecontext['block07'][$j]['imgurl'] = zuum_get_course_image($id, true);
        $enrol = $DB->get_records_sql($sql, ['courseid' => $id]);
        if (empty($enrol)) {
            $templatecontext['block07'][$j]['currency'] = get_string('block07enrol', 'theme_zuum');
        } else {
            foreach ($enrol as $enrols) {
                $templatecontext['block07'][$j]['cost'] = $enrols->cost;
                $templatecontext['block07'][$j]['currency'] = $enrols->currency;
            };
        }
        $context = context_course::instance($id);
        $role = $theme->settings->block07studentrole;
        $students = get_role_users($role, $context);
        $templatecontext['block07'][$j]['studentscount'] = count($students);
        $role = $theme->settings->block07teacherrole;
        $teachers = get_role_users($role, $context);
        if (!empty($theme->settings->block07teacherenabled)) {
            foreach ($teachers as $id => $teacher) {
                $templatecontext['block07'][$j]['teachername'] = format_string(fullname($teacher));
                $teacher->imagealt = "teacher";
                $templatecontext['block07'][$j]['userpicture'] = $OUTPUT->user_picture($teacher);
                $user = $DB->get_record('user', ['id'  => $teacher->id]);
                $userpicture = new user_picture($user);
                $userpicture->size = 512;
                $url = $userpicture->get_url($PAGE)->out(false);
                $templatecontext['block07'][$j]['userpictureURL'] = $url;
                $templatecontext['block07'][$j]['teacherlink'] = '?teacher-details='. $teacher->id;
            }
        }
        $j++;
        if ($j > $count) {
            break;
        }
    };
    return $templatecontext;
}
/**
 * Front page block 8.
 */
function theme_zuum_frontpageblock08() {
    GLOBAL $CFG, $DB, $OUTPUT, $PAGE;
    $theme = theme_config::load('zuum');
    $templatecontext['block08enabled'] = $theme->settings->block08enabled;
    if (empty($templatecontext['block08enabled'])) {
        return $templatecontext;
    }
    $count = $theme->settings->block08count;
    $templatecontext['block08desing'.$theme->settings->block08desing] = $theme->settings->block08desing;
    $templatecontext['block08slide'] = $theme->settings->block08slide;
    $templatecontext['block08header'] = format_string($theme->settings->block08header);
    $templatecontext['block08caption'] = format_string($theme->settings->block08caption);
    $templatecontext['block08showdescription'] = $theme->settings->block08showdescription;

    $teacherrole = $theme->settings->block08showrole;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." ra.userid, ra.roleid";
    } else {
        $sql = "SELECT ra.userid, ra.roleid";
    }
    $sql = $sql." FROM {role_assignments} ra";
    $sql = $sql." JOIN {context} ctx on ra.contextid = ctx.id";
    $sql = $sql." WHERE ra.roleid = :roleid";
    $sql = $sql." GROUP by ra.userid, ra.roleid";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    // And ctx.contextlevel = '50'?
    if (!empty($theme->settings->block08total)) {
        $courses = get_courses('all', 'c.timemodified DESC');
    }
    $roleassignments = $DB->get_records_sql($sql, ['roleid' => $teacherrole]);
    if (!empty($roleassignments)) {
        $j = 0;
        $coursecount = 0;
        $studentscount = 0;
        foreach ($roleassignments as $roleassignment) {
            if ($user = $DB->get_record('user', ['id' => $roleassignment->userid])) {
                $user->imagealt = "teacher";
                $templatecontext['block08'][$j]['teachername'] = format_string($user->firstname)." ".format_string($user->lastname);
                $templatecontext['block08'][$j]['description'] = format_string($user->description);
                $templatecontext['block08'][$j]['userpicture'] =
                    $OUTPUT->user_picture($user, ['class' => '', 'size' => '250']);
                $templatecontext['block08'][$j]['userURL'] =
                    new moodle_url('/user/profile.php', ['id' => $roleassignment->userid]);
                $userpicture = new user_picture($user);
                $userpicture->size = 512;
                $url = $userpicture->get_url($PAGE)->out(false);
                $templatecontext['block08'][$j]['userpictureURL'] = $url;
                $templatecontext['block08'][$j]['teacherlink'] = '?teacher-details='. $user->id;
            }
            $templatecontext['block08total'] = $theme->settings->block08total;
            if (!empty($templatecontext['block08total'])) {
                foreach ($courses as $id => $course) {
                    $context = context_course::instance($id);
                    $teachers = get_role_users($teacherrole, $context);
                    foreach ($teachers as $id => $teacher) {
                        if ($teacher->username == $user->username) {
                            $coursecount++;
                            $role = $DB->get_field('role', 'id', ['shortname' => 'student']);
                            $students = get_role_users($role, $context);
                            $studentscount = $studentscount + count($students);
                        }
                    }
                }
            }
            $templatecontext['block08'][$j]['coursecount'] = $coursecount;
            $templatecontext['block08'][$j]['studentscount'] = $studentscount;
            $coursecount = 0;
            $studentscount = 0;

            $j = $j + 1;
            if ($j == $theme->settings->block08count) {
                break;
            }
        }
    }
    return $templatecontext;
}
/**
 * Front page block 9.
 */
function theme_zuum_frontpageblock09() {
    GLOBAL $CFG, $DB;
    require_once($CFG->libdir.'/formslib.php');
    $theme = theme_config::load('zuum');
    $templatecontext['block09enabled'] = $theme->settings->block09enabled;
    if (empty($templatecontext['block09enabled'])) {
         return $templatecontext;
    }
    $count = $theme->settings->block09count;
    $templatecontext['block09desing'.$theme->settings->block09desing] = $theme->settings->block09desing;
    $templatecontext['block09slide'] = $theme->settings->block09slide;
    $templatecontext['block09header'] = format_string($theme->settings->block09header);
    $templatecontext['block09caption'] = format_string($theme->settings->block09caption);
    $templatecontext['block09background'] = $theme->settings->block09background;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." id, name, parent, coursecount, visible, depth, path";
    } else {
        $sql = "SELECT id, name, parent, coursecount, visible, depth, path";
    }
    $sql = $sql." FROM {course_categories}";
    $sql = $sql." WHERE coursecount > 0 and visible = 1";
    if (!empty($theme->settings->block09ctselect)) {
        $sql = $sql." and id IN (". $theme->settings->block09ctselect .")";
    }
    $sql = $sql." ORDER BY coursecount DESC";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    $categorys = $DB->get_records_sql($sql, []);
    $exp = explode(',', $theme->settings->block09icon);
    $iconcount = count($exp);
    if (!empty($categorys)) {
        $j = 0;
        foreach ($categorys as $category) {
            $templatecontext['block09'][$j]['catagoryname'] = format_string($category->name);
            $templatecontext['block09'][$j]['coursecount'] = $category->coursecount;
            $templatecontext['block09'][$j]['catagoryURL'] = new moodle_url('/course/index.php?categoryid='. $category->id);
            $templatecontext['block09'][$j]['bgcolor'] = "";
            $templatecontext['block09'][$j]['bgnone'] = "";
            if ($j >= $iconcount ) {
                $templatecontext['block09'][$j]['block09icon'] = isset($exp[0]) ? $exp[0] : null;
            } else {
                $templatecontext['block09'][$j]['block09icon'] = isset($exp[$j]) ? $exp[$j] : null;
            }
            if ($theme->settings->block09background == '0') {
                $templatecontext['block09'][$j]['bgnone'] = true;
            }
            if ($theme->settings->block09background == '1') {
                $templatecontext['block09'][$j]['bgcolor'] = theme_zuum_random_color();
            }
            $templatecontext['block09'][$j]['imgurl'] = "";
            if ($theme->settings->block09background == '2') {
                $courses = get_courses($category->id);
                if (!empty($courses)) {
                    foreach ($courses as $course) {
                        $imgurl = zuum_get_course_image($course->id, true);
                        if (!empty($imgurl)) {
                            $templatecontext['block09'][$j]['imgurl'] = $imgurl;
                            break;
                        }
                    }
                }
            }
            $j++;
            if ($j == $theme->settings->block09count) {
                break;
            }
        }
    }
    return $templatecontext;
}
/**
 * Front page block 10.
 */
function theme_zuum_frontpageblock10() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block10enabled'] = $theme->settings->block10enabled;
    if (empty($templatecontext['block10enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block10desing'.$theme->settings->block10desing] = $theme->settings->block10desing;
    $templatecontext['block10slide'] = $theme->settings->block10slide;
    $templatecontext['block10header'] = format_string($theme->settings->block10header);
    $templatecontext['block10explanation'] = format_string($theme->settings->block10explanation);
    $count = $theme->settings->block10count;

    for ($i = 1 , $j = 0; $i <= $count; $i++, $j++) {
        $templatecontext['block10'][$j]['block10img'] = $OUTPUT->image_url('block10/testimonial-'.$i, 'theme');
    }
    $blockimg = zuum_block_image(6, 1, 'block10img');
    if ($blockimg['count'] > 0) {
        for ($i = 1, $j = 0; $i <= $blockimg['count']; $i++, $j++) {
            $templatecontext['block10'][$j]['block10img'] = $blockimg['blockimg'.$i];
        }
    }

    for ($i = 1, $j = 0; $i <= $count; $i++, $j++) {
        $block10name = "block10name{$i}";
        $block10job = "block10job{$i}";
        $block10caption = "block10caption{$i}";
        $block10title = "block10title{$i}";
        $block10link = "block10link{$i}";
        if ($i == 1) {
            $templatecontext['block10'][$j]['active'] = "1";
        } else {
            $templatecontext['block10'][$j]['active'] = "";
        }
        $templatecontext['block10'][$j]['block10name'] = format_string($theme->settings->$block10name);
        $templatecontext['block10'][$j]['block10job'] = format_string($theme->settings->$block10job);
        $templatecontext['block10'][$j]['block10title'] = format_string($theme->settings->$block10title);
        $templatecontext['block10'][$j]['block10caption'] = format_string($theme->settings->$block10caption);
        $templatecontext['block10'][$j]['block10linkurl'] = format_string($theme->settings->$block10link);
    }
    return $templatecontext;
}
/**
 * Front page block 11.
 */
function theme_zuum_frontpageblock11() {
    // Site blog frontpage.
    global $CFG, $OUTPUT, $DB;
    $theme = theme_config::load('zuum');
    $templatecontext['block11enabled'] = $theme->settings->block11enabled;
    if ($CFG->bloglevel < BLOG_GLOBAL_LEVEL && (!isloggedin() || isguestuser())) {
        $templatecontext['block11enabled'] = "false";
        return $templatecontext;
    }
    if (empty($templatecontext['block11enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block11desing'.$theme->settings->block11desing] = $theme->settings->block11desing;
    $templatecontext['block11header'] = format_string($theme->settings->block11header);
    $templatecontext['block11caption'] = format_string($theme->settings->block11caption);
    $count = $theme->settings->block11count;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." *";
    } else {
        $sql = "SELECT *";
    }
    $sql = $sql." FROM {post} pt";
    if (isloggedin()) {
        $sql = $sql." WHERE pt.publishstate = 'public' or pt.publishstate = 'site'";
    } else {
        $sql = $sql." WHERE pt.publishstate = 'public'";
    }
    $sql = $sql." ORDER BY pt.created DESC";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    $posts = $DB->get_records_sql($sql, []);
    if (!empty($posts)) {
        $j = 0;
        foreach ($posts as $post) {
            $context = context_system::instance();
            $postsummary = file_rewrite_pluginfile_urls($post->summary, 'pluginfile.php',
            $context->id, 'blog', 'post', $post->id);
            $templatecontext['block11'][$j]['subject'] = format_string($post->subject);
            $templatecontext['block11'][$j]['summary'] = format_text($postsummary);
            $templatecontext['block11'][$j]['created'] = gmdate("d,m,Y", $post->created);
            $templatecontext['block11'][$j]['lastmodified'] = gmdate("d/m/Y", $post->lastmodified);
            $templatecontext['block11'][$j]['postURL'] = new moodle_url('/blog/index.php?entryid='. $post->id);
            $templatecontext['block11'][$j]['imgurl'] = zuum_get_blog_post_image($post->id);
            $templatecontext['block11'][$j]['tag'] = $OUTPUT->tag_list(core_tag_tag::get_item_tags('core', 'post', $post->id));
            if ($user = $DB->get_record('user', ['id' => $post->userid])) {
                $templatecontext['block11'][$j]['userpicture'] =
                    $OUTPUT->user_picture($user, ['size' => '25']);
                $templatecontext['block11'][$j]['userURL'] =
                    new moodle_url('/user/profile.php', ['id' => $post->userid]);
                $templatecontext['block11'][$j]['username'] = format_string(fullname($user));
            }
            if ($j == 0) {
                $templatecontext['block11'][$j]['active'] = "1";
            } else {
                $templatecontext['block11'][$j]['active'] = "";
            }
            $by = new stdClass();
            $by->name = fullname($user);
            $by->date = userdate($post->created);
            $templatecontext['block11'][$j]['userdate'] = $OUTPUT->container( $by->date, 'userdate');
            $j++;
        }
    }
    return $templatecontext;
}
/**
 * Front page block 16.
 */
function theme_zuum_frontpageblock16() {
    $theme = theme_config::load('zuum');
    $templatecontext['block16enabled'] = $theme->settings->block16enabled;
    if (empty($templatecontext['block16enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block16title'] = format_string($theme->settings->block16title);
    $templatecontext['block16caption'] = format_text($theme->settings->block16caption, FORMAT_HTML, ['noclean' => true]);
    $templatecontext['block16csslink'] = $theme->settings->block16csslink;
    $templatecontext['block16css'] = $theme->settings->block16css;
    return $templatecontext;
}
/**
 * Front page block 17.
 */
function theme_zuum_frontpageblock17() {
    $theme = theme_config::load('zuum');
    $templatecontext['block17enabled'] = $theme->settings->block17enabled;
    if (empty($templatecontext['block17enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block17title'] = format_string($theme->settings->block17title);
    $templatecontext['block17caption'] = format_text($theme->settings->block17caption, FORMAT_HTML, ['noclean' => true]);
    $templatecontext['block17csslink'] = $theme->settings->block17csslink;
    $templatecontext['block17css'] = $theme->settings->block17css;
    return $templatecontext;
}
/**
 * Front page block 18.
 */
function theme_zuum_frontpageblock18() {
    $theme = theme_config::load('zuum');
    $templatecontext['block18enabled'] = $theme->settings->block18enabled;
    if (empty($templatecontext['block18enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block18title'] = format_string($theme->settings->block18title);
    $templatecontext['block18caption'] = format_text($theme->settings->block18caption, FORMAT_HTML, ['noclean' => true]);
    $templatecontext['block18csslink'] = $theme->settings->block18csslink;
    $templatecontext['block18css'] = $theme->settings->block18css;
    return $templatecontext;
}
/**
 * Front page block 19.
 */
function theme_zuum_frontpageblock19() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['block19enabled'] = $theme->settings->block19enabled;
    if (empty($templatecontext['block19enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block19desing'.$theme->settings->block19desing] = $theme->settings->block19desing;
    $templatecontext['block19slide'] = $theme->settings->block19slide;
    $templatecontext['block19headerenabled'] = $theme->settings->block19headerenabled;
    if (!empty($templatecontext['block19headerenabled'])) {
        $templatecontext['block19header'] = format_string($theme->settings->block19header);
        $templatecontext['block19caption'] = format_string($theme->settings->block19caption);
    }
    $blockimg = zuum_block_image(30, 1, 'block19img');
    if ($blockimg['count'] > 0) {
        $blockimgcount = $blockimg['count'];
        for ($i = 1, $j = 0; $i <= $blockimg['count']; $i++, $j++) {
            if ($i <= $blockimg['count']) {
                $templatecontext['block19'][$j]['block19img'] = $blockimg['blockimg'.$i];
            }
        }
    } else {
        $blockimgcount = 8;
        for ($i = 1 , $j = 0; $i <= 8; $i++, $j++) {
            $templatecontext['block19'][$j]['block19img'] = $OUTPUT->image_url('block19/brands-'.$i, 'theme');
        }
    }

    $exp = explode(',', $theme->settings->block19link);
    $linkcount = count($exp);
    for ($i = 1, $j = 0; $i <= $linkcount; $i++, $j++) {
        if ($i > $blockimgcount) {
            break;
        }
        $templatecontext['block19'][$j]['link'] = isset($exp[$j]) ? $exp[$j] : null;
    }
    return $templatecontext;
}
/**
 * Front page block 20.
 */
function theme_zuum_frontpageblock20() {
    $theme = theme_config::load('zuum');
    $templatecontext['block20nlenabled'] = $theme->settings->block20nlenabled;
    $templatecontext['block20nlheader'] = format_string($theme->settings->block20nlheader);
    $templatecontext['block20nlexplanation'] = format_string($theme->settings->block20nlexplanation);

    $templatecontext['block20enabled'] = $theme->settings->block20enabled;
    if (empty($templatecontext['block20enabled'])) {
        return $templatecontext;
    }
    $templatecontext['block20design'.$theme->settings->block20design] = $theme->settings->block20design;
    $templatecontext['block20moodle'] = $theme->settings->block20moodle;
    $templatecontext['footerbackgroundcolor'] = $theme->settings->footerbackgroundcolor;
    $templatecontext['block20logo'] = false;
    if (!empty($theme->settings->block20logo)) {
        $templatecontext['block20logo'] = $theme->setting_file_url('block20logo', 'block20logo');
    }
    $templatecontext['block20col1header'] = format_string($theme->settings->block20col1header);
    $templatecontext['block20col1caption'] = format_string($theme->settings->block20col1caption);
    $templatecontext['block20col2header'] = format_string($theme->settings->block20col2header);
    $templatecontext['block20col2links'] = theme_zuum_links($theme->settings->block20col2link);
    $templatecontext['block20col3header'] = format_string($theme->settings->block20col3header);
    $templatecontext['block20col3links'] = theme_zuum_links($theme->settings->block20col3link);
    $templatecontext['block20col4header'] = format_string($theme->settings->block20col4header);
    $templatecontext['block20col4links'] = theme_zuum_links($theme->settings->block20col4link);
    $templatecontext['block20col5header'] = format_string($theme->settings->block20col5header);
    $templatecontext['block20col5address'] = format_string($theme->settings->block20col5address);
    $templatecontext['block20col5phone'] = format_text($theme->settings->block20col5phone);
    $templatecontext['block20col5email'] = format_text($theme->settings->block20col5email);
    $templatecontext['block20social'] = $theme->settings->block20social;
    $templatecontext['block20copyright'] = $theme->settings->block20copyright;
    return $templatecontext;
}
