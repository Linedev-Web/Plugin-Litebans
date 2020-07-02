<?php

class LitebansController extends LitebansAppController
{

//    public $paginate = array(
//        'limit' => 1,
//        'paramType' => 'querystring'
//    );

    public function index()
    {
        $this->set('title_for_layout', 'Titre');

        $this->loadModel('Litebans.Bans');
        $this->loadModel('Litebans.History');

        $this->paginate = array(
            'fields' => array('Bans.id', 'Bans.banned_by_name', 'Bans.reason', 'Bans.time', 'Bans.until', 'Bans.active', 'Bans.uuid'),
            'order' => 'id DESC',
            'limit' => 10,
            'recursive' => 1,
            'paramType' => 'querystring',
        );
        $bans = $this->paginate('Bans');

        for ($i = 0, $iMax = count($bans); $i <= $iMax; $i++) {
            // Name
            if (isset($bans[$i]['Bans']['uuid'])) {
                $name = $this->History->getUuid($bans[$i]['Bans']['uuid']);
                $bans[$i]['Bans']['name'] = $name['History']['name'];
            }

            // Date
            if (isset($bans[$i]['Bans']['time'])) {
                $bans[$i]['Bans']['date_debut'] = $this->millis_to_date($bans[$i]['Bans']['time']);

            }

            // Date expiry
            if (isset($bans[$i]['Bans']['until'])) {
                $bans[$i]['Bans']['date_fin'] = $this->expiry($bans[$i]['Bans']['until']);

            }
            // Date time
            if (isset($bans[$i]['Bans']['time']) and isset($bans[$i]['Bans']['until'])) {
                $bans[$i]['Bans']['date_reset'] = $this->dateStarAndDateEnd($bans[$i]['Bans']['time'], $bans[$i]['Bans']['until']);
            }
        }
        $this->set(compact('bans'));
    }

}