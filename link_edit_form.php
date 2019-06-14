<?php

defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->libdir . '/formslib.php');

class equella_links_edit_form extends moodleform {

    function definition() {
        $mform =& $this->_form;

        // Then show the fields about where this block appears.
	if ($this->_customdata['isadding']) { 
            $mform->addElement('header', 'addinglinkheader', get_string('addinglinkheader', 'block_equella_links'));
        } else {
            $mform->addElement('header', 'editinglinkheader', get_string('editinglinkheader', 'block_equella_links'));
        }

        $mform->addElement('hidden', 'linkid', '');
	$mform->setType('linkid', PARAM_INT);

        $mform->addElement('text', 'title', get_string('linktitle', 'block_equella_links'), array('size' => 60));
        $mform->setType('title', PARAM_NOTAGS);
        $mform->addRule('title', null, 'required');

        $mform->addElement('text', 'url', get_string('equellaurl', 'block_equella_links'), array('size' => 60));
        $mform->setType('url', PARAM_URL);
        $mform->addRule('url', null, 'required');

        $submitlabal = null; // Default
	if ($this->_customdata['isadding']) {
            $submitlabal = get_string('addnewlink', 'block_equella_links');
        }
        $this->add_action_buttons(true, $submitlabal);
    }


    function set_data($params) {
        parent::set_data($params);
    }
}
