<?php
class Kicks extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}