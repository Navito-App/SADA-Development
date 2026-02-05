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
 * Theme zuum page teacher single.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Page 1 Teacher detail.
 *
 * @param int $teacherid teacher id.
 */
function theme_zuum_frontpagepage05($teacherid) {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    $templatecontext['page05s1enabled'] = $theme->settings->page05s1enabled;
    $templatecontext['page05s2enabled'] = $theme->settings->page05s2enabled;
    $templatecontext['page05s2phoneshow'] = $theme->settings->page05s2phoneshow;
    $templatecontext['page05s2emailshow'] = $theme->settings->page05s2emailshow;

    $templatecontext = array_merge($templatecontext, theme_zuum_teacher($teacherid));

    if (empty($theme->settings->page05navbar)) {
        $templatecontext['page05navbar'] = $templatecontext['page05teachername'];
    } else {
        $templatecontext['page05navbar'] = format_string($theme->settings->page05navbar);
    }
    if (empty($theme->settings->page05header)) {
        $templatecontext['page05header'] = $templatecontext['page05teachername'];
    } else {
        $templatecontext['page05header'] = format_string($theme->settings->page05header);
    }
    if (empty($theme->settings->page05caption)) {
        $templatecontext['page05caption'] = $templatecontext['page05description'];
    } else {
        $templatecontext['page05caption'] = format_string($theme->settings->page05caption);
    }
    $img = $theme->setting_file_url('page05img', 'page05img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/teacher/teacher-detail-1', 'theme');
    }
    $templatecontext['page05img'] = $img;
    $templatecontext['page05coursecount'] = theme_zuum_countrecords('course') - 1;
    $templatecontext['page05categorycount'] = theme_zuum_countrecords('course_categories');
    $templatecontext['page05studentcount'] = zuum_reports_course_role_count($theme->settings->page04s2studentrole);
    $templatecontext['page05counterbgimg'] = $OUTPUT->image_url('pages/teacher/counter-bg', 'theme');
    return $templatecontext;
}
