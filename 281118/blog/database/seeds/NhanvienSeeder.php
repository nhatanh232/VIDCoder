<?php

use Illuminate\Database\Seeder;

class NhanvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        DB::table('dsnv')->truncate();
        App\DSNV::create([
        	'Manv' => 'NV1',
        	'Hoten' =>'Nguyễn Hải Cường',
        	'Phongban' => 'CSVC',
        	'Congty' => 'Vidon'
        ]);
         DB::table('dsnv');
        App\DSNV::create([
        	'Manv' => 'NV2',
        	'Hoten' =>'Bùi Quang Toàn',
        	'Phongban' => 'CSVC',
        	'Congty' => 'Vidon'
        	]);
    }
    }
}
