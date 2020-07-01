<?php
class History extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}