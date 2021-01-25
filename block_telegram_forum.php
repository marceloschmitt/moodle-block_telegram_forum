<?php
class block_telegram_forum extends block_base {
    public function init() {
        $this->title = get_string('simplehtml', 'block_telegram_forum');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content =  new stdClass;
        if (empty($this->config->channelid)) {
            $this->content->text   = 'Canal não configurado! Ative a edição da disciplina e configure este bloco.';
        } else {
            $this->content->text = "<a href='{$this->config->channellink}' target='_blank'>Registre-se no canal Telegram desta página</a>";
        }
        // $this->content->footer = 'Footer here...';
        return $this->content;
    }


    public function instance_config_save($data, $nolongerused = false) {
	global $DB;
	global $COURSE;
	if(!empty($data->channelid)) {
		if($DB->record_exists('block_telegram_forum', array('courseid' => $COURSE->id))) {
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


    function has_config() {
	return true;
    }
}
