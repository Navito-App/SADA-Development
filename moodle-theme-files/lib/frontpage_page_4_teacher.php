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
 * Theme zuum page teacher.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Page 1 teacher.
 *
 * @param int $id04 null.
 */
function theme_zuum_frontpagepage04($id04 = null) {
    GLOBAL $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    $templatecontext['page04navbar'] = format_string($theme->settings->page04navbar);
    $templatecontext['page04header'] = format_string($theme->settings->page04header);
    $templatecontext['page04caption'] = format_string($theme->settings->page04caption);
    $img = $theme->setting_file_url('page04img', 'page04img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/teacher/teacher-1', 'theme');
    }
    $templatecontext['page04img'] = $img;
    // Section 1 iconbox.
    $templatecontext['page04s1enabled'] = $theme->settings->page04s1enabled;
    $templatecontext['page04s1headline'] = format_string($theme->settings->page04s1headline);
    $templatecontext['page04s1title'] = format_string($theme->settings->page04s1title);
    for ($i = 1, $j = 0; $i <= 3; $i++, $j++) {
        $page04s1header = "page04s1header{$i}";
        $page04s1caption = "page04s1caption{$i}";
        $page04s1button = "page04s1button{$i}";
        $page04s1buttonlink = "page04s1buttonlink{$i}";

        $templatecontext['page04s1'][$j]['header'] = format_string($theme->settings->$page04s1header);
        $templatecontext['page04s1'][$j]['caption'] = format_string($theme->settings->$page04s1caption);
        $templatecontext['page04s1'][$j]['button'] = format_string($theme->settings->$page04s1button);
        $templatecontext['page04s1'][$j]['link'] = $theme->settings->$page04s1buttonlink;
    }
    // Section 2 teachers.
    $templatecontext['page04s2header'] = format_string($theme->settings->page04s2header);
    $templatecontext['page04s2caption'] = format_string($theme->settings->page04s2caption);
    $templatecontext = array_merge($templatecontext, theme_zuum_teacher());
    // Section 3 Brands.
    if (empty($theme->settings->page04s3enabled)) {
        $theme->settings->block19enabled = "";
    }
    if (!empty($theme->settings->block19enabled)) {
        $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock19());
    }
    return $templatecontext;
}
