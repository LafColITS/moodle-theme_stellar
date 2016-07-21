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

    protected function render_custom_menu(custom_menu $menu) {
        // Add the lang_menu to the left of the menu.
        $this->add_lang_menu($menu, true);
        $content = '<ul class="nav navbar-nav pull-right">';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }
        return $content.'</ul>';
    }

    /**
     * Adds a lang submenu in a custom_menu
     *
     * @return string The lang menu HTML or empty string
     */
    protected function add_lang_menu(custom_menu $menu, $force = false) {
        // TODO: eliminate this duplicated logic, it belongs in core, not
        // here. See MDL-39565.
        $haslangmenu = $this->lang_menu() != '';
        if ($force || ( !empty($this->page->layout_options['langmenu']) && $haslangmenu ) ) {
            $langs = get_string_manager()->get_list_of_translations();
            $strlang = get_string('language');
            $this->language = $menu->add($strlang, new moodle_url('#'), $strlang, 10000);
            foreach ($langs as $langtype => $langname) {
                $this->language->add($langname, new moodle_url($this->page->url, array('lang' => $langtype)), $langname);
            }
        }
    }
}
