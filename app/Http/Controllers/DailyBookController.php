<?php

namespace App\Http\Controllers;

use App\DailyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyBookController extends Controller
{
    public function index()
    {
//        $result = DailyBook::where('user_id', Auth::user()->id);
        $result = new DailyBook();
        $result = $result->paginate(12);
        $data = ['result' => $result];
        return view('dailyBook.Grid', $data);
    }

    public function create()
    {
        $data['entity'] = new DailyBook();
        return view('dailyBook.Edit', $data);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
