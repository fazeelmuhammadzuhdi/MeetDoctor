<?php

namespace App\Http\Controllers\Backsite;

use alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterData\Specialist;
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;

class SpecialistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {
        //mengambil data dari view
        $data = $request->all();

        //Memasukkan data ke dalam database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully Add New Specialist');
        // return redirect()->route('backsite.specialist.index');
        // return to_route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        //mengambil data dari view
        $data = $request->all();

        //Memasukkan data ke dalam database
        $specialist->update($data);

        alert()->success('Success Message', 'Successfully Update Specialist');
        // return redirect()->route('backsite.specialist.index');
        // return to_route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        //walaupun menggunakan softdeletes data di hapus secara permanen
        // $specialist->forceDelete();

        //jika menggunakan softdeletes maka data tidak di hapus secara permanen
        $specialist->delete();

        alert()->success('Success Message', 'Successfully Update Specialist');
        // return redirect()->route('backsite.specialist.index');
        // return to_route('backsite.specialist.index');
        // return back();

    }
}
