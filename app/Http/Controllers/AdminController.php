<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestPrescription;
use App\Models\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\myTestMail;


class AdminController extends Controller
{

    public function index()
    {
        //$this->authorize('viewAny');
        if(Auth::user()->is_admin == 1){
        $requestPrescriptions = RequestPrescription::all();
        return view('admin.index', ['requests' => $requestPrescriptions]);
        }
        else{
            abort(403);
        }
    }

    public function acceptedIndex(){
        if(Auth::user()->is_admin == 1){
            $requestPrescriptions = RequestPrescription::all();
            return view('admin.adminResponseIndex', ['requests' => $requestPrescriptions]);
            }
            else{
                abort(403);
            }
    }

    public function userIndex(){
        $users = User::all();
        return view('admin.userIndex', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }


    public function store($id)
    {   

        $requestPrescription = RequestPrescription::findOrFail($id);
        //$this->authorize('store', $requestPrescription);
        if(Auth::user()->is_admin == 1){
        $data = $requestPrescription;

        Mail::to($requestPrescription->user->email)->send(new myTestMail($data));
        
        session()->flash('message', 'Email Sent.');
        return redirect()->route('requests.show', ['id' => $requestPrescription->id]);
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'condition' => 'required',
        ]);
        $user = User::find($id);
        $user->condition = $request->input('condition');
        $user->save();
        return redirect()->route('admin.show', ['id' => $id])->with('success', 'Condition updated');
    }
}
