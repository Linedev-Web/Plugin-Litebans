<?php
class Sync extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}