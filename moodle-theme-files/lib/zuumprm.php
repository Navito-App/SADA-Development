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
 * Language file.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 // Block 8 social media.
/**
 * Table count records.
 *
 * @param string $param icon.
 *
 */
function theme_zuum_param($param = null) {
    $zuumprm = [
        'facebook' => 'fa-brands fa-facebook-f',
        'twitter' => 'fa-brands fa-twitter',
        'instagram' => 'fa-brands fa-instagram',
        'linkedin' => 'fa-brands fa-linkedin-in',
        'youtube' => 'fa-brands fa-youtube',
        'pinterest' => 'fa-brands fa-pinterest-p',
        'dribbble' => 'fa-brands fa-dribbble',
        'email' => 'far fa-envelope',
        'medium' => 'fa-brands fa-medium',
        'figma' => 'fa-brands fa-figma',
        'snapchat' => 'fa-brands fa-snapchat',
        'github' => 'fa-brands fa-github',
        'whatsapp' => 'fa-brands fa-whatsapp',
        'telegram' => 'fa-brands fa-telegram',
        'underline' => '<div style="margin-bottom: 10px; border-bottom:1px solid #bbb;width:100%;"></div><br>',
    ];
    if (isset($zuumprm[$param])) {
        return $zuumprm[$param];
    }
    return false;
}
