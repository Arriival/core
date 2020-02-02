<?php

namespace App\Http\Controllers;

use App\DailyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyBookController extends Controller
{
    public function index(Request $request)
    {
        $result = DailyBook::where('user_id', Auth::user()->id)->where('topic_id', $request->topic)->orderBy('date', 'asc');
        $result = $result->paginate(10);
        $totalRemaining = $this->calculateRemaining($request->topic);
        $data = ['result' => $result, 'subject' => $request->subject, 'topic_id' => $request->topic, 'totalRemaining'=>$totalRemaining];
        return view('dailyBook.Grid', $data);
    }

    public function calculateRemaining($topicId)
    {
        return DailyBook::where('user_id', Auth::user()->id)->where('topic_id', $topicId)->sum('amount');
    }

    public function create()
    {
        $data['entity'] = new DailyBook();
        return view('dailyBook.Edit', $data);
    }

    public function store(Request $request)
    {
        $this->validator($request);
        $request['user_id'] = Auth::user()->id;
        $request['amount'] = $request['amount'] * $request['amountType'];
        DailyBook::create($request->all());
        $request['subject'] = $request->subject;
        $request['topic'] = $request->topic_id;
        return $this->index($request);
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $data['entity'] = DailyBook::find($id);
        $data['subject'] = $request->get('subject');
        return view('dailyBook.Edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request);
        $request['amount'] = $request['amount'] * $request['amountType'];
        DailyBook::find($id)->update($request->request->all());
        $request['subject'] = $request->subject;
        $request['topic'] = $request->topic_id;
        return $this->index($request);
    }

    public function destroy($id, Request $request)
    {
        DailyBook::find($id)->delete();
        return $this->index($request);
    }

    public function validator(Request $request)
    {
        $rules = [
            'date' => 'required',
            'topic_id' => 'required',
            'amount' => 'required',
        ];
        $customMessages = [
            'required' => 'الزامی',
            'number' => 'فقط عدد وارد کنید',
        ];
        return $this->validate($request, $rules, $customMessages);

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
