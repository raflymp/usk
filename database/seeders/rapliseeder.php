<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class rapliseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(["name" => "Administrator"]);
        $bank = Role::create(["name" => "Bank"]);
        $canteen = Role::create(["name" => "Canteen"]);
        $student = Role::create(["name" => "Student"]);

        User::create([
            "name" => "tama",
            "email" => "tama@gmail.com",
            "password" => Hash::make("tama"),
            "role_id" => $admin->id
        ]);

        User::create([
            "name" => "ranu",
            "email" => "ranu@gmail.com",
            "password" => Hash::make("ranu"),
            "role_id" => $bank->id
        ]);

        User::create([
            "name" => "joni",
            "email" => "joni@gmail.com",
            "password" => Hash::make("joni"),
            "role_id" => $canteen->id
        ]);

        $septy = User::create([
            "name" => "tablo",
            "email" => "tablo@gmail.com",
            "password" => Hash::make("tablo"),
            "role_id" => $student->id
        ]);

        $pucuk = Barang::create([
            "name" => "Teh Pucuk",
            "image" => "pucuk.jpg",
            "price" => 3500,
            "stock" => 10,
            "desc" => "Minuman teh"
        ]);

        Saldo::create([
            "user_id" => $septy->id,
            "saldo" => 30000
        ]);

        //Isi Saldo
        Transaksi::create([
            "user_id" => $septy->id,
            "barang_id" => null,
            "jumlah" => 50000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 3
        ]);

        //Belanja
        // Transaksi::create([
        //     "user_id" => $septy->id,
        //     "barang_id" => $pucuk->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);

        // Transaksi::create([
        //     "user_id" => $septy->id,
        //     "barang_id" => $risol->id,
        //     "jumlah" => 2,
        //     "invoice_id" => "INV_001",
        //     "type" => 2,
        //     "status" => 1
        // ]);
    }
}
