<?php
class Config extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }
}