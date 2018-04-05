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
 * Form for editing admin_announcement block instances.
 *
 * @package   block_admin_announcement
 * @copyright 2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * To customize the block you may want to override several methods from the parent block_base class
 * Class block_admin_announcement
 */
class block_admin_announcement extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_admin_announcement');
    }

    /**
     * Return true if you want to enable admin settings page (see settings.php)
     * @return bool
     */
    public function has_config() {
        return true;
    }

    /**
     * This should be always implemented by this child class.
     * @throws dml_exception
     * @throws coding_exception
     */
    public function get_content() {
        $this->content = new stdClass;
        $enabled = (bool) get_config('block_admin_announcement', 'enabled');
        if ($enabled) {
            $this->content->text = get_config('block_admin_announcement', 'text');
        } else {
            $this->content->text = get_string('disabledtext', 'block_admin_announcement');
        }
        $this->content->footer = '';

        return $this->content;
    }

    public function applicable_formats() {
        // This block can be used in all pages types
        return array('all' => true);
    }
}
