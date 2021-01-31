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

defined('MOODLE_INTERNAL') || die();

$settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_telegram_forum'),
            get_string('descconfig', 'block_telegram_forum')
        ));

$setting = new admin_setting_configtext('block_telegram_forum/token',
        get_string('tokenconfig', 'block_telegram_forum'),
        '', '', PARAM_RAW_TRIMMED, 40);
$settings->add($setting);
$setting = new admin_setting_configtext('block_telegram_forum/bot',
        get_string('botconfig', 'block_telegram_forum'),
        '', '', PARAM_RAW_TRIMMED, 40);
$settings->add($setting);
