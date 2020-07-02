<?php

class History extends LitebansAppModel
{
    public $useTable = 'History';
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

    public function getUuid($uuid)
    {
        return $this->findByUuid($uuid);
    }

}