<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller {

    public function index() {
        $services = Service::all();

        return view('services.index', ['services' => $services]);
    }

    public function edit(Service $service) {
        return view('services.edit', ['service' => $service]);
    }

    public function detail(Service $service) {
        return view('services.detail', ['service' => $service]);
    }

}
