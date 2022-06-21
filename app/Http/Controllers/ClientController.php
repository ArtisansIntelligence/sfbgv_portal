<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;

class ClientController extends Controller
{

    public function clientsList()
    {
        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Client"], ['name' => "Clients"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        $clientsData = ClientModel::all();

        return view('pages.clients-list', ['breadcrumbs' => $breadcrumbs,'clientsData' => $clientsData], ['pageConfigs' => $pageConfigs]);
    }

    public function createClient()
    {
        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Client"], ['name' => "Client Onboarding"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.client-onboarding', ['breadcrumbs' => $breadcrumbs], ['pageConfigs' => $pageConfigs]);
    }

    public function addClient()
    {
        if(isset($_POST['submit'])){
            $clientData = $_POST;
            $criteriaClient = new ClientModel;
            $criteriaClient->fill($clientData);

        // dd($criteriaClient);
            if($criteriaClient->save()) {

                $data = array(
                    'clientData'=>$criteriaClient,
                    'status'=>'success',
                    'message'=>"Client created successfully",
                );

            }else{

                $data = array(
                    'status'=>'failed',
                    'message'=>"Unable to create client",
                );
            }

            return redirect()->to("clients");
        }

    }

}
