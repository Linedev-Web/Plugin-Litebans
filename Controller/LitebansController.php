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
        $this->DataTable = $this->Components->load('DataTable');
        $this->modelClass = 'Bans';
        $this->DataTable->initialize($this);

        $this->paginate = array(
            'fields' => array('Bans.id', 'Bans.ip', 'Bans.reason', 'Bans.uuid'),
            'order' => 'id DESC',
            'limit' => 10,
            'recursive' => 1,
        'paramType' => 'querystring'
        );

        $this->loadModel('Litebans.History');
        $this->modelClass = 'History';

        $bans = $this->paginate('Bans');
        for ($i = 0, $iMax = count($bans); $i <= $iMax; $i++) {
            $name = $this->History->getUuid($bans[$i]['Bans']['uuid']);
            $bans[$i]['Bans']['name'] = $name['History']['name'];
        }
        $this->set(compact('bans'));


    }

    public function getBans()
    {

        $this->autoRender = false;
        $this->response->type('json');

        $this->loadModel('Litebans.Bans');
        $this->DataTable = $this->Components->load('DataTable');
        $this->modelClass = 'Bans';
        $this->DataTable->initialize($this);

        $this->paginate = array(
            'fields' => array('Bans.id', 'Bans.ip', 'Bans.reason', 'Bans.uuid'),
            'order' => 'id DESC',
            'recursive' => 1
        );
        $this->DataTable->mDataProp = true;


        $this->loadModel('Litebans.History');
        $this->modelClass = 'History';
        $response = $this->DataTable->getResponse();


        for ($i = 0, $iMax = count($response['aaData']); $i <= $iMax; $i++) {
            $name = $this->History->getUuid($response['aaData'][$i]['Bans']['uuid']);
            $response['aaData'][$i]['Bans']['uuid'] = $name['History']['name'];
        }
        $this->response->body(json_encode($response));
    }
}