<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\RequestPrescription;
use App\Models\Response;

class RequestPrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requestPrescriptions = RequestPrescription::all();
        $requestPrescriptions = RequestPrescription::where('user_id', '=', Auth::id())->get();
        return view('requests.index', ['requests' => $requestPrescriptions]);
        
    }

    public function acceptedIndex(){
        $respondedPrescriptions = RequestPrescription::all();
        $respondedPrescriptions = RequestPrescription::where('user_id', '=', Auth::id())->get();
        return view('requests.responseIndex', ['requests' => $respondedPrescriptions]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request, array(
            'title' => 'required|max:50',
            'body' => 'required|max:200',
        ));

        $requestPrescription = new RequestPrescription;
        $requestPrescription->title = $request->title;
        $requestPrescription->body = $request->body;
        $requestPrescription->user_id = Auth::id();
        
        $requestPrescription->save();

        session()->flash('message', 'Request Created.');
        return redirect()->route('requests.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $requestPrescription = RequestPrescription::findOrFail($id);
        $responses = Response::where('requestPrescription_id', '=', $requestPrescription->id)->get();
        return view('requests.show', compact('requestPrescription','responses'));
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
        $requestPrescription = RequestPrescription::findOrFail($id);
        //$this->authorize('update', $post);
        return view('requests.edit')->with('request', $requestPrescription);
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
            'title' => 'required|max:50',
            'body' => 'required|max:200',
        ]);
        $requestPrescription = RequestPrescription::find($id);
        $requestPrescription->title = $request->input('title');
        $requestPrescription->body = $request->input('body');
        $requestPrescription->save();
        
        return redirect()->route('requests.show', ['id' => $id])->with('success', 'Request updated');
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
        $requestPrescription = RequestPrescription::findOrFail($id);
        $requestPrescription->delete();
        return redirect()->route('requests.index')->with('message', 'Request deleted.');
    }
}
