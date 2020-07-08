<?php

class LitebansController extends LitebansAppController
{

//    public $paginate = array(
//        'limit' => 1,
//        'paramType' => 'querystring'
//    );

    public function index()
    {
        $this->set('title_for_layout', $this->Lang->get('LITEBANS__TITLE') . '/' . $this->Lang->get('LITEBANS__BANSS'));

        $this->loadModel('Litebans.Bans');
        $this->loadModel('Litebans.History');

        $this->paginate = array(
            'fields' => array('Bans.id', 'Bans.banned_by_name', 'Bans.banned_by_uuid', 'Bans.removed_by_name', 'Bans.removed_by_uuid', 'Bans.reason', 'Bans.time', 'Bans.until', 'Bans.active', 'Bans.uuid'),
            'order' => 'id DESC',
            'limit' => 15,
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
                // Date time
                $bans[$i]['Bans']['date_reset'] = $this->dateStarAndDateEnd($bans[$i]['Bans']['until']);
            }

            // Clean reason for minecraft
            if (isset($kicks[$i]['Bans']['reason'])) {
                $kicks[$i]['Bans']['reason'] = $this->clean($kicks[$i]['Bans']['reason']);
            }
        }
        $this->set(compact('bans'));
    }

    public function getSearchPseudo()
    {

        if ($this->request->is('post')) {
            $this->response->type('json');
            $this->autoRender = false;

            $this->loadModel('Litebans.History');


            if (!empty($this->request->data['search'])) {
                $name = $this->request->data['search'];
                if (strlen($name) >= 3) {
                    $list = $this->History->getAllName($name);
                    if (!empty($list)) {
                        $listSearch = [];
                        for ($i = 0, $iMax = count($list); $i <= $iMax; $i++) {
                            if (isset($list[$i]['History']['name'])) {
                                $listSearch[$i]['name'] = $list[$i]['History']['name'];
                            }
                        }
                        if ($name === $list[0]['History']['name']) {
                            $this->response->body(json_encode(array('statut' => true, 'slug' => '/sanctions/profile?search=' . $name, 'msg' => 'Joueur trouver')));
                        } else {
                            $this->response->body(json_encode(array('statut' => true, 'list' => $listSearch, 'msg' => 'Joueur introuvale')));
                        }
                    } else {
                        $this->response->body(json_encode(array('statut' => true, 'msg' => 'Joueur introuvale')));
                    }
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => 'Minimum 3 caractère')));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => 'Champs obligatoire')));
            }
        }
    }
}