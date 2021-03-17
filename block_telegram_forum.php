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
 * Classes to enforce the various access rules that can apply to a activity.
 *
 * @package    block_telegram_forum
 * @copyright  2021 Marcelo Augusto Rauh Schmitt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/


class block_telegram_forum extends block_base {

    public function init() {
        $this->title = get_string('telegram_forum', 'block_telegram_forum');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass;
        if (empty($this->config->channelid)) {
            $this->content->text = get_string('notconfigured', 'block_telegram_forum');
        } else {
            $this->content->text = "<a href='{$this->config->channellink}'
                target='_blank'>".  get_string('register', 'block_telegram_forum') . "</a>";
        }
        return $this->content;
    }


    public function instance_config_save($data, $nolongerused = false) {
        global $DB;
        global $COURSE;
        if (!empty($data->channelid)) {
            if ($record = $DB->get_record('block_telegram_forum', array('courseid' => $COURSE->id))) {
                $record->channel = $data->channelid;
                $DB->update_record('block_telegram_forum', $record);
            } else {
                $ins = (object)array('courseid' => $COURSE->id, 'channel' => $data->channelid);
                $DB->insert_record('block_telegram_forum', $ins);
            }
        } else {
                $DB->delete_records('block_telegram_forum', array('courseid' => $COURSE->id));
        }
        foreach($data->forum as $x => $y)
            error_log($x . "  " . $y);
        parent::instance_config_save($data);
    }


    public function instance_delete() {
        global $DB;
        $DB->delete_records('block_telegram_forum', array('courseid' => $COURSE->id));
    }


    public function has_config() {
        return true;
    }
}
