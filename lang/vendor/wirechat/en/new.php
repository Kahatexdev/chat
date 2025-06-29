<?php

return [

    // Komponen obrolan baru
    'chat' => [
        'labels' => [
            'heading' => 'Obrolan Baru',
            'you' => 'Anda',
        ],

        'inputs' => [
            'search' => [
                'label' => 'Cari Percakapan',
                'placeholder' => 'Cari',
            ],
        ],

        'actions' => [
            'new_group' => [
                'label' => 'Grup Baru',
            ],
        ],

        'messages' => [
            'empty_search_result' => 'Tidak ada pengguna yang cocok dengan pencarian Anda.',
        ],
    ],

    // Komponen grup baru
    'group' => [
        'labels' => [
            'heading' => 'Obrolan Baru',
            'add_members' => 'Tambah Anggota',
        ],

        'inputs' => [
            'name' => [
                'label' => 'Nama Grup',
                'placeholder' => 'Masukkan Nama',
            ],
            'description' => [
                'label' => 'Deskripsi',
                'placeholder' => 'Opsional',
            ],
            'search' => [
                'label' => 'Cari',
                'placeholder' => 'Cari',
            ],
            'photo' => [
                'label' => 'Foto',
            ],
        ],

        'actions' => [
            'cancel' => [
                'label' => 'Batal',
            ],
            'next' => [
                'label' => 'Berikutnya',
            ],
            'create' => [
                'label' => 'Buat',
            ],
        ],

        'messages' => [
            'members_limit_error' => 'Anggota tidak boleh lebih dari :count',
            'empty_search_result' => 'Tidak ada pengguna yang cocok dengan pencarian Anda.',
        ],
    ],

];
