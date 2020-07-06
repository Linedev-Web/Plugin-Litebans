<?php

class KicksController extends LitebansAppController
{

    public function index()
    {
        $this->set('title_for_layout', $this->Lang->get('LITEBANS__TITLE') . '/' . $this->Lang->get('LITEBANS__KICKSS'));

        $this->loadModel('Litebans.Kicks');
        $this->loadModel('Litebans.History');

        $this->paginate = array(
            'fields' => array('Kicks.id', 'Kicks.banned_by_name', 'Kicks.banned_by_uuid', 'Kicks.reason', 'Kicks.time', 'Kicks.uuid'),
            'order' => 'id DESC',
            'limit' => 10,
            'recursive' => 1,
            'paramType' => 'querystring',
        );
        $kicks = $this->paginate('Kicks');

        for ($i = 0, $iMax = count($kicks); $i <= $iMax; $i++) {
            // Name
            if (isset($kicks[$i]['Kicks']['uuid'])) {
                $name = $this->History->getUuid($kicks[$i]['Kicks']['uuid']);
                $kicks[$i]['Kicks']['name'] = $name['History']['name'];
            }

            // Date
            if (isset($kicks[$i]['Kicks']['time'])) {
                $kicks[$i]['Kicks']['date_debut'] = $this->millis_to_date($kicks[$i]['Kicks']['time']);
            }

            // Clean reason for minecraft
            if (isset($kicks[$i]['Kicks']['reason'])) {
                $kicks[$i]['Kicks']['reason'] = $this->clean($kicks[$i]['Kicks']['reason']);
            }
        }
        $this->set(compact('kicks'));
    }
}