<?php
class Mutes extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}