<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use App\Message;

use Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\PropertiSG;
use App\UserEmail;
use App\Artikel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified'])->only([
            'profil', 'gantiPassword', 'editakun', 'PropertiSG', 'hapusakun', 'tambahPropertiSG'
        ]);
    }
    public function index()
    {
        $houses = PropertiSG::limit(10)->orderBy('id','desc')->get();
        return view('layouts.master',compact('houses'));
    }

    //Logout Route
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // Search Result Methods
    public function cariPropertiSG()
    {
        $houses = PropertiSG::all();
        return view('hasil.hasilpropertisg',compact('houses'));
    }
    
    // Profile Page Methods
    public function gantiPassword()
    {
        $id = Auth::user()->id;
        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');
    
        });
        return view('profil.home', compact('messages'), array('user' => Auth::user()));
    }

    public function editProfil()
    {
        $id = Auth::user()->id;
        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');
    
        });
        return view('profil.home', compact('messages'), array('user' => Auth::user()));
    }

    public function hapusakun()
    {
        $id = Auth::user()->id;
        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');
    
        });
        return view('profil.home', compact('messages'), array('user' => Auth::user()));
    }

    public function PropertiSG()
    {
        $userId = auth()->id();
        $messages = UserEmail::where(function($query) use ($userId) 
        {
            $query->where('receiver_id','=', $userId);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');

        });

        $houses = PropertiSG::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profil.home', compact('houses','messages'),array('user' => Auth::user()));
    }

    // Add Propperties Methods
    public function tambahPropertiSG(){
        return view('layouts.properti.tambahpropertisg', array('user' => Auth::user()));
    }


    public function viewpost()
    {
        return view('hasil.view');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
