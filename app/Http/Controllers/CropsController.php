<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;
use App\Models\ActiveCrop;

class CropsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCrop = ActiveCrop::first();
        $crops = Crop::orderBy('created', 'desc')->paginate(10);
        return view('crops.index', compact('crops', 'activeCrop'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crop = Crop::find($id);
        return view('crops.view', compact('crop'));
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
    }

    public function activate($id)
    {
        $crop = Crop::find($id);
        $activeCrop = ActiveCrop::first();
        if ($activeCrop) {
            $activeCrop->crop_id = $crop->id;
            $activeCrop->status = 'active';
            $activeCrop->save();
        } else {
            $activeCrop = new ActiveCrop();
            $activeCrop->crop_id = $crop->id;
            $activeCrop->status = 'active';
            $activeCrop->save();
        }
        return redirect()->route('crops.index');
    }
}
