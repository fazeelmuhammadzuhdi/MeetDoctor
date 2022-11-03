<?php

namespace App\Http\Controllers\Backsite;

use Illuminate\Http\Request;
use App\Models\Operational\Doctor;
use App\Http\Controllers\Controller;
use App\Models\MasterData\Specialist;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
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
        // for table grid
        $doctor = Doctor::orderBy('created_at', 'desc')->get();

        // for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.index', compact('doctor', 'specialist'));
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
    public function store(StoreDoctorRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // // re format before push to table
        // $data['fee'] = str_replace(',', '', $data['fee']);
        // $data['fee'] = str_replace('IDR ', '', $data['fee']);

        // // upload process here
        // $path = public_path('app/public/assets/file-doctor');
        // if (!File::isDirectory($path)) {
        //     $response = Storage::makeDirectory('public/assets/file-doctor');
        // }

        // // change file locations
        // if (isset($data['photo'])) {
        //     $data['photo'] = $request->file('photo')->store(
        //         'assets/file-doctor',
        //         'public'
        //     );
        // } else {
        //     $data['photo'] = "";
        // }

        // store to database
        $doctor = Doctor::create($data);

        alert()->success('Success Message', 'Successfully added new doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // for select2 = ascending a to z
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.edit', compact('doctor', 'specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        // get all request from frontsite
        $data = $request->all();

        // // re format before push to table
        // $data['fee'] = str_replace(',', '', $data['fee']);
        // $data['fee'] = str_replace('IDR ', '', $data['fee']);

        // // upload process here
        // // change format photo
        // if (isset($data['photo'])) {

        //     // first checking old photo to delete from storage
        //     $get_item = $doctor['photo'];

        //     // change file locations
        //     $data['photo'] = $request->file('photo')->store(
        //         'assets/file-doctor',
        //         'public'
        //     );

        //     // delete old photo from storage
        //     $data_old = 'storage/' . $get_item;
        //     if (File::exists($data_old)) {
        //         File::delete($data_old);
        //     } else {
        //         File::delete('storage/app/public/' . $get_item);
        //     }
        // }

        // update to database
        $doctor->update($data);

        alert()->success('Success Message', 'Successfully updated doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        // first checking old file to delete from storage
        // $get_item = $doctor['photo'];

        // $data = 'storage/' . $get_item;
        // if (File::exists($data)) {
        //     File::delete($data);
        // } else {
        //     File::delete('storage/app/public/' . $get_item);
        // }

        $doctor->forceDelete();

        alert()->success('Success Message', 'Successfully deleted doctor');
        return back();
    }
}