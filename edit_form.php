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

class block_telegram_forum_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        $mform->addElement('static', 'description', 'Instruções', '1. Crie um canal no seu telegram;  <BR>
            2. Adicione ' . get_config('block_telegram_forum', 'bot') . ' como membro administrador do canal criado; <BR>
            3. Descubra e copie o id do seu canal; <BR>
            4. Cole o id do canal no campo abaixo; <BR>
            5. Preencha o link para inscrição no canal no segundo campo.');

        $mform->addElement('text', 'config_channelid', get_string('channelid', 'block_telegram_forum'));
        $mform->setType('config_channelid', PARAM_RAW);

        $mform->addElement('text', 'config_channellink', get_string('channellink', 'block_telegram_forum'));
        $mform->setType('config_channellink', PARAM_RAW);
    }
}
