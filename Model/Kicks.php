<?php
class Kicks extends LitebansAppModel{

    public $primaryKey = 'uuid';

    public $belongsTo = array(
        '' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    public function get(){
        return $this->find('all');
    }
    public function getFirstUuid($uuid){
        return $this->find('all',array(
            'conditions' => array('Kicks.uuid' => trim($uuid)),
            'order' => 'id DESC'
        ));
    }

}