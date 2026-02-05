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
 * Theme zuum page about.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Page 1 about.
 *
 * @param int $id01 null.
 */
function theme_zuum_frontpagepage01($id01 = null) {
    GLOBAL $CFG, $DB, $OUTPUT, $PAGE;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    $templatecontext['page01navbar'] = format_string($theme->settings->page01navbar);
    $templatecontext['page01header'] = format_string($theme->settings->page01header);
    $templatecontext['page01caption'] = format_string($theme->settings->page01caption);
    $img = $theme->setting_file_url('page01img', 'page01img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/about/about-2', 'theme');
    }
    $templatecontext['page01img'] = $img;
    // Section 1 about.
    $templatecontext['page01s1header'] = format_string($theme->settings->page01s1header);
    $templatecontext['page01s1title'] = format_string($theme->settings->page01s1title);
    $templatecontext['page01s1caption'] = format_string($theme->settings->page01s1caption);
    $templatecontext['page01s1subtitle1'] = format_string($theme->settings->page01s1subtitle1);
    $templatecontext['page01s1subdefinition1'] = format_string($theme->settings->page01s1subdefinition1);
    $templatecontext['page01s1subtitle2'] = format_string($theme->settings->page01s1subtitle2);
    $templatecontext['page01s1subdefinition2'] = format_string($theme->settings->page01s1subdefinition2);
    $templatecontext['page01s1button'] = format_string($theme->settings->page01s1button);
    $templatecontext['page01s1buttonlink'] = $theme->settings->page01s1buttonlink;
    $img = $theme->setting_file_url('page01s1img', 'page01s1img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/about/about-1', 'theme');
    }
    $templatecontext['page01s1img'] = $img;
    // Section 2 iconbox.
    $templatecontext['page01s2headline'] = format_string($theme->settings->page01s2headline);
    $templatecontext['page01s2title'] = format_string($theme->settings->page01s2title);
    for ($i = 1, $j = 0; $i <= 3; $i++, $j++) {
        $page01s2header = "page01s2header{$i}";
        $page01s2caption = "page01s2caption{$i}";
        $page01s2button = "page01s2button{$i}";
        $page01s2buttonlink = "page01s2buttonlink{$i}";

        $templatecontext['page01s2'][$j]['header'] = format_string($theme->settings->$page01s2header);
        $templatecontext['page01s2'][$j]['caption'] = format_string($theme->settings->$page01s2caption);
        $templatecontext['page01s2'][$j]['button'] = format_string($theme->settings->$page01s2button);
        $templatecontext['page01s2'][$j]['link'] = $theme->settings->$page01s2buttonlink;
    }
    // Section 3 teachers.
    $templatecontext['page01s3header'] = format_string($theme->settings->page01s3header);
    $templatecontext['page01s3caption'] = format_string($theme->settings->page01s3caption);
    $teacherrole = $theme->settings->page01s3showrole;
    $count = 3;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." ra.userid, ra.roleid";
    } else {
        $sql = "SELECT ra.userid, ra.roleid";
    }
    $sql = $sql." FROM {role_assignments} ra";
    $sql = $sql." JOIN {context} ctx on ra.contextid = ctx.id";
    $sql = $sql." WHERE ra.roleid = :roleid";
    if (!empty($theme->settings->page01s3teacherid)) {
        $sql = $sql." and ra.userid in (".$theme->settings->page01s3teacherid.")";
    }
    $sql = $sql." GROUP by ra.userid, ra.roleid";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    // And ctx.contextlevel = '50'?
    if (!empty($theme->settings->page01s3total)) {
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
                $templatecontext['page01s3'][$j]['teachername'] = format_string($user->firstname." ".$user->lastname);
                $templatecontext['page01s3'][$j]['description'] = format_string($user->description);
                $templatecontext['page01s3'][$j]['userpicture'] =
                    $OUTPUT->user_picture($user, ['class' => '', 'size' => '250']);
                $templatecontext['page01s3'][$j]['userURL'] =
                    new moodle_url('/user/profile.php', ['id' => $user->id]);
                $templatecontext['page01s3'][$j]['teacherlink'] = '?teacher-details='. $user->id;
                $userpicture = new user_picture($user);
                $userpicture->size = 512;
                $url = $userpicture->get_url($PAGE)->out(false);
                $templatecontext['page01s3'][$j]['userpictureURL'] = $url;
            }
            $templatecontext['page01s3total'] = $theme->settings->page01s3total;
            if (!empty($templatecontext['page01s3total'])) {
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
            $templatecontext['page01s3'][$j]['coursecount'] = $coursecount;
            $templatecontext['page01s3'][$j]['studentscount'] = $studentscount;
            $coursecount = 0;
            $studentscount = 0;
            // Teacher other area.
            $otherareas = zuum_otherareas_ready($roleassignment->userid);
            if (!empty($otherareas)) {
                $templatecontext['page01s3'][$j]['job'] = $otherareas['job'];
                $templatecontext['yessocial'] = $otherareas['yessocial'];
                for ($k = 1; $k <= $otherareas['socialcount']; $k++) {
                    $templatecontext['page01s3'][$j]['socialicon'.$k] = $otherareas['socialicon'.$k];
                    $templatecontext['page01s3'][$j]['sociallink'.$k] = $otherareas['sociallink'.$k];
                }
            }
            $j = $j + 1;
            if ($j == $count) {
                break;
            }
        }
    }

    // Titlebox.
    if (!empty($theme->settings->block01enabled)) {
        $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock01());
    }
    // Brands.
    if (!empty($theme->settings->block19enabled)) {
        $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock19());
    }
    return $templatecontext;
}
