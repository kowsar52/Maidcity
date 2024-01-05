<?php

namespace App\Http\Controllers;
use App\Mail\BioDataContactUsEmployerMail;
use App\Mail\BiodataOfHelper;
use App\Models\Employer;
use App\Models\FdwBioData;
use App\Models\FDWBioDataContactUsEmployer;
use App\Services\FdwBioDataService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FdwBioDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit','printPdf','momPdf','dataTypeModalShow']]);
    }
    public function index(Request $request)
    {
        $data = FdwBioData::with('shortlistBioData', 'languageAbilities', 'bioDataDetail', 'workExperienceWithEmployers')
            ->where('status', 'published');
        $data = FdwBioDataService::getAdvancedSearchData($request, $data);
        $data = $data->latest()->paginate(10);
        $params = [
            'pageTitle' => __('general.bio_data'),
            'data'=> $data,
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.bio_data') => '',
            ]),
        ];

        return view('website.bio-data.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
           'status' => 'pending',
        ]);
        $model = FDWBioDataContactUsEmployer::create($request->all());
        Mail::to('contact@maidcity.com.sg')->send(new BioDataContactUsEmployerMail($model));
        Mail::to($model->branch_enquiry)->send(new BioDataContactUsEmployerMail($model));
        Mail::to($model->employer->email)->send(new BiodataOfHelper($model));
        if($model)
        {
            return redirect()->back()->with('success', __('general.message_send_successfully'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = FdwBioData::findOrFail($id);
        $params = [
            'pageTitle' => __('general.bio_data_detail'),
            'model'=> $model,
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.bio_data_detail') => '',
            ]),
        ];
        return view('website.bio-data.view-profile', $params);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Auth::user()->hasRole('Employer')){
            $employer = Employer::where('user_id', Auth::id())->first();
            $model = FdwBioData::findOrFail($id);
            $params = [
                'model' => $model,
                'employer' => $employer,
            ];
            $view = view('website.bio-data.components.contact-us-modal',$params)->render();
            return response()->json([
                'success' => true,
                'view' => $view,
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => __('general.only_employer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function  printPdf($id)
    {
        $model = FdwBioData::find(convert_uudecode($id));
        $pdf = Pdf::loadView('website.bio-data.print-pdf.index', compact('model'));
        return $pdf->stream('print_ref_no_' .$model->id. '.pdf');
    }

    public function  momPdf($id)
    {
        $model = FdwBioData::find(convert_uudecode($id));
        return Pdf::loadView('website.bio-data.mom-pdf.index', compact('model'))
            ->stream('mom_ref_no_' .$model->id. '.pdf');
    }

    public function dataTypeModalShow(Request $request)
    {
        $data = FdwBioData::findOrFail($request->id);
        return view('website.bio-data.components.bio-data-type-modal', compact('data'));
    }


}
