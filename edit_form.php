<?php
 
class block_telegram_forum_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

	$mform->addElement('static', 'description', 'Instruções', '1. Crie um canal no seu telegram;  <BR>2. Adicione ' . get_config('block_telegram_forum', 'bot') . ' como membro administrador do canal criado; <BR>3. Descubra e copie o id do seu canal; <BR>4. Cole o id do canal no campo abaixo; <BR>5. Preencha o link para inscrição no canal no segundo campo.');
 
        $mform->addElement('text', 'config_channelid', get_string('channelid', 'block_telegram_forum'));
        $mform->setType('config_channelid', PARAM_RAW);        
	
	$mform->addElement('text', 'config_channellink', get_string('channellink', 'block_telegram_forum'));
        $mform->setType('config_channellink', PARAM_RAW); 
    }
}
