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
 * @package   theme_stellar
 * @copyright 2014 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class theme_stellar_core_renderer extends theme_bootstrap_core_renderer {
    /**
     * This code renders the navbar brand link displayed in the left navbar
     * on smaller screens.
     *
     * @return string HTML fragment
     */
    protected function navbar_brand() {
        global $CFG, $PAGE, $SITE;
        if (!empty($PAGE->theme->settings->logo)) {
            $html = '<img class="sitelogo" src="' . $PAGE->theme->settings->logo . '" alt="Custom logo here" />';
        } else {
            $html = '<h1>'.$SITE->shortname.'</h1>';
        }
        return html_writer::link($CFG->wwwroot, $html, array('class' => 'navbar-brand'));
    }
}
