<?php
require_once("$CFG->libdir/formslib.php");
class contact_form extends moodleform {
    public function definition() {
        $mform = $this->_form;
        $mform->addElement('text', 'email', get_string('email'));
        $mform->setType('email', PARAM_NOTAGS);
        $mform->setDefault('email', 'Please enter email');
    }
    function validation($data, $files) {
        return [];
    }
}
