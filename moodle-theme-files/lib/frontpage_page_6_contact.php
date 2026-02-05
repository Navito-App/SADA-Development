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
 * Page 1 about.
 *
 * @param int $id06 null.
 */
function theme_zuum_frontpagepage06($id06 = null) {
    global $OUTPUT;
    $theme = theme_config::load('zuum');
    $templatecontext['sliderenabled'] = false;
    $templatecontext['page06navbar'] = $theme->settings->page06navbar;
    if (empty($theme->settings->page06header)) {
        $templatecontext['page06header'] = get_string('contactus', 'tool_brickfield');
    } else {
        $templatecontext['page06header'] = $theme->settings->page06header;
    }

    $templatecontext['page06caption'] = $theme->settings->page06caption;
    $img = $theme->setting_file_url('page06img', 'page06img');
    if (empty($img)) {
        $img = $OUTPUT->image_url('pages/contact/contact-1', 'theme');
    }
    $templatecontext['page06img'] = $img;

    $templatecontext['page06s1enabled'] = $theme->settings->page06s1enabled;
    if (empty($theme->settings->page06s1header)) {
        $templatecontext['page06s1header'] = get_string('contactus', 'tool_brickfield');
    } else {
        $templatecontext['page06s1header'] = $theme->settings->page06s1header;
    }
    get_string('contactus', 'tool_brickfield');
    $templatecontext['page06s1caption'] = $theme->settings->page06s1caption;
    $templatecontext['page06s1phone'] = $theme->settings->page06s1phone;
    $templatecontext['page06s1email'] = $theme->settings->page06s1email;
    $templatecontext['page06s1caption'] = $theme->settings->page06s1caption;
    $templatecontext['page06s1location'] = $theme->settings->page06s1location;
    $templatecontext['page06s1maplink'] = $theme->settings->page06s1maplink;
    $templatecontext['page06s2enabled'] = $theme->settings->page06s2enabled;
    $templatecontext['page06s2header'] = $theme->settings->page06s2header;

    if (!empty($theme->settings->block19enabled)) {
        $templatecontext = array_merge($templatecontext, theme_zuum_frontpageblock19());
    }

    return $templatecontext;
}
