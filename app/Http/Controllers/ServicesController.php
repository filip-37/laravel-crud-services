<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller {

    public function index() {
        return view('services.index', [
            'services' => DB::table('services')->paginate(5)
        ]);
    }

    public function create() {
        return view('services.create');
    }

    public function save() {
        request()->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'billing' => 'required',
            'start' => 'required'
        ]);
        Service::create([
            'name' => request('name'),
            'unit_price' => request('unit_price'),
            'billing' => request('billing'),
            'start' => request('start'),
            'end' => request('end')
        ]);

        return redirect('/services');
    }

    public function edit(Service $service) {
        return view('services.edit', [
            'service' => $service
        ]);
    }

    public function update(Service $service) {
        request()->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'billing' => 'required',
            'start' => 'required'
        ]);
        $service->update([
            'name' => request('name'),
            'unit_price' => request('unit_price'),
            'billing' => request('billing'),
            'start' => request('start'),
            'end' => request('end')
        ]);

        return redirect('/services');
    }

    public function detail(Service $service) {
        return view('services.detail', [
            'service' => $service
        ]);
    }

    public function destroy(Service $service) {
        $service->delete();

        return redirect('/services');
    }

    public function countMRR() {
        $date = request('date');
        $result = -1;

        $billing = [
            'monthly' => 1,
            'quarterly' => 3,
            'semi-annually' => 6,
            'annually' => 12
        ];

        if ($date) {
            $result = 0;
            $services = DB::select(
                "SELECT * FROM services WHERE :date BETWEEN services.start AND COALESCE(services.end, NOW())",
                ['date' => $date]
            );
            foreach ($services as $service) {
                $result += ($service->unit_price / $billing[$service->billing]);
            }
        }

        return view('services.mrr', [
            'result' => $result,
            'date' => $date
        ]);
    }
}

