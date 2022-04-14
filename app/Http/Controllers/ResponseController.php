<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RequestPrescription;
use App\Models\Response;


class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('response.index', ['responses' => $responses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('requests.show', ['id' => $requestPrescription_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $this->validate($request,[
            'body' => 'required|max:255',
        ]);

        $requestPrescription = RequestPrescription::findOrFail($id);
        
        $response = new Response();
        $response->body = $request->body;
        $response->user_id = Auth::id();
        $response->requestPrescription_id = $requestPrescription->id;
        $response->save();
        if(Auth::user()->is_admin == 1){
        $requestPrescription->hasResponded = 1;
        }
        $requestPrescription->save();
        
        session()->flash('message', 'Response Created.');
        return redirect()->route('requests.show', ['id' => $requestPrescription->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $requestPrescription = RequestPrescription::with('responses')->find($id);
        return view('responses.show')->with('requestPrescription', $requestPrescription);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $response = Response::findOrFail($id);
        return view('responses.edit')->with('response', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'body' => 'required'
        ]);
        $response = Response::find($id);
        $response->body = $request->input('body');
        $response->save();
        
        return redirect()->route('requests.show', ['id' => $response->requestPrescription_id])->with('success', 'Response updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $response = Response::findOrFail($id);
        $tempResponse = $response->RequestPrescription_id;
        $response->delete();
        return redirect()->route('requests.show', ['id' => $tempResponse])->with('message', 'Response deleted.');
    }
}
