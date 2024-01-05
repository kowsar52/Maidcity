<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerMDWRequirementRequest;
use App\Models\EmployerMDWRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerMDWRequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $existUser = EmployerMDWRequirement::where('user_id', Auth::id())->count();
        if (Auth::user()->hasRole('Employer') && $existUser == 0){
            return view('website.employer-mdw-requirement.create');
        }
    }

    public function store(EmployerMDWRequirementRequest $request)
    {
        $model = $request->createData();
        if ($model){
            return redirect()->back()->with('success',__('general.my_mdw_requirement_created_successfully'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(EmployerMDWRequirementRequest $request, $id)
    {
        $model = $request->updateData($id);
        if ($model){
            return redirect()->back()->with('success',__('general.my_mdw_requirement_updated_successfully'));
        }
    }

    public function destroy($id)
    {
        //
    }
}
