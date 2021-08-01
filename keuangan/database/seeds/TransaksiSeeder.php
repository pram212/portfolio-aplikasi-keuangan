<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i < 100; $i++) { 
            // data dummy
            $tgl = date('Y-m-d');
            $jenis = $faker->randomElement(['pemasukan', 'pengeluaran']);
            $kategori = $faker->randomElement([9,10,11,14,15,16,17,18,19]);
            $nominal = $faker->randomElement([1000,30000,20000,100000,30000,20000]);
            $keterangan = "";
            // insert ke database
            DB::table('transaksis')->insert([
                'tanggal' => $tgl,
                'jenis' => $jenis,
                'kategori_id' => $kategori,
                'nominal' => $nominal,
                'keterangan' => $keterangan,
            ]);
        }
        //
    }
}
