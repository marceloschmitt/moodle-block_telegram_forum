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
 * Observer Class.
 *
 * Long description for class (if any)...
 *
 * @package    block_telegram_forum
 * @copyright  2022 Marcelo Schmitt
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_telegram_forum_observer {

    /**
     * Get block configuration from instance.
     *
     * @param object $instance Block instance record
     * @return object|null Block configuration object
     */
    private static function get_block_config($instance) {
        if (empty($instance->configdata)) {
            return new stdClass();
        }
        $config = unserialize(base64_decode($instance->configdata));
        if ($config === false) {
            return new stdClass();
        }
        return $config;
    }

    /**
     * Event processor - discussion created
     *
     * @param \mod_forum\event\discussion_created $event
     * @return bool
     */
    public static function discussion_created(\mod_forum\event\discussion_created $event) {
        global $DB;
        $context = context_course::instance($event->courseid);
        $instance = $DB->get_record('block_instances',
                        ['parentcontextid' => $context->id, 'blockname' => 'telegram_forum']);
        if (!$instance) {
            return true;
        }

        $config = self::get_block_config($instance);
        if (!isset($config->forum[$event->contextinstanceid])) {
            return true;
        }

        if (empty($config->channelid)) {
            return true;
        }

        $bottoken = get_config('block_telegram_forum', 'token');
        if (empty($bottoken)) {
            return true;
        }

        $discussion = $DB->get_record($event->objecttable, ['id' => $event->objectid]);
        if (!$discussion) {
            return true;
        }

        $post = $DB->get_record('forum_posts', ['discussion' => $discussion->id, 'parent' => 0]);
        if (!$post) {
            return true;
        }

        $text = $post->subject . PHP_EOL . strip_tags($post->message);
        self::send_telegram_message($bottoken, $config->channelid, $text);
        return true;
    }

    /**
     * Event when post is created
     *
     * @param \mod_forum\event\post_created $event
     * @return bool
     */
    public static function post_created(\mod_forum\event\post_created $event) {
        global $DB;
        $context = context_course::instance($event->courseid);
        $instance = $DB->get_record('block_instances',
                        ['parentcontextid' => $context->id, 'blockname' => 'telegram_forum']);
        if (!$instance) {
            return true;
        }

        $config = self::get_block_config($instance);
        if (!isset($config->forummessage[$event->contextinstanceid])) {
            return true;
        }

        if (empty($config->channelid)) {
            return true;
        }

        $bottoken = get_config('block_telegram_forum', 'token');
        if (empty($bottoken)) {
            return true;
        }

        $post = $DB->get_record('forum_posts', ['id' => $event->objectid]);
        if (!$post) {
            return true;
        }

        $text = $post->subject . PHP_EOL . strip_tags($post->message);
        self::send_telegram_message($bottoken, $config->channelid, $text);
        return true;
    }


    /**
     * Method to send the message
     *
     * @param string $bottoken - Token of telegram
     * @param string $channelid - Channel Id of telegram
     * @param string $text - Text to be sent
     * @return bool
     */
    public static function send_telegram_message($bottoken, $channelid, $text) {
        if (empty($bottoken) || empty($channelid) || empty($text)) {
            return false;
        }

        $website = "https://api.telegram.org/bot" . $bottoken;
        $params = [
            'chat_id' => $channelid,
            'text' => $text,
        ];
        $curl = new \curl();
        $url = $website . '/sendMessage';
        $result = $curl->post($url, $params);
        return true;
    }

}
