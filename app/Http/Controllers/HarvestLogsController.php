<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HarvestLog;
use App\Models\HarvestIssue;
use App\Models\Harvester;
use App\Models\Crop;
use App\Models\Farmer;
use App\Models\Driver;
use App\Models\ActiveCrop;

class HarvestLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCrops = ActiveCrop::where('status', 'active')->first();
        $cropList = Crop::pluck('name', 'id');
        $harvestLogs = HarvestLog::orderBy('created_at', 'desc')->paginate(10);
        return view('harvest_logs.index', compact('harvestLogs', 'cropList', 'activeCrops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $harvesterList = Harvester::where('status', 'active')->pluck('name', 'id');
        $activeCrops = ActiveCrop::where('status', 'active')->first();
        $cropList = Crop::pluck('name', 'id');
        //
        $driverList = Driver::where('status', 'active')->pluck('name', 'id');

        return view('harvest_logs.create',compact('harvesterList', 'cropList', 'driverList', 'activeCrops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tmp = $request->all();
        $tmp['farmer_id'] = 999;
        $tmp['start_time'] = date('Y-m-d H:i:s', strtotime($request->input('start_time')));
        $tmp['end_time'] = date('Y-m-d H:i:s', strtotime($request->input('end_time')));
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/harvestlogs', 'public');
            $tmp['picture_path'] = $path;
            $tmp['picture'] = $file->getClientOriginalName();
        }
        HarvestLog::create($tmp);

        return redirect()->route('harvest_logs.index')->with('success', 'Harvest Log created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $harvestLog = HarvestLog::find($id);
        $harvesterList = Harvester::where('status', 'active')->pluck('name', 'id');
        $activeCrops = ActiveCrop::where('status', 'active')->first();
        $cropList = Crop::pluck('name', 'id');
        //
        $driverList = Driver::where('status', 'active')->pluck('name', 'id');
        return view('harvest_logs.show', compact('harvestLog', 'harvesterList', 'cropList', 'driverList', 'activeCrops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $harvestLog = HarvestLog::find($id);
        $harvesterList = Harvester::where('status', 'active')->pluck('name', 'id');
        $cropList = Crop::pluck('name', 'id');
        $driverList = Driver::where('status', 'active')->pluck('name', 'id');
        return view('harvest_logs.edit', compact('harvestLog', 'harvesterList', 'cropList', 'driverList'));
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
        $tmp = $request->all();
        $tmp['start_time'] = date('Y-m-d H:i:s', strtotime($request->input('start_time')));
        $tmp['end_time'] = date('Y-m-d H:i:s', strtotime($request->input('end_time')));
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/harvestlogs', 'public');
            $tmp['picture_path'] = $path;
            $tmp['picture'] = $file->getClientOriginalName();
        }
        HarvestLog::find($id)->update($tmp);
        return redirect()->route('harvest_logs.index')->with('success', 'Harvest Log updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HarvestLog::find($id)->delete();
        return redirect()->route('harvest_logs.index')->with('success', 'Harvest Log deleted successfully.');
    }

    public function issues($id)
    {
        $harvestLog = HarvestLog::find($id);
        $cropList = Crop::pluck('name', 'id');
        $harvestIssues = HarvestIssue::where('harvest_log_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('harvest_logs.issues', compact('harvestLog', 'harvestIssues', 'cropList'));
    }

    public function addIssue($id)
    {
        $activeCrops = ActiveCrop::where('status', 'active')->first();
        $cropList = Crop::pluck('name', 'id');
        $harvestLog = HarvestLog::find($id);
        return view('harvest_logs.add_issue', compact('harvestLog', 'cropList', 'activeCrops'));
    }

    public function storeIssue(Request $request, $id)
    {
        $tmp = $request->all();
        $tmp['harvest_log_id'] = $id;
        $tmp['start_time'] = date('Y-m-d H:i:s', strtotime($request->input('start_time')));
        $tmp['end_time'] = date('Y-m-d H:i:s', strtotime($request->input('end_time')));
        $tmp['description'] = $request->input('description');
        $tmp['status'] = $request->input('status');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/harvestissues', 'public');
            $tmp['picture_path'] = $path;
            $tmp['picture'] = $file->getClientOriginalName();
        }

        HarvestIssue::create($tmp);

        return redirect()->route('harvest_logs.issues', $id)->with('success', 'Issue added successfully.');
    }

    public function editIssue($id)
    {
        $activeCrops = ActiveCrop::where('status', 'active')->first();
        $cropList = Crop::pluck('name', 'id');
        $harvestIssue = HarvestIssue::find($id);
        return view('harvest_logs.edit_issue', compact('harvestIssue', 'cropList', 'activeCrops'));
    }

    public function updateIssue(Request $request, $id)
    {
        $tmp = $request->all();
        $tmp['start_time'] = date('Y-m-d H:i:s', strtotime($request->input('start_time')));
        $tmp['end_time'] = date('Y-m-d H:i:s', strtotime($request->input('end_time')));
        $tmp['description'] = $request->input('description');
        $tmp['status'] = $request->input('status');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/harvestissues', 'public');
            $tmp['picture_path'] = $path;
            $tmp['picture'] = $file->getClientOriginalName();
        }

        HarvestIssue::find($id)->update($tmp);

        $harvetissue = HarvestIssue::find($id);

        return redirect()->route('harvest_logs.issues', $harvetissue->harvest_log_id)->with('success', 'Issue updated successfully.');
    }

    public function destroyIssue($id)
    {
        $harvestIssue = HarvestIssue::find($id);

        HarvestIssue::find($id)->delete();
        return redirect()->route('harvest_logs.issues', $harvestIssue->harvest_log_id)->with('success', 'Issue deleted successfully.');
    }

    public function showIssue($id)
    {
        $harvestIssue = HarvestIssue::find($id);
        $cropList = Crop::pluck('name', 'id');
        return view('harvest_logs.show_issue', compact('harvestIssue', 'cropList'));
    }

}
