<?php

namespace Modules\Clients\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Clients\Entities\Client;
use Modules\CustomFields\Entities\CustomField;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $clients = json_encode(Client::all()->map(function($client){
            return $client->toVue();
        }));

        $countries = json_encode([
            ['code' => 'it', 'name' =>'Italy'], 
            ['code' => 'ru', 'name' => 'Russia'], 
            ['code' => 'sw', 'name' => 'Sweeden']
        ]);

        $allCustomFields = json_encode(CustomField::all()->toArray());

        return view('clients::list', [
            'clients' => $clients,
            'countries' => $countries,
            'allCustomFields' => $allCustomFields,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('clients::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('clients::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('clients::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
