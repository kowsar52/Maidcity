<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Authorization\User;
use App\Models\EmployerMDWRequirement;
use App\Models\FdwBioData;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $pageTitle = __('general.profile');
        $model = User::findOrFail(Auth::id());
        $employer_mdw_requirement = EmployerMDWRequirement::where('user_id', Auth::id())->first();
        $bio_data_shortlist = FdwBioData::with('shortlistBioData')
            ->whereHas('shortlistBioData', function ($query) {
                $query->where('employer_id', Auth::id());
            })
            ->get();
        $params = [
            'pageTitle' => $pageTitle,
            'model' => $model,
            'employer_mdw_requirement' => $employer_mdw_requirement,
            'bio_data_shortlist' => $bio_data_shortlist,
        ];
        return view('website.profile.edit', $params);
    }

    public function update(ProfileRequest $request)
    {
        $model = $request->updateData();
        if ($model){
            return redirect()->route('website.profile.edit')->with('success', __('general.profile_updated_successfully'));
        }
    }
}
