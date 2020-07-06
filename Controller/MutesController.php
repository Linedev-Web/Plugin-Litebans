<?php

class MutesController extends LitebansAppController
{

    public function index()
    {
        $this->set('title_for_layout', $this->Lang->get('LITEBANS__TITLE') . '/' . $this->Lang->get('LITEBANS__MUTESS'));

        $this->loadModel('Litebans.Mutes');
        $this->loadModel('Litebans.History');

        $this->paginate = array(
            'fields' => array('Mutes.id', 'Mutes.banned_by_name', 'Mutes.banned_by_uuid', 'Mutes.reason', 'Mutes.time', 'Mutes.until', 'Mutes.active', 'Mutes.uuid'),
            'order' => 'id DESC',
            'limit' => 10,
            'recursive' => 1,
            'paramType' => 'querystring',
        );
        $mutes = $this->paginate('Mutes');

        for ($i = 0, $iMax = count($mutes); $i <= $iMax; $i++) {
            // Name
            if (isset($mutes[$i]['Mutes']['uuid'])) {
                $name = $this->History->getUuid($mutes[$i]['Mutes']['uuid']);
                $mutes[$i]['Mutes']['name'] = $name['History']['name'];
            }

            // Date
            if (isset($mutes[$i]['Mutes']['time'])) {
                $mutes[$i]['Mutes']['date_debut'] = $this->millis_to_date($mutes[$i]['Mutes']['time']);

            }

            // Date expiry
            if (isset($mutes[$i]['Mutes']['until'])) {
                $mutes[$i]['Mutes']['date_fin'] = $this->expiry($mutes[$i]['Mutes']['until']);
                // Date time
                $mutes[$i]['Mutes']['date_reset'] = $this->dateStarAndDateEnd($mutes[$i]['Mutes']['until']);
            }

            // Clean reason for minecraft
            if (isset($kicks[$i]['Mutes']['reason'])) {
                $kicks[$i]['Mutes']['reason'] = $this->clean($kicks[$i]['Mutes']['reason']);
            }
        }
        $this->set(compact('mutes'));
    }
}