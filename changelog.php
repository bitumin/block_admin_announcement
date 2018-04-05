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
 * Changelog of announcements page.
 *
 * @package   block_admin_announcement
 * @copyright 2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');

require_login(null, false);
if (isguestuser()) {
    throw new require_login_exception('Guests users not allowed. Please log in.');
}

$titlestr = get_string('changelogview_title', 'block_admin_announcement');
$url = new moodle_url('/blocks/admin_announcement/changelog.php');
$context = context_user::instance($USER->id);
$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->set_title($titlestr);
$PAGE->set_pagelayout('standard');
$PAGE->navbar->add($titlestr, $url);

/** @var \block_admin_announcement\output\renderer $output */
$output = $PAGE->get_renderer('block_admin_announcement');
echo $output->header();
echo $output->heading($titlestr);

$changes = \block_admin_announcement\api::get_announcement_changes();
$page = new \block_admin_announcement\output\changelog_page($context, $changes);
echo $output->render($page);

echo $output->footer();
