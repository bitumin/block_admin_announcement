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
 * admin announcement renderer.
 *
 * @package    block_admin_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_admin_announcement\output;

defined('MOODLE_INTERNAL') || die();

use moodle_exception;
use plugin_renderer_base;

/**
 * admin announcement renderer class.
 *
 * @package    block_admin_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {
    /**
     * Fetched data from the page exporter method, passes the data to the template and returns the rendered template
     *
     * @param changelog_page $page
     * @return bool|string
     * @throws moodle_exception
     */
    public function render_changelog_page(changelog_page $page) {
        $data = $page->export_for_template($this);

        return parent::render_from_template('block_admin_announcement/changelog', $data);
    }
}
