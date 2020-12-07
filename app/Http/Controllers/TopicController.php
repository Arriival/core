<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $subjectId = $request->subject;
        $result = Topic::where('user_id', Auth::user()->id)->where('subject_id', $subjectId);
        $subject = Subject::find($subjectId);
        $result = $result->paginate(12);
        $data = ['result' => $result, 'subject' => $subject];
        return view('topic.Grid', $data);
    }

    public function getAll($id)
    {
        $result = Topic::where('user_id', Auth::user()->id)->where('subject_id', $id)->get();
        if ($result) {
            return response($result, 200);
        } else {
            return response(['res' => 'Not deleted'], 404);

        }
    }

    public function create(Request $request)
    {
        $data['entity'] = new Topic();
        $data['subjectId'] = $request->get('subjectId');
        return view('topic.Edit', $data);
    }

    public function store(Request $request)
    {
        $this->validator($request);
        $request['user_id'] = Auth::user()->id;
        Topic::create($request->all());
        $request['subject'] = $request->subject_id;
        return $this->index($request);
    }

    public function show($id)
    {

    }

    public function edit(Request $request, $id)
    {
        $data['entity'] = Topic::find($id);
        $data['subjectId'] = $request->get('subject');
        return view('topic.Edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request);
        Topic::find($id)->update($request->request->all());
        $request['subject'] = $request->subject_id;
        return $this->index($request);
    }

    public function destroy($id, Request $request)
    {
        Topic::find($id)->delete();
        return $this->index($request);
    }

    public function validator(Request $request)
    {
        $rules = [
            'title' => 'required',
        ];
        $customMessages = [
            'required' => 'الزامی',
        ];
        return $this->validate($request, $rules, $customMessages);

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
