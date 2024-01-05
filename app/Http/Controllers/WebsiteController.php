<?php

namespace App\Http\Controllers;

use App\Imports\FdwBioDataImport;
use App\Imports\UsersImport;
use App\Models\Authorization\User;
use App\Models\ContactUs;
use App\Models\Job;
use App\Models\JoinUs;
use App\Models\Services;
use App\Models\SiteSetting;
use App\Services\GeneralService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function homePage(){
        $services = Services::latest()->take(4)->get();
        $slider = SiteSetting::where('label','slider_title')->first();
        $licenseNo = SiteSetting::where('label','license_no')->first();
        $sliderImg = SiteSetting::where('label','sliders')->first();
        $employerSay = SiteSetting::where('label','employer_reviews')->first();
        $apsImage1 = SiteSetting::where('label','aps_image1')->first();
        $apsImage2 = SiteSetting::where('label','aps_image2')->first();
        $apsDescription = SiteSetting::where('label','aps_description')->first();
        $apsList = SiteSetting::where('label','aps_list')->first();
        $ourServicesHeading = SiteSetting::where('label','our_services_heading')->first();
        $params = [
            'slider' => $slider,
            'licenseNo' => $licenseNo,
            'services' => $services,
            'sliderImg' => $sliderImg,
            'employerSay' => $employerSay,
            'apsImage1' => $apsImage1,
            'apsImage2' => $apsImage2,
            'apsDescription' => $apsDescription,
            'apsList' => $apsList,
            'ourServicesHeading' => $ourServicesHeading,
            'pageTitle' => __('general.maid_city'),
        ];
        return view('website.home-page.index', $params);
    }

    public function about(){
        $aboutUs = SiteSetting::where('label','about_us')->first();
        $params = [
            'aboutUs' => $aboutUs,
            'pageTitle' => __('general.about_us'),
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.about_us') => '',
            ]),
        ];
        return view('website.about-us.index', $params);
    }

    public function contactUs()
    {
        $params = [
            'pageTitle' => __('general.contact_us'),
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.contact_us') => '',
            ]),
        ];
        return view('website.contact-us.index', $params);
    }


    public function jobs(Request $request)
    {
        $data = Job::with('jobApply');
        if ($request->query('type') === 'mdw') {
            $data = $data->whereJsonContains('type_of_mdw', ['1'])
                ->orWhereJsonContains('type_of_mdw', ['2'])
                ->orWhereJsonContains('type_of_mdw', ['3'])
                ->orWhereJsonContains('type_of_mdw', ['5']);
        } elseif ($request->query('type') === 'caregiver') {
            $data = $data->whereJsonContains('type_of_mdw', ['4'])
                ->orWhereJsonContains('type_of_mdw', ['5']);
        }
        $data = $data->whereNot('status', 'mark_as_found')->latest()->get();
        $params = [
            'data' => $data,
            'pageTitle' => __('general.jobs'),
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.jobs') => '',
            ]),
        ];
        return view('website.jobs.index', $params);
    }

    public function jobDetail($id)
    {
        $job = Job::findOrFail($id);
        return view('website.jobs.job-detail',compact('job'));
    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'branch' => 'required',
        ]);

        $model = ContactUs::create($request->all());
        Mail::to(GeneralService::getMail('super_admin'))->send(new \App\Mail\ContactUs($model));
        if($model){
            return redirect()->back()->with('success', __('general.request_sent_successfully'));
        }else{
            return redirect()->back()->with('error', __('general.something_went_wrong'));
        }
    }

    public function joinUsStore(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:join_us','email'],
            'phone' => ['required'],
            'message' => ['required'],
            'file' => ['required','mimes:jpeg,png,jpg,doc,docx,pdf'],
        ]);
        $model = JoinUs::create($request->all());
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $storage = Storage::put('public/join-us', $files);
            $filePath = str_replace('public/','',$storage);
            $model->file = $filePath;
            $model->save();
        }
        if ($model){
            return redirect()->route('website.jobs')->with('success',__('general.record_saved_successfully'));
        }
    }

    public function emailVerify($id)
    {
        $model = User::findOrFail($id);
        $model->update([
            'email_verified_at' => Carbon::now(),
        ]);
        if ($model){
            if (!$model->hasRole('Supplier')){
                Auth::login($model);
            }
            return redirect()->route('website.home-page')->with('success',__('general.email_verified_successfully'));
        }
    }

    public function userImport()
    {
        $pageTitle = __('general.user_import');
        return view('website.import.user-import',compact('pageTitle'));
    }

    public function userImportStore(Request $request)
    {
        $request->validate([
            'file' => ['required','mimes:xls,xlsx,csv'],
        ]);
        DB::beginTransaction();
        try {
            \Excel::import(new UsersImport,$request->file('file'));
            DB::commit();
            return redirect()->route('website.user-import')->with('success',__('general.record_saved_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('website.user-import')->withErrors(['file' => $e->getMessage()]);
        }
    }

    public function mdwBiodataImport()
    {
        $pageTitle = __('general.mdw_biodata_import');
        return view('website.import.mdw-biodata-import', compact('pageTitle'));
    }

    public function mdwBiodataImportStore(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xls,xlsx,csv'],
        ]);
        DB::beginTransaction();
        try {
            \Excel::import(new FdwBioDataImport(), $request->file('file'));
            DB::commit();
            return redirect()->route('website.mdw-biodata-import')->with('success', __('general.record_saved_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('website.mdw-biodata-import')->withErrors(['file' => $e->getMessage()]);
        }
    }
}


