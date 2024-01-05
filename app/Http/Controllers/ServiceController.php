<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Services::latest()->get();
        $params = [
            'services' => $services,
            'pageTitle' => __('general.services'),
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.services') => '',
            ]),
        ];
        return view('website.services.index', $params);
    }

    public function show($id)
    {
        $data = Services::find($id);
        $params = [
            'data' => $data,
            'pageTitle' => __('general.services_detail'),
            'breadcrumbs' => collect([
                __('general.home') => route('website.home-page'),
                __('general.services') => route('website.services.index'),
                __('general.services_detail') => '',
            ]),
        ];
        return view('website.services.service-detail.index', $params);
    }

}
