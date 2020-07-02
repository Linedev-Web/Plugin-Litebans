<?php

class WarningsController extends LitebansAppController
{

    public function index()
    {
        $this->set('title_for_layout', 'Titre');

        $this->loadModel('Litebans.Warnings');

        $this->paginate = array(
            'fields' => array('Warnings.id', 'Warnings.banned_by_name', 'Warnings.reason', 'Warnings.time', 'Warnings.until', 'Warnings.active', 'Warnings.uuid'),
            'order' => 'id DESC',
            'limit' => 10,
            'recursive' => 1,
            'paramType' => 'querystring'
        );

        $this->loadModel('Litebans.History');

        $warnings = $this->paginate('Warnings');
        for ($i = 0, $iMax = count($warnings); $i <= $iMax; $i++) {
            // Name
            if (isset($warnings[$i]['Warnings']['uuid'])) {
                $name = $this->History->getUuid($warnings[$i]['Warnings']['uuid']);
                $warnings[$i]['Warnings']['name'] = $name['History']['name'];
            }

            // Date
            if (isset($warnings[$i]['Warnings']['time'])) {
                $warnings[$i]['Warnings']['time'] = $this->millis_to_date($warnings[$i]['Warnings']['time']);

            }

            // Date expiry
            if (isset($warnings[$i]['Warnings']['until'])) {
                $warnings[$i]['Warnings']['until'] = $this->expiry($warnings[$i]['Warnings']['until']);

            }
        }
        $this->set(compact('warnings'));
    }
}