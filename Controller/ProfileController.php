<?php

class ProfileController extends LitebansAppController
{
    public function index()
    {

        $this->loadModel('Litebans.History');

        $search = $this->request->query('search');
        $history = $this->History->getName($search);
        $this->set('title_for_layout', $this->Lang->get('LITEBANS__TITLE') . '/' . $search);
        if (!empty($history)) {

            $this->loadModel('Litebans.Bans');
            $this->loadModel('Litebans.Mutes');
            $this->loadModel('Litebans.Kicks');
            $this->loadModel('Litebans.Warnings');

            $history = $history['History'];
            $bans = $this->Bans->getFirstUuid($history['uuid']);
            $listBans = [];
            foreach ($bans as $key => $value) {
                $listBans[$key]['reason'] = $this->clean($value['Bans']['reason']);
                $listBans[$key]['banned_by_name'] = $value['Bans']['banned_by_name'];
                $listBans[$key]['banned_by_uuid'] = $value['Bans']['banned_by_uuid'];
                $listBans[$key]['removed_by_uuid'] = $value['Bans']['removed_by_uuid'];
                $listBans[$key]['removed_by_name'] = $value['Bans']['removed_by_name'];
                $listBans[$key]['time'] = $this->millis_to_date($value['Bans']['time']);
                $listBans[$key]['until'] = $this->expiry($value['Bans']['until']);
                $listBans[$key]['active'] = $value['Bans']['active'];
                $listBans[$key]['server_origin'] = $value['Bans']['server_origin'];
                $listBans[$key]['date_reset'] = $this->dateStarAndDateEnd($value['Bans']['until']);
                $listBans[$key]['active'] = $value['Bans']['active'];
            }
            $mutes = $this->Mutes->getFirstUuid($history['uuid']);
            $listMutes = [];
            foreach ($mutes as $key => $value) {
                $listMutes[$key]['reason'] = $this->clean($value['Mutes']['reason']);
                $listMutes[$key]['banned_by_name'] = $value['Mutes']['banned_by_name'];
                $listMutes[$key]['banned_by_uuid'] = $value['Mutes']['banned_by_uuid'];
                $listMutes[$key]['removed_by_uuid'] = $value['Mutes']['removed_by_uuid'];
                $listMutes[$key]['removed_by_name'] = $value['Mutes']['removed_by_name'];
                $listMutes[$key]['time'] = $this->millis_to_date($value['Mutes']['time']);
                $listMutes[$key]['until'] = $this->expiry($value['Mutes']['until']);
                $listMutes[$key]['server_origin'] = $value['Mutes']['server_origin'];
                $listMutes[$key]['date_reset'] = $this->dateStarAndDateEnd($value['Mutes']['until']);
                $listMutes[$key]['active'] = $value['Mutes']['active'];
            }

            $kicks = $this->Kicks->getFirstUuid($history['uuid']);
            $listKicks = [];
            foreach ($kicks as $key => $value) {
                $listKicks[$key]['reason'] = $this->clean($value['Kicks']['reason']);
                $listKicks[$key]['banned_by_name'] = $value['Kicks']['banned_by_name'];
                $listKicks[$key]['banned_by_uuid'] = $value['Kicks']['banned_by_uuid'];
                $listKicks[$key]['time'] = $this->millis_to_date($value['Kicks']['time']);
                $listKicks[$key]['server_origin'] = $value['Kicks']['server_origin'];
            }

            $warnings = $this->Warnings->getFirstUuid($history['uuid']);
            $listWarnings = [];
            foreach ($warnings as $key => $value) {
                $listWarnings[$key]['reason'] = $this->clean($value['Warnings']['reason']);
                $listWarnings[$key]['banned_by_name'] = $value['Warnings']['banned_by_name'];
                $listWarnings[$key]['banned_by_uuid'] = $value['Warnings']['banned_by_uuid'];
                $listBans[$key]['removed_by_uuid'] = $value['Warnings']['removed_by_uuid'];
                $listBans[$key]['removed_by_name'] = $value['Warnings']['removed_by_name'];
                $listWarnings[$key]['time'] = $this->millis_to_date($value['Warnings']['time']);
                $listWarnings[$key]['server_origin'] = $value['Warnings']['server_origin'];
                $listWarnings[$key]['date_reset'] = $this->dateStarAndDateEnd($value['Warnings']['until']);
                $listWarnings[$key]['active'] = $value['Warnings']['active'];
            }
            $this->set(compact('history', 'listBans', 'listMutes', 'listKicks', 'listWarnings'));
        } else {
            $this->redirect('/sanctions');
        }
    }
}