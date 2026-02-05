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
 * Theme front page slider file.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themesalmond.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Front page slider.
 */
function theme_zuum_slideshow() {
    global $OUTPUT;

    $theme = theme_config::load('zuum');

    $templatecontext['sliderenabled'] = $theme->settings->sliderenabled;
    if (empty($templatecontext['sliderenabled'])) {
        return $templatecontext;
    }
    $slidercount = $theme->settings->slidercount;
    $templatecontext['progress'] = true;
    if ($slidercount == 1) {
        $templatecontext['progress'] = false;
    }
    $templatecontext['slideautoplay'] = $theme->settings->slideautoplay;
    $templatecontext['slidepagination'] = $theme->settings->slidepagination;
    $templatecontext['slider'.$theme->settings->sliderdesing] = $theme->settings->sliderdesing;

    for ($i = 1, $j = 0; $i <= $slidercount; $i++, $j++) {
        $sliderimage = "sliderimage{$i}";
        $sliderbgcolor = "sliderbgcolor{$i}";
        $sliderheader = "sliderheader{$i}";
        $sliderheadercolor = "sliderheadercolor{$i}";
        $slidertitle = "slidertitle{$i}";
        $slidertitlecolor = "slidertitlecolor{$i}";
        $slidercap = "slidercap{$i}";
        $sliderbutton = "sliderbutton{$i}";
        $sliderurl = "sliderurl{$i}";
        $sliderbutton2 = "sliderbutton2{$i}";
        $sliderurl2 = "sliderurl2{$i}";

        $templatecontext['slides'][$j]['key'] = $j;
        $templatecontext['slides'][$j]['keyplus'] = $j + 1;
        $templatecontext['slides'][$j]['keyname'] = get_string('slide', 'theme_zuum');
        $templatecontext['slides'][$j]['active'] = false;
        $image = $theme->setting_file_url($sliderimage, $sliderimage);
        $imagedraft = "";
        if (empty($image)) {
            $image = $OUTPUT->image_url('slider/'.$i, 'theme');
        }
        $templatecontext['slides'][$j]['image'] = $image;
        $templatecontext['slides'][$j]['bgcolor'] = $theme->settings->$sliderbgcolor;
        $templatecontext['slides'][$j]['header'] = format_string($theme->settings->$sliderheader);
        $templatecontext['slides'][$j]['headercolor'] = $theme->settings->$sliderheadercolor;
        $templatecontext['slides'][$j]['title'] = format_string($theme->settings->$slidertitle);
        $templatecontext['slides'][$j]['titlecolor'] = $theme->settings->$slidertitlecolor;
        $templatecontext['slides'][$j]['caption'] = format_text($theme->settings->$slidercap);
        $templatecontext['slides'][$j]['button'] = format_string($theme->settings->$sliderbutton);
        $templatecontext['slides'][$j]['buttonurl'] = format_string($theme->settings->$sliderurl);
        $templatecontext['slides'][$j]['button2'] = format_string($theme->settings->$sliderbutton2);
        $templatecontext['slides'][$j]['buttonurl2'] = format_string($theme->settings->$sliderurl2);
        if ($i === 1) {
            $templatecontext['slides'][$j]['active'] = true;
        }
    }
    return $templatecontext;
}
