<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_telegram_forum'),
            get_string('descconfig', 'block_telegram_forum')
        ));

$setting = new admin_setting_configtext('block_telegram_forum/token',
        get_string('tokenconfig', 'block_telegram_forum'),
        '', '',PARAM_RAW_TRIMMED, 40);
$settings->add($setting); 
$setting = new admin_setting_configtext('block_telegram_forum/bot',
        get_string('botconfig', 'block_telegram_forum'),
        '', '',PARAM_RAW_TRIMMED, 40);
$settings->add($setting); 
