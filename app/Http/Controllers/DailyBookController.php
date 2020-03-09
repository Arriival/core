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
        $query = $this->query($request);
        $result = $query->orderBy('date', 'desc')->paginate(20);
        $totalRemaining = $this->calculateRemaining($request->topic);
        $data = ['result' => $result, 'subject' => $request->subject, 'topic_id' => $request->topic, 'totalRemaining' => $totalRemaining, 'request' => $request];
        return view('dailyBook.Grid', $data);
    }

    public function calculateRemaining($topicId)
    {
        if (is_null($topicId)) {
            return DailyBook::where('user_id', Auth::user()->id)->sum('amount');
        } else {
            return DailyBook::where('user_id', Auth::user()->id)->where('topic_id', $topicId)->sum('amount');
        }
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
        DailyBook::create($this->uploadFile($request, null)->all());
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
        DailyBook::find($id)->update($this->uploadFile($request, $id)->all());
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

    public function uploadFile(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            if ($id != null) {
                Storage::delete(DailyBook::find($id)->attachFile);
            }
            $request->request->add(['attachFile' => $request->file('file')->store('public/dailyBook')]);
        }
        return $request;
    }


    public function getReport(Request $request)
    {

        $query = $this->query($request);
        $result = $query->orderBy('date', 'desc')->get();
        $data = ['result' => $result, 'subject' => $request->subject, 'topic_id' => $request->topic, 'request' => $request];
        return view('dailyBook.Report', $data);

        /* $subject = Subject::find($request->subject);
         $topic = Topic::find($request->topic);
         $param = $request->all() + ['currentDate' => Verta::create()->format('Y/n/j')];
         if ($subject != null) {
             $param = $param + ['subjectTitle' => $subject->title];
         }
         if ($topic != null) {
             $param = $param + ['topicTitle' => $topic->title];

         }
         $jasper = new PHPJasper;
         $input = base_path() . '/resources/report/dailyBook/dailyBookReport.jasper';
         $output = base_path() . '/storage/app/local';
         $options = [
             'format' => ['html'],
             'params' => $param,
             'db_connection' => [
                 'driver' => 'mysql',
                 'username' => 'root',
                 'host' => '127.0.0.1',
                 'database' => 'core',
                 'port' => '3306'
             ]
         ];
         $jasper->process(
             $input,
             $output,
             $options
         )->execute();
         $file = base_path() . '/storage/app/local/dailyBookReport.html';
         return response()->download($file, 'report');*/
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Query\Builder
     */
    public function query(Request $request): \Illuminate\Database\Query\Builder
    {
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
        if ($request->has('searchCode') && !is_null($request->searchCode)) {
            $query->where('code', $request->searchCode);
        }
        if ($request->has('documentNumber') && !is_null($request->documentNumber)) {
            $query->where('document_number', $request->documentNumber);
        }
        $query->where('topic_id', $request->topic);

        $query->where('user_id', Auth::user()->id);
        return $query;
    }
}
