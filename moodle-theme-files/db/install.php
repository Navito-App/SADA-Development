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
 * Theme installation process functions and its values.
 *
 * @package    theme_zuum
 * @copyright  2024 Hüseyin Yemen (http://www.themesalmond.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Theme_zuum install function.
 *
 * @return void
 */
function xmldb_theme_zuum_install() {
    GLOBAL  $DB;
    // User info field social and job.
    $cat = $DB->get_record('user_info_category', ['name' => 'ZUUM-Custom field']);
    $catid = $cat ? $cat->id : 0;
    if (! $catid ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->name = "ZUUM-Custom field";
        $recordtoinsert->sortorder = $DB->count_records('user_info_category') + 1;
        $catid = $DB->insert_record('user_info_category', $recordtoinsert);
    }
    // User job.
    $infofields = $DB->count_records('user_info_field', [
        'shortname' => 'zuum_user_job',
        'categoryid' => $catid,
    ]);
    if ( $infofields < 1 ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->shortname = "zuum_user_job";
        $recordtoinsert->name = "ZUUM user job";
        $recordtoinsert->datatype = "text";
        $recordtoinsert->description = "";
        $recordtoinsert->descriptionformat = 1;
        $recordtoinsert->categoryid = $catid;
        $recordtoinsert->sortorder = $DB->count_records('user_info_field', ['categoryid' => $catid]) + 1;
        $recordtoinsert->visible = 0;
        $recordtoinsert->defaultdata = "";
        $recordtoinsert->param1 = 100;
        $recordtoinsert->param2 = 2048;
        $recordtoinsert->param3 = 0;
        $recordtoinsert->param4 = "";
        $recordtoinsert->param5 = "";
        $DB->insert_record('user_info_field', $recordtoinsert);
    }
    // User social.
    $infofields = $DB->count_records('user_info_field', [
        'shortname' => 'zuum_social_media',
        'categoryid' => $catid,
    ]);
    if ( $infofields < 1 ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->shortname = "zuum_social_media";
        $recordtoinsert->name = "ZUUM social media";
        $recordtoinsert->datatype = "text";
        $recordtoinsert->description = "<p dir='ltr' style='text-align:left;'>example : twitter, https://twitter.com;
        youtube, https://youtube.com; linkedin, https://linkedin.com; facebook, https://facebook.com</p>";
        $recordtoinsert->descriptionformat = 1;
        $recordtoinsert->categoryid = $catid;
        $recordtoinsert->sortorder = $DB->count_records('user_info_field', ['categoryid' => $catid]) + 1;
        $recordtoinsert->visible = 0;
        $recordtoinsert->defaultdata = "twitter, https://twitter.com; youtube,https://youtube.com;
        linkedin, https://linkedin.com; facebook, https://facebook.com";
        $recordtoinsert->param1 = 100;
        $recordtoinsert->param2 = 2048;
        $recordtoinsert->param3 = 0;
        $recordtoinsert->param4 = "";
        $recordtoinsert->param5 = "";
        $DB->insert_record('user_info_field', $recordtoinsert);
    }
    // User skills.
    $infofields = $DB->count_records('user_info_field', [
        'shortname' => 'zuum_skills',
        'categoryid' => $catid,
    ]);
    if ( $infofields < 1 ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->shortname = "zuum_skills";
        $recordtoinsert->name = "Skill definitions";
        $recordtoinsert->datatype = "text";
        $recordtoinsert->description = "<p dir='ltr' style='text-align:left;'>Exp.: skill 1, %75;
        skill2, %90; skill 3, %99; skill 4, %100</p>";
        $recordtoinsert->descriptionformat = 1;
        $recordtoinsert->categoryid = $catid;
        $recordtoinsert->sortorder = $DB->count_records('user_info_field', ['categoryid' => $catid]) + 1;
        $recordtoinsert->visible = 0;
        $recordtoinsert->defaultdata = "PHP, 95; HTML, 99; CSS, 99; MOODLE, 90";
        $recordtoinsert->param1 = 100;
        $recordtoinsert->param2 = 2048;
        $recordtoinsert->param3 = 0;
        $recordtoinsert->param4 = "";
        $recordtoinsert->param5 = "";
        $DB->insert_record('user_info_field', $recordtoinsert);
    }

    // Course custom field.
    $cat = $DB->get_record('customfield_category', ['name' => 'ZUUM-Course content']);
    $catid = $cat ? $cat->id : 0;
    if (! $catid ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->name = "ZUUM-Course content";
        $recordtoinsert->component = "core_course";
        $recordtoinsert->area = "course";
        $recordtoinsert->contexid = 1;
        $recordtoinsert->sortorder = $DB->count_records('customfield_category') + 1;
        $recordtoinsert->timecreated = time();
        $recordtoinsert->timemodified = time();
        $catid = $DB->insert_record('customfield_category', $recordtoinsert);
    }
    // Course duration.
    $infofields = $DB->count_records('customfield_field', [
        'shortname' => 'zuum_course_duration',
        'categoryid' => $catid,
    ]);
    if ( $infofields < 1 ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->shortname = "zuum_course_duration";
        $recordtoinsert->name = "Course Duration";
        $recordtoinsert->type = "text";
        $recordtoinsert->description = "";
        $recordtoinsert->descriptionformat = 1;
        $recordtoinsert->categoryid = $catid;
        $recordtoinsert->sortorder = $DB->count_records('customfield_field', ['categoryid' => $catid]) + 1;
        $recordtoinsert->configdata = '{"required":"0","uniquevalues":"0","defaultvalue":"","displaysize":50,
        "maxlength":1333,"ispassword":"0","link":"","locked":"0","visibility":"0"}';
        $recordtoinsert->timecreated = time();
        $recordtoinsert->timemodified = time();
        $DB->insert_record('customfield_field', $recordtoinsert);
    }
    // Course skill.
    $infofields = $DB->count_records('customfield_field', [
        'shortname' => 'zuum_skill_level',
        'categoryid' => $catid,
    ]);
    if ( $infofields < 1 ) {
        $recordtoinsert = new stdClass();
        $recordtoinsert->shortname = "zuum_skill_level";
        $recordtoinsert->name = "Skill Level";
        $recordtoinsert->type = "text";
        $recordtoinsert->description = "";
        $recordtoinsert->descriptionformat = 1;
        $recordtoinsert->categoryid = $catid;
        $recordtoinsert->sortorder = $DB->count_records('customfield_field', ['categoryid' => $catid]) + 1;
        $recordtoinsert->configdata = '{"required":"0","uniquevalues":"0","defaultvalue":"","displaysize":50,
        "maxlength":1333,"ispassword":"0","link":"","locked":"0","visibility":"0"}';
        $recordtoinsert->timecreated = time();
        $recordtoinsert->timemodified = time();
        $DB->insert_record('customfield_field', $recordtoinsert);
    }
}
