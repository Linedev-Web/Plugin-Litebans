<?php
class Servers extends LitebansAppModel{

    public function get(){
        return $this->find('all');
    }

}