<?php

namespace App\Http\Controllers;

use App\DailyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DailyBookController extends Controller
{
    public function index(Request $request)
    {

        Storage::disk('local')->put('file.txt', 'salam.');

        $query = DB::table('daily_books');
        if ($request->has('fromDate') && !is_null($request->fromDate)) {
            $query->where('date', '>=', $request->fromDate);
        }
        if ($request->has('toDate') && !is_null($request->toDate)) {
            $query->where('date', '<=', $request->toDate);
        }

        if ($request->has('amountFrom') && !is_null($request->amountFrom)) {
            $query->where('amount', '>=', $request->amountFrom);
        }
        if ($request->has('amountTo') && !is_null($request->amountTo)) {
            $query->where('amount', '<=', $request->amountTo);
        }
        if ($request->has('code') && !is_null($request->code)) {
            $query->where('code', $request->code);
        }
        if ($request->has('documentNumber') && !is_null($request->documentNumber)) {
            $query->where('document_number', $request->documentNumber);
        }
        $query->orWhere('user_id', Auth::user()->id)->where('topic_id', $request->topic);

        $result = $query->paginate(10);

        $totalRemaining = $this->calculateRemaining($request->topic);
        $data = ['result' => $result, 'subject' => $request->subject, 'topic_id' => $request->topic, 'totalRemaining' => $totalRemaining, 'request' => $request];
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
