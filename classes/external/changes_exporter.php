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

namespace block_admin_announcement\external;

defined('MOODLE_INTERNAL') || die();

use context;
use core\external\exporter;
use renderer_base;
use stdClass;

/**
 * Changes data exporter.
 *
 * @package    block_admin_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class changes_exporter extends exporter {
    protected static function define_related() {
        return array(
            'context' => 'context',
            'changes' => 'stdClass[]',
        );
    }

    protected static function define_other_properties() {
        return array(
            'changes' => array(
                'type' => change_exporter::read_properties_definition(),
            ),
        );
    }

    protected function get_other_values(renderer_base $output) {
        /** @var context $context */
        $context = $this->related['context'];
        /** @var stdClass[] $changes */
        $changes = $this->related['changes'];

        $values = array();
        $values['changes'] = array();
        foreach($changes as $change) {
            $exporter = new change_exporter(null, ['context' => $context, 'change' => $change]);
            $values['changes'][] = $exporter->export($output);
        }

        return $values;
    }
}
