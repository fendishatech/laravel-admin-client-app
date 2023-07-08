<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view("clients.index")->with(['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.new');
    }

    public function createClient(array $validatedData)
    {
        $client = new Client();

        $client->id = Str::uuid();
        $client->first_name = $validatedData['first_name'];
        $client->last_name = $validatedData['last_name'];
        $client->phone_no = $validatedData['phone_no'];

        $client->save();

        return $client;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required|unique:clients'
        ]);

        if ($validatedData) {

            $client = $this->createClient($validatedData);

            return redirect('/clients')->with('success', 'Client added successfully.');
        } else {
            return redirect()->back()->withErrors("default error")->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        // $client = Client::find($id);
        // $client->delete();
        // return redirect('clients')->with("success", "Item has been deleted");
    }
}
