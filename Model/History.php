<?php

class History extends LitebansAppModel
{
    public $useTable = 'History';

    public function get()
    {
        return $this->find('all');
    }

    public function getUuid($uuid)
    {
        return $this->findByUuid($uuid);
    }

}