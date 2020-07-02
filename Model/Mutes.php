<?php
class Mutes extends LitebansAppModel{

    public $primaryKey = 'uuid';

    public function get(){
        return $this->find('all');
    }

    public function getFirstUuid($uuid){
        return $this->find('all',array(
            'conditions' => array('Mutes.uuid' => trim($uuid)),
        ));
    }
}