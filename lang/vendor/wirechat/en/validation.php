<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Baris Bahasa Validasi Default Laravel
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut berisi pesan kesalahan default yang digunakan oleh
    | kelas validasi Laravel. Beberapa aturan memiliki beberapa versi seperti
    | aturan ukuran. Silakan sesuaikan pesan-pesan ini sesuai kebutuhan Anda.
    |
    */

    'file' => 'Isian :attribute harus berupa berkas.',
    'image' => 'Isian :attribute harus berupa gambar.',
    'required' => 'Isian :attribute wajib diisi.',
    'max' => [
        'array' => 'Isian :attribute tidak boleh memiliki lebih dari :max item.',
        'file' => 'Ukuran berkas :attribute tidak boleh lebih dari :max kilobyte.',
        'numeric' => 'Nilai :attribute tidak boleh lebih dari :max.',
        'string' => 'Isian :attribute tidak boleh lebih dari :max karakter.',
    ],
    'mimes' => 'Berkas :attribute harus bertipe: :values.',

    /*
    |--------------------------------------------------------------------------
    | Baris Bahasa Validasi Kustom
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut tertentu
    | menggunakan konvensi "attribute.rule" untuk menamai baris. Ini memudahkan
    | dalam menetapkan pesan khusus untuk aturan atribut tertentu.
    |
    */

    'custom' => [],

];
