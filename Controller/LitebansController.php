<?php
class LitebansController extends LitebansAppController{

    public function index(){

        // Chargement du Model Tutorial
        $this->loadModel('Litebans.Bans');

        //On enregistre dans $datas le contenu de toute la table tutorial
        $datas = $this->Bans->find('all');

        //On passe la variable à la vue afin de pouvoir la réutiliser dans index.ctp
        $this->set(compact('datas'));

        //Pour passer plusieurs variable à la vue :
        //$this->set(compact('datas', 'variable', 'infos'));

        //Pour donner un titre à votre page : Dans le html <title> Titre <title>
        $this->set('title_for_layout', 'Titre');
    }
    public function bans(){

        // Chargement du Model Tutorial
        $this->loadModel('Litebans.Bans');

        //On enregistre dans $datas le contenu de toute la table tutorial
        $bans = $this->Bans->find('all');

        //On passe la variable à la vue afin de pouvoir la réutiliser dans index.ctp
        $this->set(compact('bans'));

        //Pour passer plusieurs variable à la vue :
        //$this->set(compact('datas', 'variable', 'infos'));

        //Pour donner un titre à votre page : Dans le html <title> Titre <title>
        $this->set('title_for_layout', 'Litebans - Bans');
    }
}