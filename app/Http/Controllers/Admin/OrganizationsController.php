<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\organization_organization_category;
use App\Models\Organizations;
use App\Models\OrganizationsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Organizations::orderByDesc('created_at')->with('categories')->get();
        return view('admin.orgs.index')->with([
            'work' => $work,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = OrganizationsCategory::all();
        return view('admin.orgs.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'eName' => 'required',
            'category' => 'required',
            'website' => 'required',
            'country' => 'required',
            'selectedDate' => 'required',
            'desc' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $organizations = Organizations::create([
                'Org_Name' => $request->input('eName'),
                'Website' => $request->input('website'),
                'Country' => $request->input('country'),
                'Description' => $request->input('desc'),
                'Founded_Date' => $request->input('selectedDate'),
                'org_category_id' => $request->input('category'),
            ]);

            organization_organization_category::create([
                'org_id' => $organizations->id,
                'org_category_id' => $request->input('category'),
            ]);

            if(!$organizations){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('organizations.index')->with('message', 'Category Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.orgs.show')->with([
            // 'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.orgs.edit')->with([
            // 'users' => $users
        ]);
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
        $request->validate([
            'eName' => '',
            'category' => 'required',
            'website' => '',
            'country' => '',
            'selectedDate' => '',
            'desc' => '',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $organizations = Organizations::where('id', $id)->update([
                'Org_Name' => $request->input('eName'),
                'Website' => $request->input('website'),
                'Country' => $request->input('country'),
                'Description' => $request->input('desc'),
                'Founded_Date' => $request->input('selectedDate'),
            ]);

            if(!$organizations){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('organizations.index')->with('message', 'Category Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Organizations::find($id);
        $category->delete();
        return redirect()->route('organizations.index')->with('message', 'Category Deleted Successfully.');
    }
}
