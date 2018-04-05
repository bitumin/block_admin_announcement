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
 * Setting page for admin_announcement block
 *
 * @package    block_admin_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $label = new lang_string('settingenabled_label', 'block_admin_announcement');
    $description = new lang_string('settingenabled_description', 'block_admin_announcement');
    $default = 0;
    $newsetting = new admin_setting_configcheckbox('block_admin_announcement/enabled', $label, $description, $default);
    $settings->add($newsetting);

    $label = new lang_string('settingtext_label', 'block_admin_announcement');
    $description = new lang_string('settingtext_description', 'block_admin_announcement');
    $default = new lang_string('settingtext_default', 'block_admin_announcement');
    $newsetting = new admin_setting_configtext('block_admin_announcement/text', $label, $description, $default, PARAM_TEXT);
    $settings->add($newsetting);
}
