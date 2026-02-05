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
 * A drawer based layout for the zuum theme.
 *
 * @package   theme_zuum
 * @copyright 2024 Hüseyin Yemen
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
$theme = theme_config::load('zuum');
// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
    $userlogin = true;
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
    $userlogin = false;
}

if (defined('BEHAT_SITE_RUNNING') && get_user_preferences('behat_keep_drawer_closed') != 1) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
// Theme mobil menu.
$CFG->custommenuitems = $theme->settings->frontpagenavlink;

if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
];
// Navbar scroll sadece frontpage.
$PAGE->requires->js('/theme/zuum/js/main.js');

$templatecontext['rtl'] = right_to_left();
if (right_to_left()) {
    $templatecontext['left-right'] = 'left';
} else {
    $templatecontext['left-right'] = 'right';
}
$templatecontext['sesskey'] = sesskey();
$templatecontext['userlogin'] = $userlogin;
$templatecontext['frontpage'] = true;
if (isloggedin()) {
    $templatecontext['currentuser'] = format_string(fullname($USER));
}
$pageid = optional_param('zuumpage', '', PARAM_RAW);
$courseid = optional_param('course-details', '', PARAM_RAW);
$teacherid = optional_param('teacher-details', '', PARAM_RAW);
// Front page section.
if (!empty($pageid) && ($pageid != 3 || $pageid != 5) ) {
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_pages_section($pageid, 0));
    echo $OUTPUT->render_from_template('theme_zuum/frontpage/frontpage', $templatecontext);
} else if (!empty(is_numeric($courseid))) {
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_pages_section(3, $courseid));
    echo $OUTPUT->render_from_template('theme_zuum/frontpage/frontpage', $templatecontext);
} else if (!empty(is_numeric($teacherid))) {
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_pages_section(5, $teacherid));
    echo $OUTPUT->render_from_template('theme_zuum/frontpage/frontpage', $templatecontext);
} else {
    $templatecontext = array_merge($templatecontext, theme_zuum_frontpage_section());
    echo $OUTPUT->render_from_template('theme_zuum/frontpage/frontpage', $templatecontext);
}
