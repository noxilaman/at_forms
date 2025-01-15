<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harvester;
use App\Models\HarvestLog;

class HarvestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harvesters = Harvester::orderBy('created_at', 'desc')->paginate(10);
        return view('harvesters.index', compact('harvesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harvesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Harvester::create($request->all());
        return redirect()->route('harvesters.index')
            ->with('success', 'Harvester created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $harvester = Harvester::find($id);
        return view('harvesters.view', compact('harvester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $harvester = Harvester::find($id);
        return view('harvesters.edit', compact('harvester'));
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
        Harvester::find($id)->update($request->all());
        return redirect()->route('harvesters.index')
            ->with('success', 'Harvester updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chk = HarvestLog::where('harvester_id', $id)->where('status','active')->count();
        if($chk > 0){
            return redirect()->route('harvesters.index')
                ->with('error', 'Cannot delete harvester. There are active harvest logs associated with this harvester.');
        }
        Harvester::find($id)->delete();
        return redirect()->route('harvesters.index')
            ->with('success', 'Harvester deleted successfully.');
    }
}
