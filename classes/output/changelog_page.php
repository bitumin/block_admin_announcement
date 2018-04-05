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
 * Changelog page renderable.
 *
 * @package   block_admin_announcement
 * @copyright 2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_admin_announcement\output;

defined('MOODLE_INTERNAL') || die();

use block_admin_announcement\external\changes_exporter;
use context;
use renderable;
use templatable;
use renderer_base;
use stdClass;

/**
 * Plans to review renderable class.
 *
 * @package    block_admin_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class changelog_page implements renderable, templatable {
    private $changes;
    private $context;

    /**
     * changelog_page constructor.
     * @param context $context
     * @param stdClass[] $changes
     */
    public function __construct($context, $changes) {
        $this->context = $context;
        $this->changes = $changes;
    }

    /**
     * Export data so it can be used to feed a mustache template.
     * Use exporters to help reusing the data exporting steps if needed.
     *
     * @param renderer_base $output
     * @return array|stdClass
     * @throws \coding_exception
     */
    public function export_for_template(renderer_base $output) {
        $exporter = new changes_exporter(null, ['context' => $this->context, 'changes' => $this->changes]);

        return $exporter->export($output);
    }
}
