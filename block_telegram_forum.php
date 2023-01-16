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
 * Telegram Forum class.
 *
 * @package    block_telegram_forum
 * @copyright  2021 Marcelo Augusto Rauh Schmitt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
class block_telegram_forum extends block_base {

    /**
     * init Method
     **/
    public function init() {
        $this->title = get_string('telegram_forum', 'block_telegram_forum');
    }

    /**
     * getContent Method
     **/
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


    /**
     * hasConfig Method
     **/
    public function has_config() {
        return true;
    }
}
