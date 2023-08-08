<?php

namespace App\Controllers;

use App\Models\MProfile;

class CProfile extends BaseController
{
    public $mProfile;

    public function __construct()
    {
        $this->mProfile = new MProfile();
    }
    public function index()
    {
        if (session()->get("statusUser") == "") {
            $totaluser = $this->mProfile->getTotalUser();
            $data = [
                'totaluser' => $totaluser['total_user']
            ];
            return view('profile/index', $data);
        } else {
            return redirect()->to('/CLogin/index');
        }
    }
}
