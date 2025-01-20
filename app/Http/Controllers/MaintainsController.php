<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintainMaster;
use App\Models\MaintainDetail;
use App\Models\QuestionSet;
use App\Models\Question;
use App\Models\Harvester;
use App\Models\Driver;
use App\Models\Mechanic;


class MaintainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintains = MaintainMaster::paginate(10);
        return view('maintains.index', compact('maintains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $harvesterList = Harvester::where('status', 'active')->pluck('name', 'id');
        $driverList = Driver::where('status', 'active')->pluck('name', 'id');
        $mechanicList = Mechanic::where('status', 'active')->pluck('name', 'id');
        $questionSetList = QuestionSet::where('status', 'active')->pluck('name', 'id');
        return view('maintains.create', compact('harvesterList', 'driverList', 'mechanicList', 'questionSetList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //MaintainMaster::create($request->all());
        $maintainMaster = MaintainMaster::create($request->all());

        $questionSetDetails = $maintainMaster->questionSet->questionSetDetails()->orderBy('sequence')->get();

        $seq = 1;
        foreach ($questionSetDetails as $questionSetDetail) {

            $questionGroupDetails = $questionSetDetail->questionGroup->questionGroupDetails()->orderBy('sequence')->get();

            foreach ($questionGroupDetails as $questionGroupDetail) {
                MaintainDetail::create([
                    'maintain_master_id' => $maintainMaster->id,
                    'question_group_id' => $questionGroupDetail->question_group_id,
                    'question_id' => $questionGroupDetail->question_id,
                    'sequence' => $seq,
                    'status' => 'active',
                ]);
                $seq++;
            }
        }
        return redirect()->route('maintains.index')->with('success', 'Maintain created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintain = MaintainMaster::find($id);
        return view('maintains.show', compact('maintain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintain = MaintainMaster::find($id);
        $harvesterList = Harvester::where('status', 'active')->pluck('name', 'id');
        $driverList = Driver::where('status', 'active')->pluck('name', 'id');
        $mechanicList = Mechanic::where('status', 'active')->pluck('name', 'id');
        $questionSetList = QuestionSet::where('status', 'active')->pluck('name', 'id');
        return view('maintains.edit', compact('maintain', 'harvesterList', 'driverList', 'mechanicList', 'questionSetList'));
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
        MaintainMaster::find($id)->update($request->all());


        return redirect()->route('maintains.index')->with('success', 'Maintain updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MaintainDetail::where('maintain_master_id', $id)->delete();
        MaintainMaster::find($id)->delete();
        return redirect()->route('maintains.index')->with('success', 'Maintain deleted successfully.');
    }

    public function survey($id)
    {
        $maintain = MaintainMaster::find($id);
        return view('maintains.survey', compact('maintain'));
    }

    public function surveyUpdate(Request $request, $id)
    {
        $tmp = $request->all();
        // dd($tmp);
        $maintain = MaintainMaster::find($id);
        foreach ($maintain->maintainDetails as $maintainDetail) {
            if($tmp['answer1_'.$maintainDetail->id] != null){
                $maintainDetail->update([
                    'answer1' => $tmp['answer1_'.$maintainDetail->id],
                    'note1' => $tmp['note1_'.$maintainDetail->id],
                ]);
            }
        }

        return redirect()->route('maintains.index')->with('success', 'Survey updated successfully.');
    }
}
