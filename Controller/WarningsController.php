<?php

class WarningsController extends LitebansAppController
{

    public function index()
    {
        $this->set('title_for_layout', $this->Lang->get('LITEBANS__TITLE') . '/' . $this->Lang->get('LITEBANS__WARNINGSS'));

        $this->loadModel('Litebans.Warnings');
        $this->loadModel('Litebans.History');

        $this->paginate = array(
            'fields' => array('Warnings.id', 'Warnings.banned_by_name', 'Warnings.banned_by_uuid', 'Warnings.reason', 'Warnings.time', 'Warnings.until', 'Warnings.active', 'Warnings.uuid'),
            'order' => 'id DESC',
            'limit' => 15,
            'recursive' => 1,
            'paramType' => 'querystring',
        );
        $warnings = $this->paginate('Warnings');

        for ($i = 0, $iMax = count($warnings); $i <= $iMax; $i++) {
            // Name
            if (isset($warnings[$i]['Warnings']['uuid'])) {
                $name = $this->History->getUuid($warnings[$i]['Warnings']['uuid']);
                $warnings[$i]['Warnings']['name'] = $name['History']['name'];
            }

            // Date
            if (isset($warnings[$i]['Warnings']['time'])) {
                $warnings[$i]['Warnings']['date_debut'] = $this->millis_to_date($warnings[$i]['Warnings']['time']);

            }

            // Date expiry
            if (isset($warnings[$i]['Warnings']['until'])) {
                $warnings[$i]['Warnings']['date_fin'] = $this->expiry($warnings[$i]['Warnings']['until']);
                // Date time
                $warnings[$i]['Warnings']['date_reset'] = $this->dateStarAndDateEnd($warnings[$i]['Warnings']['until']);
            }

            // Clean reason for minecraft
            if (isset($kicks[$i]['Warnings']['reason'])) {
                $kicks[$i]['Warnings']['reason'] = $this->clean($kicks[$i]['Warnings']['reason']);
            }
        }
        $this->set(compact('warnings'));
    }
}