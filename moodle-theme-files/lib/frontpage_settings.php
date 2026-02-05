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
 * Front page section.
 */
function theme_zuum_frontpage_section() {
    $theme = theme_config::load('zuum');
    $templatecontext['pages'] = false;
    // Generate.
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_all_generate());
    $j = 0;
    for ($i = 1; $i <= 10; $i++) {
        $yap = "frontpagesection1_"."$i";
        if (strlen($theme->settings->$yap) == 1 ) {
            $theme->settings->$yap = "0".$theme->settings->$yap;
        }
        if ($theme->settings->$yap > 0) {
            $templatecontext['say10'][$j]['blockno'.$theme->settings->$yap] = "blockno".$theme->settings->$yap;
            // Front page block initialize.
            $function = "theme_zuum_frontpageblock".$theme->settings->$yap;
            $templatecontext = array_merge($templatecontext, $function());
        } else {
            $templatecontext['say10'][$j]['blockno'.$theme->settings->$yap] = false;
        }
        $j++;
    }
    // Footer.
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock20());
    return $templatecontext;
}
/**
 * Front page section.
 *
 * @param bool $pageid page id.
 * @param int $id course id.
 *
 */
function theme_zuum_frontpage_pages_section($pageid, $id) {
    $theme = theme_config::load('zuum');
    // Generate.
    $templatecontext['pages'] = true;
    $templatecontext['frontpagepage'.$pageid] = true;
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_all_generate());
    // Pages setting.
    $function = "theme_zuum_frontpagepage0".$pageid;
    $templatecontext = array_merge($templatecontext, $function($id));
    $templatecontext['block20enabled'] = $theme->settings->block20enabled;
    if (!empty($theme->settings->block20enabled)) {
        $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock20());
    }

    return $templatecontext;
}
/**
 * Front page section.
 */
function theme_zuum_frontpage_all_generate() {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    // Front page navbar choice?
    $templatecontext['frontpagenavchoice'.$theme->settings->frontpagenavchoice] = $theme->settings->frontpagenavchoice;
    $templatecontext['navbarbackcolor'] = $theme->settings->navbarbackcolor;
    // Navbar logo control.
    $templatecontext['logovar'] = false;
    $templatecontext['compactlogovar'] = false;
    if ($OUTPUT->get_compact_logo_url()) {
        $templatecontext['compactlogovar'] = true;
    }
    if ($OUTPUT->get_logo_url()) {
        $templatecontext['logovar'] = true;
    }
    // Front page navbar logo select.
    switch ($theme->settings->headerlogo) {
        case 'Logo':
            $templatecontext['headerlogo'] = true;
            break;
        case 'Compact logo':
            $templatecontext['headerlogocompact'] = true;
            break;
        case 'None':
            $templatecontext['nonelogo'] = true;
            break;
    }
    if (!empty($theme->settings->frontpagenavlink)) {
        $templatecontext['frontpagenavlink'] = theme_zuum_header_links($theme->settings->frontpagenavlink, false);
        $templatecontext['frontpagenavlink-m'] = theme_zuum_links_mobil($theme->settings->frontpagenavlink);
        // Moodle navbar is used for mobile navbar. See frontpage.php line 73.
        // Function theme_zuum_header_links($theme->settings->frontpagenavlink, true).
    } else {
        $templatecontext['frontpagenavlink'] = "";
    }
    // Front page sections?
    $templatecontext['frontpage'.$theme->settings->frontpagechoice] = $theme->settings->frontpagechoice;
    // Slider.
    $templatecontext = array_merge($templatecontext, theme_zuum_slideshow());
    return $templatecontext;
}
/**
 * Front page course img.
 * @param int $id course id.
 * @param bool $ctrl switch.
 */
function zuum_get_course_image($id, $ctrl) {
    global $CFG, $OUTPUT;
    $url = '';
    require_once( $CFG->libdir . '/filelib.php' );
    $context = context_course::instance( $id );
    $fs = get_file_storage();
    $files = $fs->get_area_files( $context->id, 'course', 'overviewfiles', 0 );
    foreach ($files as $f) {
        if ($f->is_valid_image()) {
            $url = moodle_url::make_pluginfile_url( $f->get_contextid(),
                $f->get_component(), $f->get_filearea(), null, $f->get_filepath(), $f->get_filename(), false );
        }
    }
    if (empty($url) && $ctrl) {
        $url = $OUTPUT->get_generated_image_for_id($id);
    }
    return $url;
}
/**
 * Front page post img.
 * @param int $id post id.
 */
function zuum_get_blog_post_image($id) {
    global $CFG;
    $url = '';
    require_once( $CFG->libdir . '/filelib.php' );
    $syscontext = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($syscontext->id, 'blog', 'attachment', $id);
    foreach ($files as $f) {
        if ($f->is_valid_image()) {
            $url = moodle_url::make_pluginfile_url( $f->get_contextid(),
                $f->get_component(), $f->get_filearea(), $id, $f->get_filepath(), $f->get_filename(), false );
        }
    }
    return $url;
}
/**
 * Front page user img.
 * @param int $id user id.
 */
function zuum_get_user_image($id) {
    global $CFG;
    $url = '';
    require_once( $CFG->libdir . '/filelib.php' );
    $context = context_user::instance( $id );
    $fs = get_file_storage();
    $files = $fs->get_area_files( $context->id, 'user', 'icon', 'zuum', false);
    foreach ($files as $f) {
        if ($f->is_valid_image()) {
            $url = moodle_url::make_pluginfile_url( $f->get_contextid(), $f->get_component(),
                $f->get_filearea(), null, $f->get_filepath(), $f->get_filename(), false );
        }
    }
    return $url;
}
/**
 * Front page user img.
 * @param int $count counter.
 * @param int $contextid context.
 * @param string $img image name.
 */
function zuum_block_image($count, $contextid, $img) {
    $blockimg['count'] = 0;
    $fs = get_file_storage();
    $files = $fs->get_area_files($contextid, 'theme_zuum', $img, 0 );
    $i = 1;
    foreach ($files as $f) {
        if ($i > $count) {
            break;
        }
        if ($f->is_valid_image()) {
            $blockimg['blockimg'.$i] = moodle_url::make_pluginfile_url( $f->get_contextid(),
                $f->get_component(), $f->get_filearea(), -1, $f->get_filepath(), $f->get_filename(), false );
            $blockimg['count'] = $i;
            ++$i;
        }
    }
    return $blockimg;
}

/**
 * Front page category name.
 * @param int $id category id.
 */
function theme_zuum_frontpageblockcategory($id) {
    GLOBAL  $DB;
    $categoryname = "";
    $category = $DB->get_record('course_categories', ['id' => $id]);
    if (!empty($category)) {
        $categoryname = $category->name;
    }
    return $categoryname;
}
/**
 * Front page links.
 *
 * @param string $links theme link footer.
 *
 */
function theme_zuum_links($links) {
    $weblink = $links;
    $content = "";
    $target = "_self";
    $websettings = explode("\n", $weblink);
    foreach ($websettings as $key => $settingval) {
        if (!empty(trim($settingval))) {
            $expset = explode("|", $settingval);
            $target = "_self";
            $lurl = "#";
            $ltxt = "";
            $lang = current_language();
            $langcnt = false;
            if (isset($expset[3]) && !empty($expset[3]) ) {
                if ( trim($lang) == trim($expset[3])) {
                    $langcnt = true;
                }
            } else {
                $langcnt = true;
            }
            if ($langcnt) {
                if (isset($expset[0]) && isset($expset[1]) && isset($expset[4])) {
                    if (isset($expset[1]) && !empty($expset[1])) {
                        list($ltxt, $lurl, $comment, $lang, $target) = $expset;
                    }
                    $target = trim($target);
                    if ($target == "_self" || $target == "_blank" || $target == "_parent" || $target == "_top") {
                        $target = trim($target);
                    } else {
                        $target = "_self";
                    }
                } else if (isset($expset[0]) && isset($expset[1])) {
                    list($ltxt, $lurl) = $expset;
                } else {
                    $ltxt = $expset[0];
                    $lurl = "#";
                }
                $ltxt = trim($ltxt);
                $lurl = trim($lurl);
                if (empty($ltxt)) {
                    continue;
                }
                $content .= '<li class="nav-item mb-3">';
                $content .= '<a class="nav-link p-0" href="'.$lurl.'" target="'.$target.'">';
                $content .= '<span class="item-icon"><i class="fa-solid fa-chevron-right"></i></span>';
                $content .= '<span class="item-name">'.$ltxt.'</span>';
                $content .= '</a></li>';
            }
        }
    }
    return $content;
}
/**
 * Front page links.
 *
 * @param string $links header link.
 * @param string $mobil header mobil.
 *
 */
function theme_zuum_header_links($links, $mobil) {
    $weblink = trim($links);
    $content = "";
    $lurl = "";
    $ltxt = "";
    $i = 0;
    $websettings = explode("\n", $weblink);
    if ($mobil) {
        $content .= "<div class= 'hynavbar-nav'>";
    } else {
        $content .= "<div class= 'navbar-nav'>";
    }
    foreach ($websettings as $key => $settingval) {
        if (!empty(trim($settingval))) {
            $expset = explode("|", $settingval);
            $j = uniqid();
            $lang = current_language();
            $langcnt = false;
            if (isset($expset[3]) && !empty($expset[3]) ) {
                if ( trim($lang) == trim($expset[3])) {
                    $langcnt = true;
                }
            } else {
                $langcnt = true;
            }
            if ($langcnt) {
                if (isset($expset[0]) && !empty($expset[0]) ) {
                    if (substr($expset[0], 0, 1) <> "-") {
                        if ($i != 0) {
                            $content .= "</div></div>";
                        }
                        $ltxt = trim($expset[0]);
                        $blank = "_self";
                        if (isset($expset[4])) {
                            $blank = trim($expset[4]);
                        }
                        if (isset($expset[1]) && !empty($expset[1])) {
                            $lurl = trim($expset[1]);
                            $content .= "<div class='nav-item'>";
                            $content .= "<a class='nav-item nav-link' href='".$lurl."' target='".$blank."'>".$ltxt."</a><div>";
                        } else {
                            $content .= "<div class='dropdown nav-item pe-1' id='dropdown-custom-".$j."'>";
                            $content .= "<a class='dropdown-toggle nav-link' id='drop-down-".$j."' data-bs-toggle='dropdown' ";
                            $content .= "aria-haspopup='true' aria-expanded='false' href='#' title='".$ltxt."' ";
                            $content .= "aria-controls='drop-down-menu-".$j."'>".$ltxt."</a>";
                            $content .= "<div class='dropdown-menu' role='menu'
                                    id='drop-down-menu-".$j."' aria-labelledby='drop-down-".$j."'>";
                        }
                    } else {
                        $blank = "_self";
                        if (isset($expset[4])) {
                            $blank = trim($expset[4]);
                        }
                        if (empty($expset[1])) {
                            $expset[1] = "#";
                        }
                        if (isset($expset[1])) {
                            list($ltxt, $lurl) = $expset;
                            $ltxt = trim(substr($ltxt, 1, strlen($ltxt)));
                            $lurl = trim($lurl);
                            $content .= "<a class='dropdown-item' role='menuitem'
                                    href='".$lurl."' target='".$blank."'  title='".$ltxt. "'>".$ltxt."</a>";
                        }
                    }
                } else {
                    $ltxt = $expset[0];
                }
                $i++;
            }
        }
    }
    $content .= "</div></div>";
    $content .= "</div>";
    return $content;
}
/**
 * Theme header links.
 *
 * @param string $links theme header links.
 */
function theme_zuum_links_mobil($links) {
    $weblink = trim($links);
    $content = "";
    $lurl = "";
    $ltxt = "";
    $i = 0;
    $websettings = explode("\n", $weblink);
    foreach ($websettings as $settingval) {
        if (!empty(trim($settingval))) {
            $expset = explode("|", $settingval);
            $lang = current_language();
            $langcnt = false;
            if (isset($expset[3]) && !empty($expset[3]) ) {
                if ( trim($lang) == trim($expset[3])) {
                    $langcnt = true;
                }
            } else {
                $langcnt = true;
            }
            if ($langcnt) {
                if (isset($expset[0]) && !empty($expset[0]) ) {
                    if (substr($expset[0], 0, 1) <> "-") {
                        if ($i != 0) {
                            $content .= "</ul></li>";
                        }
                        $ltxt = trim($expset[0]);
                        $blank = "_self";
                        if (isset($expset[4])) {
                            $blank = trim($expset[4]);
                        }
                        if (isset($expset[1]) && !empty($expset[1])) {
                            $lurl = trim($expset[1]);
                            $content .= "<li class='menu-item menu-item-has-children'>";
                            $content .= "<a href='".$lurl."' target='".$blank."'>".$ltxt."</a>";
                            $content .= "<ul class='sub-menu'>";
                        } else {
                            $content .= "<li class='menu-item menu-item-has-children'>";
                            $content .= "<a href='#'>".$ltxt."</a>";
                            $content .= "<ul class='sub-menu'>";
                        }
                    } else {
                        $blank = "_self";
                        if (isset($expset[4])) {
                            $blank = trim($expset[4]);
                        }
                        if (empty($expset[1])) {
                            $expset[1] = "#";
                        }
                        if (isset($expset[1])) {
                            list($ltxt, $lurl) = $expset;
                            $ltxt = trim(substr($ltxt, 1, strlen($ltxt)));
                            $lurl = trim($lurl);
                            $content .= "<li class='menu-item'>";
                            $content .= "<a href='".$lurl."' target='".$blank."' title='".$ltxt. "'>".$ltxt."</a>";
                            $content .= "</li>";
                        }
                    }
                } else {
                    $ltxt = $expset[0];
                }
                $i++;
            }
        }
    }
    if ($i != 0) {
        $content .= "</ul>";
    }
    return $content;
}
/**
 * Front page theme random color.
 */
function theme_zuum_random_color() {
    /*
    * Any of the following methods can be used to find random color.
    * $randcolor = "#".str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);.
    * $randcolor = "#".substr(md5(rand()), 0, 6);.
    * $randcolor = '#'.substr(str_shuffle('ABCDEF0123456789'), 0, 6);.
    */
    $randcolor = "rgba(".rand(0, 255).", ".rand(50, 255).", ".rand(25, 255).", 0.3)";
    return $randcolor;
}
/**
 * Front site css create.
 *
 */
function zuum_body_css() {
    // Create font change css.
    global $PAGE;
    if (zuum_read_css()) {
        zuum_delete_css();
        zuum_create_css();
        $PAGE->requires->css('/pluginfile.php/1/theme_zuum/css/0/zuum-dynamic.css');
    } else {
        zuum_create_css();
        $PAGE->requires->css('/pluginfile.php/1/theme_zuum/css/0/zuum-dynamic.css');
    }
}
/**
 * Front site css create.
 *
 */
function zuum_create_css() {
    $fs = get_file_storage();
    $theme = theme_config::load('zuum');
    // Prepare file record object.
    $fileinfo = [
        'contextid' => 1,
        'component' => 'theme_zuum',
        'filearea' => 'css',
        'itemid' => 0,
        'filepath' => '/',
        'filename' => 'zuum-dynamic.css', ];
    $text = "";
    // Create file containing text.

    if (!empty($theme->settings->fontimport)) {
        $text .= $theme->settings->fontimport;
    } else {
        $text .= "@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap');". PHP_EOL;
    }
    $text .= "body { ". PHP_EOL;
    if (!empty($theme->settings->fontfamily)) {
        $text .= "font-family:".$theme->settings->fontfamily.PHP_EOL;
        $text .= "--font-family:".$theme->settings->fontfamily.PHP_EOL;
        $text .= "--bs-body-font-family:".$theme->settings->fontfamily.PHP_EOL;
    } else {
        $text .= "font-family: Barlow,sans-serif;". PHP_EOL;;
        $text .= "--font-family: Barlow,sans-serif;". PHP_EOL;
        $text .= "--bs-body-font-family: Barlow,sans-serif;". PHP_EOL;
    }
    if (!empty($theme->settings->fpbackcolor)) {
        $text .= "--color-dl-bg-black: ".$theme->settings->fpbackcolor." !important;".PHP_EOL;
    }
    if (!empty($theme->settings->navbarbackcolor)) {
        $text .= "--zm-navbar-bg-color: ".$theme->settings->navbarbackcolor." !important;".PHP_EOL;
    }
    if (!empty($theme->settings->navbarlinkcolor)) {
        $text .= "--zm-navbar-color: ".$theme->settings->navbarlinkcolor." !important;".PHP_EOL;
        $text .= "--zm-navbar-link-color: ".$theme->settings->navbarlinkcolor." !important;".PHP_EOL;
    }
    if (!empty($theme->settings->navbarlinkhovercolor)) {
        $text .= "--zm-navbar-hover-color: ".$theme->settings->navbarlinkhovercolor." !important;".PHP_EOL;
    }
    if (!empty($theme->settings->brandcolor)) {
        $text .= "--zm-navbar-brand-color: ".$theme->settings->brandcolor." !important;".PHP_EOL;
    }
    if (!empty($theme->settings->footerbackgroundcolor)) {
        $text .= "--zm-footer-bg-color: ".$theme->settings->footerbackgroundcolor." !important;".PHP_EOL;
    }
    $text .= " } ". PHP_EOL;
    if (!empty($text)) {
        $fs->create_file_from_string($fileinfo, $text);
    }

}
/**
 * Front site css read.
 *
 */
function zuum_read_css() {
    global $CFG;
    $fs = get_file_storage();
    // Prepare file record object.
    $fileinfo = [
        'component' => 'theme_zuum',
        'filearea' => 'css',
        'itemid' => 0,
        'contextid' => 1,
        'filepath' => '/',
        'filename' => 'zuum-dynamic.css', ];

    // Get file.
    $file = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'],
                        $fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);
    $context = $fileinfo['contextid'];
    $component = $fileinfo['component'];
    $filearea = $fileinfo['filearea'];
    $itemid = $fileinfo['itemid'];
    $filename = $fileinfo['filename'];
    $url = moodle_url::make_file_url("$CFG->wwwroot/pluginfile.php", "/$context/$component/$filearea/$itemid/$filename");
    $url = preg_replace('|^https?://|i', '//', $url->out(false));
    // Read contents.
    if ($file) {
        return $url;
    } else {
        // File doesn't exist - do something.
        return false;
    }
}
/**
 * Front site css delete.
 *
 */
function zuum_delete_css() {
    $fs = get_file_storage();

    // Prepare file record object.
    $fileinfo = [
        'component' => 'theme_zuum',
        'filearea' => 'css',
        'itemid' => 0,
        'contextid' => 1,
        'filepath' => '/',
        'filename' => 'zuum-dynamic.css', ];

    // Get file.
    $file = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'],
            $fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);

    // Delete it if it exists.
    if ($file) {
        $file->delete();
        return true;
    }
}

/**
 * Teacher and teacher detail page.
 * @param int $teacherid teacher.
 */
function theme_zuum_teacher($teacherid = null) {
    GLOBAL $CFG, $DB, $OUTPUT, $PAGE;
    $theme = theme_config::load('zuum');
    $teacherrole = $theme->settings->page04s2showrole;
    $studentrole = $theme->settings->page04s2studentrole;
    $count = $theme->settings->page04count;
    $templatecontext['page04count'] = $count;
    // SQL Server.
    if ($CFG->dbtype === 'sqlsrv') {
        $sql = "SELECT TOP ". $count ." ra.userid, ra.roleid";
    } else {
        $sql = "SELECT ra.userid, ra.roleid";
    }
    $sql = $sql." FROM {role_assignments} ra";
    $sql = $sql." JOIN {context} ctx on ra.contextid = ctx.id";
    $sql = $sql." WHERE ra.roleid = :roleid";
    if (!empty($theme->settings->page04s2teacherid)) {
        $sql = $sql." and ra.userid in (".$theme->settings->page04s2teacherid.")";
    } else if (!empty($teacherid)) {
        $sql = $sql." and ra.userid in (".$teacherid.")";
    }
    $sql = $sql." GROUP by ra.userid, ra.roleid";
    if ($CFG->dbtype != 'sqlsrv') {
        $sql = $sql." LIMIT ". $count;
    }
    if (!empty($theme->settings->page04s2total)) {
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
                $templatecontext['page04s2'][$j]['teachername'] = format_string($user->firstname." ".$user->lastname);
                $templatecontext['page05teachername'] = format_string($user->firstname." ".$user->lastname);
                $templatecontext['page04s2'][$j]['description'] = format_string($user->description);
                $templatecontext['page05description'] = format_string($user->description);
                $templatecontext['page04s2'][$j]['phone1'] = $user->phone1;
                $templatecontext['page04s2'][$j]['email'] = $user->email;
                $templatecontext['page04s2'][$j]['country'] = $user->country;
                $templatecontext['page04s2'][$j]['userpicture'] =
                    $OUTPUT->user_picture($user, ['class' => '', 'size' => '250']);
                $templatecontext['page04s2'][$j]['userURL'] =
                    new moodle_url('/user/profile.php', ['id' => $user->id]);
                $templatecontext['page04s2'][$j]['teacherlink'] = '?teacher-details='. $user->id;
                $userpicture = new user_picture($user);
                $userpicture->size = 512;
                $url = $userpicture->get_url($PAGE)->out(false);
                $templatecontext['page04s2'][$j]['userpictureURL'] = $url;
                $templatecontext['page05userpicture'] = $url;
            }
            $templatecontext['page04s2total'] = $theme->settings->page04s2total;
            if (!empty($templatecontext['page04s2total'])) {
                foreach ($courses as $course) {
                    $context = context_course::instance($course->id);
                    $teachers = get_role_users($teacherrole, $context);
                    foreach ($teachers as $teacher) {
                        if ($teacher->username == $user->username) {
                            $coursecount++;
                            $role = $DB->get_field('role', 'id', ['id' => $studentrole]);
                            $students = get_role_users($role, $context);
                            $studentscount = $studentscount + count($students);
                        }
                    }
                }
            }
            $templatecontext['page04s2'][$j]['coursecount'] = $coursecount;
            $templatecontext['page04s2'][$j]['studentscount'] = $studentscount;
            $coursecount = 0;
            $studentscount = 0;
            // Teacher other area.
            $otherareas = zuum_otherareas_ready($roleassignment->userid);
            if (!empty($otherareas)) {
                $templatecontext['page04s2'][$j]['job'] = $otherareas['job'];
                for ($k = 1; $k <= $otherareas['count']; $k++) {
                    $templatecontext['page04s2'][$j][$otherareas['shortname'.$k]."link"] = $otherareas['link'.$k];
                    $templatecontext['page04s2'][$j][$otherareas['shortname'.$k]] = $otherareas['socialmedia'.$k];
                }
                $templatecontext['yessocial'] = $otherareas['yessocial'];
                for ($k = 1; $k <= $otherareas['socialcount']; $k++) {
                    $templatecontext['page04s2'][$j]['socialicon'.$k] = $otherareas['socialicon'.$k];
                    $templatecontext['page04s2'][$j]['sociallink'.$k] = $otherareas['sociallink'.$k];
                }
                $templatecontext['yesskill'] = $otherareas['yesskill'];
                for ($k = 1; $k <= $otherareas['skillcount']; $k++) {
                    $templatecontext['page04s2'][$j]['skillname'.$k] = $otherareas['skillname'.$k];
                    $templatecontext['page04s2'][$j]['skillvalue'.$k] = $otherareas['skillvalue'.$k];
                }
            }
            $j = $j + 1;
            if ($j == $count) {
                break;
            }
        }
    }
    return $templatecontext;
}
/**
 * Front site css delete.
 *
 * @param int $userid user.
 */
function zuum_otherareas_ready($userid) {
    GLOBAL $DB;
    $sql = "SELECT  usdata.*, usfield.shortname";
    $sql = $sql." FROM {user_info_data} usdata";
    $sql = $sql." JOIN {user_info_field} usfield ON usdata.fieldid = usfield.id";
    $sql = $sql." WHERE usdata.userid = ". $userid;
    $otherfield = $DB->get_records_sql($sql);
    $otherareas = [];
    $otherareas['count'] = 0;
    $otherareas['skillcount'] = 0;
    $otherareas['yesskill'] = false;
    $otherareas['socialcount'] = 0;
    $otherareas['yessocial'] = false;
    $otherareas['job'] = "";
    if (!empty($otherfield)) {
        $k = 1;
        foreach ($otherfield as $otherarea) {
            if (!empty($otherarea->data)) {
                if ($otherarea->shortname == 'zuum_user_job' ) {
                    $otherareas['job'] = $otherarea->data;
                } else if ($otherarea->shortname == 'zuum_social_media') {
                    if (!empty($otherarea->data)) {
                        $expset = explode(';', format_string($otherarea->data));
                        foreach ($expset as $x => $val) {
                            $exp = explode(',', $val);
                            if (isset($exp[0])) {
                                $otherareas['socialcount'] = $x + 1;
                                $socialmedia = theme_zuum_param(trim($exp[0], " "));
                                $otherareas['socialicon'.$otherareas['socialcount']] = $socialmedia;
                                $otherareas['sociallink'.$otherareas['socialcount']] = trim($exp[1], " ");
                                $otherareas['yessocial'] = true;
                            }
                        }
                    }
                } else if ( $otherarea->shortname == 'zuum_skills') {
                    if (!empty($otherarea->data)) {
                        $expset = explode(';', format_string($otherarea->data));
                        foreach ($expset as $x => $val) {
                            $exp = explode(',', $val);
                            if (isset($exp[0])) {
                                $otherareas['skillcount'] = $x + 1;
                                $otherareas['skillname'.$otherareas['skillcount']] = $exp[0];
                                $otherareas['skillvalue'.$otherareas['skillcount']] = $exp[1];
                                $otherareas['yesskill'] = true;
                            }
                        }

                    }
                }
            }
        }
    }
    return $otherareas;
}
/**
 * Front course custom field.
 *
 * @param string $shortname name.
 * @param int $courseid course.
 *
 */
function theme_zuum_course_customfield($shortname = null, $courseid = null) {
    GLOBAL  $DB;
    $ccfd = "";
    $sql = "SELECT  cfd.*, cff.shortname";
    $sql = $sql." FROM {customfield_field} cff";
    $sql = $sql." JOIN {customfield_data} cfd ON cfd.fieldid = cff.id";
    $sql = $sql." WHERE cff.shortname = '$shortname'";
    $sql = $sql." AND cfd.instanceid = $courseid";
    $cfd = $DB->get_records_sql($sql);
    foreach ($cfd as $cfds) {
        $ccfd = $cfds->value;
    }
    return $ccfd;
}
