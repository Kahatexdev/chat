<?php

return [

    /**-------------------------
     * Chat
     *------------------------*/
    'labels' => [

        'you_replied_to_yourself'            => 'Kamu membalas dirimu sendiri',
        'participant_replied_to_you'         => ':sender membalas kamu',
        'participant_replied_to_themself'    => ':sender membalas mereka sendiri',
        'participant_replied_other_participant' => ':sender membalas :receiver',
        'you'                                => 'Kamu',
        'user'                               => 'Pengguna',
        'replying_to'                        => 'Membalas :participant',
        'replying_to_yourself'               => 'Membalas diri sendiri',
        'attachment'                         => 'Lampiran',
    ],

    'inputs' => [
        'message' => [
            'label'       => 'Pesan',
            'placeholder' => 'Ketik pesan',
        ],
        'media' => [
            'label'       => 'Media',
            'placeholder' => 'Pilih media',
        ],
        'files' => [
            'label'       => 'Berkas',
            'placeholder' => 'Pilih berkas',
        ],
    ],

    'message_groups' => [
        'today'     => 'Hari ini',
        'yesterday' => 'Kemarin',
    ],

    'actions' => [
        'open_group_info' => [
            'label' => 'Info Grup',
        ],
        'open_chat_info' => [
            'label' => 'Info Obrolan',
        ],
        'close_chat' => [
            'label' => 'Tutup Obrolan',
        ],
        'clear_chat' => [
            'label'               => 'Bersihkan Riwayat Obrolan',
            'confirmation_message' => 'Yakin ingin membersihkan riwayat obrolan? Ini hanya akan membersihkan di sisi kamu.',
        ],
        'delete_chat' => [
            'label'               => 'Hapus Obrolan',
            'confirmation_message' => 'Yakin ingin menghapus obrolan ini? Ini hanya akan menghapus di sisi kamu.',
        ],

        'delete_for_everyone' => [
            'label'               => 'Hapus untuk semua',
            'confirmation_message' => 'Yakin ingin menghapus untuk semua?',
        ],
        'delete_for_me' => [
            'label'               => 'Hapus untuk saya',
            'confirmation_message' => 'Yakin ingin menghapus untuk saya?',
        ],
        'reply' => [
            'label' => 'Balas',
        ],

        'exit_group' => [
            'label'               => 'Keluar Grup',
            'confirmation_message' => 'Yakin ingin keluar dari grup ini?',
        ],
        'upload_file' => [
            'label' => 'Berkas',
        ],
        'upload_media' => [
            'label' => 'Foto & Video',
        ],
    ],

    'messages' => [

        'cannot_exit_self_or_private_conversation' => 'Tidak dapat keluar dari percakapan pribadi atau diri sendiri',
        'owner_cannot_exit_conversation'           => 'Pemilik tidak dapat keluar dari percakapan',
        'rate_limit'                               => 'Terlalu sering! Mohon tunggu sebentar.',
        'conversation_not_found'                   => 'Percakapan tidak ditemukan.',
        'conversation_id_required'                 => 'ID percakapan dibutuhkan.',
        'invalid_conversation_input'               => 'Input percakapan tidak valid.',
    ],

    /**-------------------------
     * Info Component
     *------------------------*/

    'info' => [
        'heading' => [
            'label' => 'Info Obrolan',
        ],
        'actions' => [
            'delete_chat' => [
                'label'               => 'Hapus Obrolan',
                'confirmation_message' => 'Yakin ingin menghapus obrolan ini? Ini hanya akan menghapus di sisi kamu.',
            ],
        ],
        'messages' => [
            'invalid_conversation_type_error' => 'Hanya percakapan privat dan diri sendiri yang diperbolehkan',
        ],
    ],

    /**-------------------------
     * Group Folder
     *------------------------*/

    'group' => [

        // Group info component
        'info' => [
            'heading' => [
                'label' => 'Info Grup',
            ],
            'labels' => [
                'members'         => 'Anggota',
                'add_description' => 'Tambahkan deskripsi grup',
            ],
            'inputs' => [
                'name' => [
                    'label'       => 'Nama Grup',
                    'placeholder' => 'Masukkan nama',
                ],
                'description' => [
                    'label'       => 'Deskripsi',
                    'placeholder' => 'Opsional',
                ],
                'photo' => [
                    'label' => 'Foto',
                ],
            ],
            'actions' => [
                'delete_group' => [
                    'label'               => 'Hapus Grup',
                    'confirmation_message' => 'Yakin ingin menghapus grup ini?',
                    'helper_text'         => 'Sebelum menghapus, hapus semua anggota grup terlebih dahulu.',
                ],
                'add_members' => [
                    'label' => 'Tambahkan Anggota',
                ],
                'group_permissions' => [
                    'label' => 'Hak Akses Grup',
                ],
                'exit_group' => [
                    'label'               => 'Keluar Grup',
                    'confirmation_message' => 'Yakin ingin keluar dari grup ini?',
                ],
            ],
            'messages' => [
                'invalid_conversation_type_error' => 'Hanya percakapan grup yang diperbolehkan',
            ],
        ],

        // Members component
        'members' => [
            'heading' => [
                'label' => 'Anggota',
            ],
            'inputs' => [
                'search' => [
                    'label'       => 'Cari',
                    'placeholder' => 'Cari anggota',
                ],
            ],
            'labels' => [
                'members'          => 'Anggota',
                'owner'            => 'Pemilik',
                'admin'            => 'Admin',
                'no_members_found' => 'Tidak ada anggota',
            ],
            'actions' => [
                'send_message_to_yourself' => [
                    'label' => 'Kirim ke diri sendiri',
                ],
                'send_message_to_member' => [
                    'label' => 'Kirim ke :member',
                ],
                'dismiss_admin' => [
                    'label'               => 'Nonaktifkan Admin',
                    'confirmation_message' => 'Yakin ingin menonaktifkan :member sebagai Admin?',
                ],
                'make_admin' => [
                    'label'               => 'Jadikan Admin',
                    'confirmation_message' => 'Yakin ingin menjadikan :member sebagai Admin?',
                ],
                'remove_from_group' => [
                    'label'               => 'Hapus dari grup',
                    'confirmation_message' => 'Yakin ingin menghapus :member dari grup?',
                ],
                'load_more' => [
                    'label' => 'Muat lebih banyak',
                ],
            ],
            'messages' => [
                'invalid_conversation_type_error' => 'Hanya percakapan grup yang diperbolehkan',
            ],
        ],

        // add-members component
        'add_members' => [
            'heading' => [
                'label' => 'Tambah Anggota',
            ],
            'inputs' => [
                'search' => [
                    'label'       => 'Cari',
                    'placeholder' => 'Cari',
                ],
            ],
            'actions' => [
                'save' => [
                    'label' => 'Simpan',
                ],
            ],
            'messages' => [
                'invalid_conversation_type_error' => 'Hanya percakapan grup yang diperbolehkan',
                'members_limit_error'             => 'Anggota tidak boleh lebih dari :count',
                'member_already_exists'           => 'Sudah ditambahkan ke grup',
            ],
        ],

        // permissions component
        'permisssions' => [
            'heading' => [
                'label' => 'Hak Akses',
            ],
            'inputs' => [
                'search' => [
                    'label'       => 'Cari',
                    'placeholder' => 'Cari',
                ],
            ],
            'labels' => [
                'members_can' => 'Anggota dapat',
            ],
            'actions' => [
                'edit_group_information' => [
                    'label'       => 'Ubah Info Grup',
                    'helper_text' => 'Termasuk nama, ikon, dan deskripsi grup',
                ],
                'send_messages' => [
                    'label' => 'Kirim Pesan',
                ],
                'add_other_members' => [
                    'label' => 'Tambah Anggota Lain',
                ],
            ],
            'messages' => [
                // kosong kalau tidak ada
            ],
        ],

    ],

];
