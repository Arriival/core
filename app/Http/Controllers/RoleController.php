<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(?Request $request)
    {
        $roles = Role::query();
        if (!is_null($request))
            if ($request->has('name') && !is_null($request->name)) {
                $roles = Role::where('name', $request->name);
            }
        $data = ['roles' => $roles->paginate(10), 'request' => $request];
        return view('role.Grid', $data);
    }


    public function search(?Request $request)
    {
        $roles = Role::query();
        if (!is_null($request))
            if ($request->has('name') && !is_null($request->name)) {
                $roles = Role::where('name', $request->name);
            }
        $data = ['roles' => $roles->paginate(10), 'request' => $request];
        return $data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['role'] = new Role();
        return view('role.Edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        Role::create(['name' => $request->name]);
        return $this->index(null);
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
     */
    public function edit($id)
    {
        //
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
        Role::find($id)->delete();
        return redirect(url('role'));
    }


    public function validator(Request $request)
    {
        $rules = [
            'name' => 'required|alpha',
        ];

        $customMessages = [
            'required' => 'الزامی',
            'alpha' => 'نامعتبر',
        ];

        return $this->validate($request, $rules, $customMessages);

    }
}
