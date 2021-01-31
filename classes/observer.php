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

defined('MOODLE_INTERNAL') || die();

class block_telegram_forum_observer {
    /**
     * Event processor - user created
     *
     * @param \core\event\user_created $event
     * @return bool
     */
    public static function discussion_created(\mod_forum\event\discussion_created $event) {
        global $DB, $CFG;
        if (!$DB->record_exists('block_telegram_forum', array('courseid' => $event->courseid))) {
            return true;
        } else {
            $telegram = $DB->get_record('block_telegram_forum', ['courseid' => $event->courseid]);
            $bottoken = get_config('block_telegram_forum', 'token');
            $website = "https://api.telegram.org/bot".$bottoken;
            $chatid = $telegram->channel;
            $discussion = $DB->get_record($event->objecttable, ['id' => $event->objectid]);
            $post = $DB->get_record('forum_posts', ['discussion' => $discussion->id]);
            $text = 'Tópico: ' . $post->subject . ' - Mensagem: ' . strip_tags($post->message);
            $params = [
                'chat_id' => $chatid,
                'text' => $text,
            ];
            $ch = curl_init($website . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            return true;
        }
    }
}
