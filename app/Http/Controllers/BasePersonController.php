<?php

namespace App\Http\Controllers;

use App\BasePerson;
use Illuminate\Http\Request;

class BasePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*      $role = Role::create(['name' => 'writer']);
              $user=Auth::user();
              $user->assignRole('writer');*/

        $person = BasePerson::query();

        if ($request->has('firstName') && !is_null($request->firstName)) {
            $person = BasePerson::where('firstName', $request->firstName);
        }
        if ($request->has('lastName') && !is_null($request->lastName)) {
            $person = BasePerson::where('lastName', $request->lastName);
        }
        if ($request->has('code') && !is_null($request->code)) {
            $person = BasePerson::where('code', $request->code);
        }

        $person = $person->paginate(12);
        $data = ['personnel' => $person, 'request' => $request];
        return view('layouts.personnel.Grid', $data);
    }

    public function list(Request $request)
    {
        $person = BasePerson::query();

        if ($request->has('firstName') && !is_null($request->firstName)) {
            $person = BasePerson::where('firstName', $request->firstName);
        }
        if ($request->has('lastName') && !is_null($request->lastName)) {
            $person = BasePerson::where('lastName', $request->lastName);
        }
        if ($request->has('code') && !is_null($request->code)) {
            $person = BasePerson::where('code', $request->code);
        }

        $person = $person->paginate(12);
        $data = ['personnel' => $person, 'request' => $request];
        return view('layouts.personnel.PersonnelList', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['person'] = new BasePerson();
        return view('layouts.personnel.New', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'firstName' => 'required|max:1',
            'lastName' => 'required|max:1',
        ]);*/
        $this->validator($request);

        BasePerson::create($request->all());
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = BasePerson::find($id);
        $data['person'] = $person;
//        return view_master('layouts.personnel.New', $data);
        return view('layouts.personnel.New', $data);
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

        $this->validator($request);
        BasePerson::find($id)->update($request->request->all());
        return redirect(url('personnel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = BasePerson::find($id)->delete();
        if ($person) {
            return response(['success' => 'true'], 200);
        } else {
            return response(['success' => 'Not deleted'], 404);

        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(Request $request)
    {
        $rules = [
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'code' => 'required|max:10|alpha_num',
            'gender' => 'required|boolean',
            'isActive' => 'required|boolean',
            'email' => 'nullable|email',
            'phoneNumber' => 'nullable|numeric',
        ];

        $customMessages = [
            'required' => 'الزامی',
            'max' => 'نامعتبر',
            'alpha' => 'نامعتبر',
            'alpha_num' => 'نامعتبر',
            'email' => 'نامعتبر',
            'numeric' => 'نامعتبر',
            'boolean' => 'انتخاب نشده',
        ];

        return $this->validate($request, $rules, $customMessages);

    }

}
