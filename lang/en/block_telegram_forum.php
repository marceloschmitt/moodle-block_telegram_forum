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

$string['pluginname'] = 'Telegram and Forum Integration';
$string['telegram_forum'] = 'Telegram/Forum';
$string['telegram_forum:addinstance'] = 'Add block Telegram/Forum';
$string['telegram_forum:myaddinstance'] = 'Addd block Telegram/Forum into My Moodle page';

$string['headerconfig'] = 'Telegram/Forum block configuration';
$string['descconfig'] = 'In order to use Telegram to send new topics in courses it is necessary to configure the token and the name of the Telegram bot used by the organization.';
$string['tokenconfig'] = 'Bot Token';
$string['botconfig'] = 'Bot Name';

$string['channelid'] = 'Channel id';
$string['channellink'] = 'Channel link';
$string['channelname'] = 'Channel name';
$string['forums'] = 'Select forums';
$string['topic'] = 'Send new topics';
$string['message'] = 'Send new messages';

$string['notconfigured'] = 'Channel not configured! Activate edit and configure the block.';
$string['register'] = 'Register in the course Telegram channel.';
$string['instructions'] = '1. Create a private channel in Telegram;  <BR>
                           2. Add {$a} as administrator of the channel; <BR>
                           3. Discover and copy the channel id; <BR>
                           4. Paste the channel id in the proper field; <BR>
                           5. Fill the channel link used for subscription.';
$string['instructionstitle'] = 'Instructions';

$string['privacy:metadata'] = 'The Telegram/Forum block only sends messagens to yourconfigured Telegram Channel.';
