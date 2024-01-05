<?php

namespace App\Http\Controllers;

use App\Models\BioDataShortlist;
use App\Models\FdwBioData;
use Illuminate\Support\Facades\Auth;

class BioDataShortlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save($fwd_bio_data_id)
    {
        if (Auth::user()->hasRole('Employer')){
            $model = BioDataShortlist::create([
                'fwd_bio_data_id' => $fwd_bio_data_id,
                'employer_id' => Auth::id(),
            ]);
            if ($model){
                return response()->json([
                    'success' => true,
                    'modelId' => $model->id,
                    'type' => 'save'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => __('general.only_employers_can_access_it'),
        ]);
    }

    public function list()
    {
        $data = FdwBioData::with('shortlistBioData')
            ->whereHas('shortlistBioData', function ($query) {
                $query->where('employer_id', Auth::id());
            })
            ->get();
        $params = [
            'pageTitle' => __('general.my_favourites'),
            'data' => $data
        ];
        return view('website.bio-data.shortlist',$params);
    }

    public function remove($id)
    {
        $model = BioDataShortlist::findOrFail($id)->delete();
        if ($model){
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
