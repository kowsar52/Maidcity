<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplyRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $job = Job::findOrFail($request->get('job_id'));
        return view('website.job-apply.create',compact('job'));
    }

    public function store(JobApplyRequest $request)
    {
        return $request->createData();
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

    public function jobShareSocialMedia($job_id)
    {
        $model = Job::findOrFail($job_id);
        $view = view('website.jobs.components.share-social-media-modal')->render();
        return response()->json([
            'view' => $view,
            'model' => $model,
        ]);
    }

    public function jobShareDetail($job_id)
    {
        $model = Job::findOrFail($job_id);
        $pageTitle = __('general.job_share_detail');
        $params = [
            'model' => $model,
            'pageTitle' => $pageTitle,
        ];
        return view('website.jobs.job-share-detail',$params);
    }
}
