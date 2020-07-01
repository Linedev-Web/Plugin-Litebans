<?php
class Bans extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}