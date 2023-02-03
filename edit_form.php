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
 * Class to refine edit form.
 *
 * @package    block_telegram_forum
 * @copyright  2021 Marcelo Augusto Rauh Schmitt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/

/**
 * Form for editing telegram_forum block instances.
 *
 * @package    block_telegram_forum
 * @copyright  2022 Marcelo Schmitt
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
class block_telegram_forum_edit_form extends block_edit_form {

    /**
     * Method to implement specific configurations.
     *
     * @param struct $mform Content of fullfilled form
     */
    protected function specific_definition($mform) {
        global $DB, $COURSE;

        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        $mform->addElement('static', 'description', get_string('instructionstitle', 'block_telegram_forum'),
            get_string('instructions', 'block_telegram_forum', get_config('block_telegram_forum', 'bot')));

        $mform->addElement('text', 'config_channelid', get_string('channelid', 'block_telegram_forum'));
        $mform->setType('config_channelid', PARAM_ALPHANUMEXT);

        $mform->addElement('text', 'config_channellink', get_string('channellink', 'block_telegram_forum'));
        $mform->setType('config_channellink', PARAM_TEXT);

        $mform->addElement('static', 'description', get_string('forums', 'block_telegram_forum'));

        $foruns = $DB->get_records('forum', ['course' => $COURSE->id], $sort = 'name', $fields = 'id, name');
        $groupid = 0;
        foreach ($foruns as $forum) {
            $checkarray = array();
            $module = $DB->get_record('course_modules', ['instance' => $forum->id, 'course' => $COURSE->id], $fields = 'id');
            $checkarray[] =& $mform->createElement('checkbox', "config_forum[$module->id]", null,
                get_string('topic', 'block_telegram_forum'));
            $checkarray[] =& $mform->createElement('checkbox', "config_forummessage[$module->id]", null,
                get_string('message', 'block_telegram_forum'));
            $mform->addGroup($checkarray, 'checkar', $forum->name, array('&nbsp;&nbsp;&nbsp;'), false);
        }
        $mform->addElement('hidden', 'config_forum[0]', null);
        $mform->addElement('hidden', 'config_forummessage[0]', null);

    }
}
