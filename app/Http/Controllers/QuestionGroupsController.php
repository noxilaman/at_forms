<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionGroup;
use App\Models\QuestionGroupDetail;
use App\Models\Question;

class QuestionGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionGroups = QuestionGroup::paginate(10);
        return view('question_groups.index', compact('questionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuestionGroup::create($request->all());
        return redirect()->route('question_groups.index')->with('success', 'Question Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionGroup = QuestionGroup::find($id);
        return view('question_groups.show', compact('questionGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionGroup = QuestionGroup::find($id);
        return view('question_groups.edit', compact('questionGroup'));
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
        QuestionGroup::find($id)->update($request->all());
        return redirect()->route('question_groups.index')->with('success', 'Question Group updated successfully.');
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

    public function addQuestion($id)
    {
        $questionGroup = QuestionGroup::find($id);
        $questionList = Question::where('status', 'active')->pluck('question', 'id');
        return view('question_groups.add_question', compact('questionGroup', 'questionList'));
    }

    public function storeQuestion(Request $request, $id)
    {
        $tmp = $request->all();
        $tmp['question_group_id'] = $id;
        $lastSequence = QuestionGroupDetail::where('question_group_id', $id)->max('sequence') ?? 0;
        $tmp['sequence'] = $lastSequence + 1;
        $tmp['status'] = 'active';

        $questionGroup = QuestionGroup::find($id);
        $questionGroup->questionGroupDetails()->create($tmp);
        return redirect()->route('question_groups.show', $id)->with('success', 'Question added successfully.');
    }

    public function moveupQuestion($id)
    {
        $questionSetDetail = QuestionGroupDetail::find($id);
        $questionSetDetail->moveOrderUp();
        return redirect()->route('question_groups.show', $questionSetDetail->question_group_id)->with('success', 'Question moved up successfully.');
    }

    public function movedownQuestion($id)
    {
        $questionSetDetail = QuestionGroupDetail::find($id);
        $questionSetDetail->moveOrderDown();
        return redirect()->route('question_groups.show', $questionSetDetail->question_group_id)->with('success', 'Question moved down successfully.');
    }

    public function removeQuestion($id)
    {
        $questionSetDetail = QuestionGroupDetail::find($id);
        $questionSetDetail->delete();
        return redirect()->route('question_groups.show', $questionSetDetail->question_group_id)->with('success', 'Question removed successfully.');
    }


}
