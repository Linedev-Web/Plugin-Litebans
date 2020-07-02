<?php

class ProfileController extends LitebansAppController
{
    public function index()
    {

        $this->set('title_for_layout', 'Titre');
        $this->loadModel('Litebans.History');
        $this->loadModel('Litebans.Bans');
        $this->loadModel('Litebans.Mutes');
        $this->loadModel('Litebans.Kicks');
        $this->loadModel('Litebans.Warnings');

        $search = $this->request->query('search');
        $history = $this->History->getName($search);

        $history = $history['History'];
        $bans = $this->Bans->getFirstUuid($history['uuid']);
        $listBans = [];
        foreach ($bans as $key => $value) {
            $listBans[$key]['reason'] = $value['Bans']['reason'];
            $listBans[$key]['banned_by_name'] = $value['Bans']['banned_by_name'];
            $listBans[$key]['banned_by_uuid'] = $value['Bans']['banned_by_uuid'];
            $listBans[$key]['time'] = $this->millis_to_date($value['Bans']['time']);
            $listBans[$key]['until'] = $this->expiry($value['Bans']['until']);
            $listBans[$key]['active'] = $value['Bans']['active'];
            $listBans[$key]['server_origin'] = $value['Bans']['server_origin'];
            $listBans[$key]['date_reset'] = $this->dateStarAndDateEnd($value['Bans']['time'], $value['Bans']['until']);
        }
        $mutes = $this->Mutes->getFirstUuid($history['uuid']);
        $listMutes = [];
        foreach ($mutes as $key => $value) {
            $listMutes[$key]['reason'] = $value['Mutes']['reason'];
            $listMutes[$key]['banned_by_name'] = $value['Mutes']['banned_by_name'];
            $listMutes[$key]['banned_by_uuid'] = $value['Mutes']['banned_by_uuid'];
            $listMutes[$key]['time'] = $this->millis_to_date($value['Mutes']['time']);
            $listMutes[$key]['until'] = $this->expiry($value['Mutes']['until']);
            $listMutes[$key]['server_origin'] = $value['Mutes']['server_origin'];
            $listMutes[$key]['date_reset'] = $this->dateStarAndDateEnd($value['Mutes']['time'], $value['Bans']['until']);
        }

        $kicks = $this->Kicks->getFirstUuid($history['uuid']);
        $listKicks = [];
        foreach ($kicks as $key => $value) {
            $listKicks[$key]['reason'] = $value['Kicks']['reason'];
            $listKicks[$key]['banned_by_name'] = $value['Kicks']['banned_by_name'];
            $listKicks[$key]['banned_by_uuid'] = $value['Kicks']['banned_by_uuid'];
            $listKicks[$key]['time'] = $this->millis_to_date($value['Kicks']['time']);
            $listKicks[$key]['server_origin'] = $value['Kicks']['server_origin'];
        }

        $warnings = $this->Warnings->getFirstUuid($history['uuid']);
        $listWarnings = [];
        foreach ($warnings as $key => $value) {
            $listWarnings[$key]['reason'] = $value['Warnings']['reason'];
            $listWarnings[$key]['banned_by_name'] = $value['Warnings']['banned_by_name'];
            $listWarnings[$key]['banned_by_uuid'] = $value['Warnings']['banned_by_uuidbanned_by_uuid'];
            $listWarnings[$key]['time'] = $this->millis_to_date($value['Warnings']['time']);
            $listWarnings[$key]['server_origin'] = $value['Warnings']['server_origin'];
        }
        $this->set(compact('history', 'listBans', 'listMutes', 'listKicks', 'listWarnings'));
    }
}