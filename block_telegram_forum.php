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
        $this->title = get_string('simplehtml', 'block_telegram_forum');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass;
        if (empty($this->config->channelid)) {
            $this->content->text   = 'Canal não configurado! Ative a edição da disciplina e configure este bloco.';
        } else {
            $this->content->text = "<a href='{$this->config->channellink}'
                target='_blank'>Registre-se no canal Telegram desta página</a>";
        }
        return $this->content;
    }


    public function instance_config_save($data, $nolongerused = false) {
        global $DB;
        global $COURSE;
        if (!empty($data->channelid)) {
            if ($DB->record_exists('block_telegram_forum', array('courseid' => $COURSE->id))) {
                $sql = "update mdl_block_telegram_forum set channel = $data->channelid where courseid = $COURSE->id";
                $DB->execute($sql);
            } else {
                $ins = (object)array('courseid' => $COURSE->id, 'channel' => $data->channelid);
                $DB->insert_record('block_telegram_forum', $ins);
            }
        } else {
                $DB->delete_records('block_telegram_forum', array('courseid' => $COURSE->id));
        }
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
