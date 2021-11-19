<?php

use Illuminate\Database\Migrations\Migration;

class InsertServices extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $billing = ['monthly', 'quarterly', 'semi-annually', 'annually'];
        $data = [];
        for ($i = 0; $i <= 100; $i++) {
            $data[$i] = [
                'name' => 'Service ' . $i,
                'unit_price' => ($i + 1) * 10,
                'billing' => $billing[array_rand($billing)],
                'start' => date('Y-m-d', strtotime(' -' . ($i * 5) . ' day'))
            ];
        }
        DB::table('services')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}
