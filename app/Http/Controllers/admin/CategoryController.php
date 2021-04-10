<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\AppHelper\Concerns\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\Factory;
use Session;

class CategoryController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = DB::table('categories')
        //     ->join('roles', 'users.user_role', '=', 'roles.id')
        //     ->join('status', 'users.status', '=', 'status.id')
        //     ->select('users.*', 'roles.desc', 'status.desc as status')
        //     ->get();
        if ($request->ajax()) {
            return datatables()
                ->of(DB::table('categories'))
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'category';
                    return view('admin.common.datatable.action', compact('data', 'model'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categorys = DB::table('categories')->pluck('title', 'id');
        $categorys->prepend('Please Select Parents', '0');
        //dd($categorys);
        return view('admin.category.create',  ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);
        $Category = new Category();
        $Category->title = $request['title'];
        $Category->slug = $this->slug($Category, $request['title']);
        $Category->parent_id = $request['parent_id'];
        $Category->description = $request['description'];
        $Category->status = $request['status'];
        // add other fields
        $Category->save();
        $Category->fresh();

        if($request['parent_id']!='0'){
            $child_parent = DB::table('categories')->where('id', '=',  $request['parent_id'])->get();
            $parent_id = $child_parent['0']->parent_id;
            $parent_array = $request['parent_id'];
            $parent_array .= '.' . $parent_id;

            if ($parent_id != '0') {
                $child_parent = DB::table('categories')->where('id', '=',  $parent_id)->get();
                $parent_id = $child_parent['0']->parent_id;
                $parent_array .= '.' . $parent_id;
                if ($parent_id != '0') {
                    $child_parent = DB::table('categories')->where('id', '=',  $parent_id)->get();
                    $parent_id = $child_parent['0']->parent_id;
                    $parent_array .= '.' . $parent_id;
                    if ($parent_id != '0') {
                        $child_parent = DB::table('categories')->where('id', '=',  $parent_id)->get();
                        $parent_id = $child_parent['0']->parent_id;
                        $parent_array .= '.' . $parent_id;
                    }
                }
            }
            $Category->keys_rel = strrev($parent_array); //$request['sku'];
        }

        $Category->save();
        Session::flash('success', 'Record successfully created.');
        return view('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = [];
        $Category_data = new Category();
        $data['row'] = $Category_data->find($id);
        return view('admin.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $Category = new Category();
        $data['row'] = $Category->find($id);
        $categorys = DB::table('categories')->pluck('title', 'id');
        $categorys->prepend('Please Select Parents', '');
        return view('admin.category.edit', compact('data', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Category = new Category();
        $Category_update = $Category->find($id);
        //return $request;
        $Category_update->update($request->all());
        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = new Category();
        $Category_del = $Category->find($id);
        $Category_del->delete();
        return redirect()->route('admin.category.index');
    }
}
