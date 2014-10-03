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
    // Strip out unwanted classes
    public function content_zoom() {
        $zoomin = html_writer::span(get_string('fullscreen', 'theme_bootstrap'), 'zoomin');
        $zoomout = html_writer::span(get_string('closefullscreen', 'theme_bootstrap'), 'zoomout');
        $content = html_writer::link('#',  $zoomin . $zoomout,
            array('class' => 'pull-right moodlezoom'));
        return $content;
    }
}
