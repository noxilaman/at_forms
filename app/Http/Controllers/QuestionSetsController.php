<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuestionSet;
use App\Models\QuestionGroup;
use App\Models\QuestionSetDetail;

class QuestionSetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionSets = QuestionSet::paginate(10);
        return view('question_sets.index', compact('questionSets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question_sets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuestionSet::create($request->all());
        return redirect()->route('question_sets.index')->with('success', 'Question Set created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionSet = QuestionSet::find($id);
        return view('question_sets.show', compact('questionSet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionSet = QuestionSet::find($id);
        return view('question_sets.edit', compact('questionSet'));
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
        QuestionSet::find($id)->update($request->all());
        return redirect()->route('question_sets.index')->with('success', 'Question Set updated successfully.');
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

    public function addQuestionGroup($id)
    {
        $questionSet = QuestionSet::find($id);
        $questionGroupList = QuestionGroup::where('status', 'active')->pluck('name', 'id');
        return view('question_sets.add_question_group', compact('id', 'questionSet', 'questionGroupList'));
    }

    public function storeQuestionGroup(Request $request, $id)
    {
        $tmp = $request->all();
        $tmp['question_set_id'] = $id;
        $lastSequence = QuestionSetDetail::where('question_set_id', $id)->max('sequence') ?? 0;
        $tmp['sequence'] = $lastSequence + 1;
        $tmp['status'] = 'active';

        $questionSet = QuestionSet::find($id);
        $questionSet->questionSetDetails()->create($tmp);

        (new QuestionSetDetail())->regenratesequences($id);


        return redirect()->route('question_sets.show', $id)->with('success', 'Question Group created successfully.');
    }

    public function moveupQuestionGroup($id)
    {
        $questionSetDetail = QuestionSetDetail::find($id);
        $currentSequence = $questionSetDetail->sequence;
        $previousDetail = QuestionSetDetail::where('question_set_id', $questionSetDetail->question_set_id)
            ->where('sequence', '<', $currentSequence)
            ->orderBy('sequence', 'desc')
            ->first();

        if ($previousDetail) {
            $questionSetDetail->sequence = $previousDetail->sequence;
            $previousDetail->sequence = $currentSequence;

            $questionSetDetail->save();
            $previousDetail->save();
        }
        return redirect()->route('question_sets.show', $questionSetDetail->question_set_id)->with('success', 'Question Group moved up successfully.');
    }

    public function movedownQuestionGroup($id)
    {
        $questionSetDetail = QuestionSetDetail::find($id);
        $currentSequence = $questionSetDetail->sequence;
        $nextDetail = QuestionSetDetail::where('question_set_id', $questionSetDetail->question_set_id)
            ->where('sequence', '>', $questionSetDetail->sequence)
            ->orderBy('sequence', 'asc')
            ->first();

        if ($nextDetail) {
            $questionSetDetail->sequence = $nextDetail->sequence;
            $nextDetail->sequence = $currentSequence;

            $questionSetDetail->save();
            $nextDetail->save();
        }
        return redirect()->route('question_sets.show', $questionSetDetail->question_set_id)->with('success', 'Question Group moved down successfully.');
    }

    public function removeQuestionGroup($id)
    {
        $questionSetDetail = QuestionSetDetail::find($id);
        $questionSetId = $questionSetDetail->question_set_id;
        $questionSetDetail->delete();
        return redirect()->route('question_sets.show', $questionSetId)->with('success', 'Question Group removed successfully.');
    }

}
