<?php

class History extends LitebansAppModel
{
    public $useTable = 'history';
    public $primaryKey = 'uuid';


    public function get()
    {
        return $this->find('all', array(
            'recursive' => 1,
        ));
    }

    public function getName($name)
    {
        return $this->findByName($name);
    }

    public function getAllName($name)
    {
        return $this->find('all', array(
            'fields' => 'name',
            'conditions' => array('History.name LIKE' => '%' . $name . '%'),
            'limit' => 15
        ));
    }

    public function getUuid($uuid)
    {
        return $this->findByUuid($uuid);
    }

}