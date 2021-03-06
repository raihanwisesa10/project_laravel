<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Activity;
use \App\Profile;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = DB::table('profiles')
            ->join('activities', 'profiles.id_pemain', '=', 'activities.id_pemain')->get();

        return view('dashboard.activity', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *atas
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        global $profiles;
        $profiles = Profile::all();

        return view('dashboard.tambahdata_aktivitas', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemain' => 'required',
            'point' => 'required',
            'assist' => 'required',
            'steal' => 'required',
            'block' => 'required',
            'rebound' => 'required'
        ]);

        Activity::create($request->all());
        return redirect('activity')->with('status', 'Data Pemain Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemain)
    {
        $activity = DB::table('profiles')
            ->join('activities', 'profiles.id_pemain', '=', 'activities.id_pemain')->where('profiles.id_pemain', '=', $id_pemain)->get();

        return view('dashboard.ubahdata_pemain', compact('activity'));
    }

    public function update(Request $request, $id_pemain)
    {

        $activity = Activity::where('id_pemain', '=', $id_pemain)->firstOrFail();

        $activity->id_pemain = $request->get('id_pemain');
        $activity->point = $request->get('point');
        $activity->assist = $request->get('assist');
        $activity->steal = $request->get('steal');
        $activity->block = $request->get('block');
        $activity->rebound = $request->get('rebound');
        $activity->save();
        return redirect('activity')->with('status', 'Data berhasil Diubah.');
    }

    public function back()
    {
        return redirect('/');
    }

    public function destroy($id_act)
    {
        $activity = Activity::where('id_act', '=', $id_act)->firstOrFail();

        $activity->delete();
        return redirect('activity')->with('status', 'Data berhasil Dihapus.');
    }
}
