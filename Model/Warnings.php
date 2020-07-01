<?php
class Warnings extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}