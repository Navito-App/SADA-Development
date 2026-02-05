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
 * Theme functions.
 *
 * @package   theme_zuum
 * @copyright 2024 ThemesAlmond  - http://themeszuum.com
 * @author    ThemesAlmond - Developer Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Load the migration files
 * Load the our theme js and css file
 * @param moodle_page $PAGE parameter.
 */
function theme_zuum_page_init(moodle_page $PAGE) {

    $PAGE->requires->js('/theme/zuum/js/navbar.js');
    $PAGE->requires->js('/theme/zuum/js/navbarm.js');
    $PAGE->requires->js('/theme/zuum/js/wow.min.js');
    // Css create, sonra gelen css lerden etkilenmemesi için burada.
    zuum_body_css();
    $PAGE->requires->css('/theme/zuum/style/boxicons.min.css');
}
/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_zuum_get_extra_scss($theme) {
    $content = '';
    $imageurl = $theme->setting_file_url('backgroundimage', 'backgroundimage');

    // Sets the background image, and its settings.
    if (!empty($imageurl)) {
        $content .= '@media (min-width: 768px) {';
        $content .= 'body { ';
        $content .= "background-image: url('$imageurl'); background-size: cover;";
        $content .= ' } }';
    }

    // Sets the login background image.
    $loginbackgroundimageurl = $theme->setting_file_url('loginbackgroundimage', 'loginbackgroundimage');
    if (!empty($loginbackgroundimageurl)) {
        $content .= 'body.pagelayout-login #page { ';
        $content .= "background-image: url('$loginbackgroundimageurl'); background-size: cover;";
        $content .= ' }';
    }

    // Always return the background image with the scss when we have it.
    return !empty($theme->settings->scss) ? "{$theme->settings->scss}  \n  {$content}" : $content;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_zuum_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = []) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo' || $filearea === 'backgroundimage'
        || substr($filearea, 0, 5) === 'block' || substr($filearea, 0, 3) === 'img'
        || $filearea === 'css' || substr($filearea, 0, 4) === 'page'
        || substr($filearea, 0, 11) === 'sliderimage' || $filearea === 'loginbackgroundimage')) {
        $theme = theme_config::load('zuum');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_zuum_get_main_scss_content($theme) {
    global $CFG;
    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/zuum/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/zuum/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_zuum', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/zuum/scss/preset/default.scss');
    }

    return $scss;
}

/**
 * Get compiled css.
 *
 * @return string compiled css
 */
function theme_zuum_get_precompiled_css() {
    global $CFG;
    $css = '';
    $css .= file_get_contents($CFG->dirroot . '/theme/zuum/style/frontpage.css');
    return $css;
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_zuum_get_pre_scss($theme) {
    global $CFG;
    $scss = '';
    $configurable = [
        // Config key => [variableName, ...].
        'brandcolor' => ['primary'],
        'navbarbackcolor' => ['navbarbackcolor'],
        'navbarlinkcolor' => ['navbarlinkcolor'],
        'navbarlinkhovercolor' => ['navbarlinkhovercolor'],
        'footerbackcolor' => ['footerbackcolor'],
        'fpbackcolor' => ['fpbackcolor'],
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

require('lib/slideshow.php');
require('lib/frontpage_settings.php');
require('lib/frontpage_block.php');
require('lib/footer_select.php');
require('lib/frontpage_page_1_about.php');
require('lib/frontpage_page_2_course.php');
require('lib/frontpage_page_3_course.php');
require('lib/frontpage_page_4_teacher.php');
require('lib/frontpage_page_5_teacher.php');
require('lib/frontpage_page_6_contact.php');
require('lib/zuumprm.php');
require('lib/reports.php');
