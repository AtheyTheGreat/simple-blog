<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BaseController extends Controller
{
    protected $model;
    protected $allowedIncludes;
    protected $allowedFilters;
    protected $allowedSorts;
    protected $relation;

    //pass model through controller
    public function index()
    {
        $data =  QueryBuilder::for($this->model)
            ->with($this->relation)
            ->allowedFilters($this->allowedFilters)
            ->allowedIncludes($this->allowedIncludes)
            ->allowedSorts($this->allowedIncludes)
            ->defaultSorts("-id")
            ->simplePaginate(5);

        return $data;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // return $request->all();
        $model = app()->make($this->model);
        $validatedData = $request->validate($model->storeRules());
        //make sure data is validated through requests
        // return $validatedData;
        $data = $model::create($validatedData);
        return $data;
    }


    public function show($id)
    {
        $data = $this->model::findOrFail($id);
        return $data;
    }


    public function edit($id) {}


    public function update(Request $request, $id)
    {

        $model = app()->make($this->model);
        $modelData = $model->findOrFail($id);
        // dd($model);
        $validatedData = $request->validate($model->updateRules());
        // dd($validatedData);
        //make sure data is validated through requests
        $data = $modelData->update($validatedData);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\  $
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = app()->make($this->model);
        $modelData = $model->findOrFail($id);
        $modelData->delete();
        return response(null, 204);
    }
}
