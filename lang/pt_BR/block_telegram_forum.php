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

$string['pluginname'] = 'Integração Telegram Fórum';
$string['telegram_forum'] = 'Telegram/Fórum';
$string['telegram_forum:addinstance'] = 'Adiciona bloco telegram_forum';
$string['telegram_forum:myaddinstance'] = 'Adiciona bloco telegram_forum para My Moodle page';

$string['headerconfig'] = 'Configuração do Bloco Telegram/Fórum';
$string['descconfig'] = 'Para que os professores possam utilizar o Telegram para enviarem seus tópicos criados em fóruns, é preciso configurar o token e o nome do bot utilizado pela instituição.';
$string['tokenconfig'] = 'Token';
$string['botconfig'] = 'Bot da instituição';

$string['channelid'] = 'Id do canal';
$string['channellink'] = 'Link para o canal';
$string['channelname'] = 'Nome do canal';
$string['forums'] = 'Selecione os fóruns';
$string['topic'] = 'Envia novos tópicos';
$string['message'] = 'Envia novas mensagens';

$string['notconfigured'] = 'Canal não configurado! Ative a edição da disciplina e configure este bloco.';
$string['register'] = 'Registre-se no canal Telegram desta página';
$string['instructions'] = '1. Crie um canal no seu telegram;  <BR>
                           2. Adicione {$a} como membro administrador do canal criado; <BR>
                           3. Descubra e copie o id do seu canal; <BR>
                           4. Cole o id do canal no campo abaixo; <BR>
                           5. Preencha o link para inscrição no canal no segundo campo.';
$string['instructionstitle'] = 'Instruções';

$string['privacy:metadata'] = 'The Calendar block only displays existing calendar data.';
