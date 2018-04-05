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

namespace block_admin_announcement;

use dml_exception;
use stdClass;

defined('MOODLE_INTERNAL') || die();

class api {
    /**
     * @return stdClass[]
     * @throws dml_exception
     */
    public static function get_announcement_changes() {
        global $DB;

        return $DB->get_records('config_log', ['plugin' => 'block_admin_announcement', 'name' => 'text'],
            'timemodified DESC', 'value, oldvalue, timemodified');
    }
}
