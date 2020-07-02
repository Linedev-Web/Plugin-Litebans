<?php

class Bans extends LitebansAppModel
{
    public $primaryKey = 'uuid';

    public function get()
    {
        return $this->find('all', array(
            'recursive' => 1,
        ));
    }

    public function getFirstUuid($uuid){
        return $this->find('all',array(
            'conditions' => array('Bans.uuid' => trim($uuid)),
            'order' => 'id DESC'
        ));
    }

}