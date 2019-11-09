<?php

namespace App\Http\Controllers;

use App\BasePerson;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $users = User::query();
        $users = $users->paginate(12);
        $data = ['users' => $users];
        return view('user.Grid', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(Request $request)
    {
        $personId = $request->get('person');
        $data['user'] = new User();
        $data['person'] = BasePerson::find($personId);
        return view('user.Edit', $data);
    }

    public function showPersonList(Request $request)
    {
        return redirect(route('personnel.list', $request->query->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit($id)
    {
        $user = User::find($id);
        $person = BasePerson::find($user->person->id);
        $data['person'] = $person;
        $data['user'] = $user;
        return view('user.Edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::id() == $id) {
            return redirect()->back()->with('warning', 'امکان حذف کاربر جاری وجود ندارد!');
        }
        User::find($id)->delete();
        return redirect(url('user'));
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $status = $user->status;
        if ($status == 1) {
            $user->status = 0;
        }
        if ($status == 0) {
            $user->status = 1;
        }
        $user->save();
        return redirect(url('user'));
    }
}
