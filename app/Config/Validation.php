<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $siswa = [
        'sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Sekolah wajib diisi',
            ]
        ],
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama wajib diisi',
            ]
        ],
        'nisn' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NISN wajib diisi',
            ]
        ],
        'jenis_kelamin' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jenis kelamin wajib diisi',
            ]
        ],
        'tanggal_lahir' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal lahir wajib diisi',
                'valid_date' => 'Tanggal lahir tidak valid',
            ]
        ],
        'tingkat' => [
            'rules' => 'required|numeric|greated_than[0]|less_than_equal_to[12]',
            'errors' => [
                'required' => 'Tingkat wajib diisi',
                'numeric' => 'Tingkat tidak valid',
                'greater_than' => 'Tingkat harus rentang dari 1 sampai 12',
                'less_than_equal_to' => 'Tingkat harus rentang dari 1 sampai 12'
            ]
        ],
        'tingkat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama ibu wajib diisi',
            ]
        ],
        'domisili' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Domisili wajib diisi',
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat wajib diisi',
            ]
        ],
        'status' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Status wajib diisi',
            ]
        ],
    ];

    public $siswa_status = [
        'rencana_melanjutkan' => [
            'rules' => 'required|in_list[ya,tidak]',
            'errors' => [
                'required' => 'Rencana melanjutkan wajib diisi',
            ],
        ],
        'faktor' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Faktor wajib diisi',
            ],
        ],
    ];

    public $siswa_beasiswa = [
        'nama_beasiswa' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama beasiswa wajib diisi',
            ],
        ],
        'besaran' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Besaran wajib diisi',
                'numeric' => 'Besaran tidak valid',
            ],
        ],
    ];

    public $faktor = [
        'nama_faktor' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama faktor wajib diisi',
            ],
        ],
    ];

    public $sarpras = [
        'nama_sarpras' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama sarpras wajib diisi',
            ],
        ],
        'slug' => [
            'rules' => 'required|is_unique[sarpras.slug]',
            'errors' => [
                'required' => 'Slug wajib diisi',
            ],
        ],
    ];
}
