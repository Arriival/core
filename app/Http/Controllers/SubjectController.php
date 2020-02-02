<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $result = Subject::where('user_id', Auth::user()->id);
        $result = $result->paginate(12);
        $data = ['result' => $result];
        return view('subject.Grid', $data);
    }

    public function getAll()
    {
        $result = Subject::where('user_id', Auth::user()->id)->get();
        if ($result) {
            return response($result, 200);
        } else {
            return response(['res' => 'Not deleted'], 404);

        }
    }

    public function create()
    {
        $data['entity'] = new Subject();
        return view('subject.Edit', $data);
    }

    public function store(Request $request)
    {
        $this->validator($request);
        $request['user_id'] = Auth::user()->id;
        Subject::create($request->all());
        return $this->index();
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $data['entity'] = Subject::find($id);
        return view('subject.Edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request);
        Subject::find($id)->update($request->request->all());
        return redirect(url('subject'));
    }

    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect(url('subject'));
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
