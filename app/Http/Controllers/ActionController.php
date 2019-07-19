<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    static function createTreeView($actions, $parentList){
        while($parent = array_shift($parentList)) {
            $index = array_keys($actions);
            while ($i = array_shift($index)){
                if(!isset($actions[$i])){
                    continue;
                }
                if ($actions[$i]['parent_id'] == $parent) {
                    if(array_search($actions[$i]['id'], $parentList) !== false){
                        $actions = self::createTreeView($actions, [$actions[$i]['id']]);
                        $actions[$actions[$i]['parent_id']]['sub_menu'][] = $actions[$i];
                        unset($actions[$i]);
                        $index = array_keys($actions);
                    }
                    else{
                        $actions[$actions[$i]['parent_id']]['sub_menu'][] = $actions[$i];
                        unset($actions[$i]);
                    }

                }
            }
        }
        return $actions;
    }

    static function loadActions(){
        $arrayCategories = Action::orderBy('order','ASC')->get();
        $actions = [];
        $parentList = [];
        foreach($arrayCategories as $action){
            if(is_null($action->parent_id)){
                $action->parent_id = 0;
            }
            if(array_search($action->parent_id, $parentList) === false){
                $parentList[] = $action->parent_id;
            }
            $actions[$action->id] = [
                'parent_id' => $action->parent_id,
                'route' => $action->route,
                'order' => $action->order,
                'title' => $action->title,
                'id' => $action->id,
                'icon' => $action->icon,
                'sub_menu' => []
            ];
        }
        rsort($parentList, SORT_NUMERIC);
        $actions = self::createTreeView($actions, $parentList);
        return $actions;
    }

}
