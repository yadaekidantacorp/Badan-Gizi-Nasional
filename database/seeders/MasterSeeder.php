<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Ministry;
use App\Models\Position;
use App\Models\Directorate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ministries = [
            [
                'name' => 'Kementerian Dalam Negeri',
                'slug' => 'kemendagri',
                'thumbnail' => 'ministry/kemendagri.png', // Sesuaikan dengan nama file gambar di folder storage Anda
            ],
            [
                'name' => 'Kementerian Luar Negeri',
                'slug' => 'kemenlu',
                'thumbnail' => 'ministry/kemenlu.png',
            ],
            [
                'name' => 'Kementerian Pertahanan',
                'slug' => 'kemenhan',
                'thumbnail' => 'ministry/kemenhan.png',
            ],
            [
                'name' => 'Kementerian Agama',
                'slug' => 'kemenag',
                'thumbnail' => 'ministry/kemenag.png',
            ],
            [
                'name' => 'Kementerian Agraria dan Tata Ruang',
                'slug' => 'kemenatr',
                'thumbnail' => 'ministry/kemenatr.png',
            ],
            [
                'name' => 'Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi',
                'slug' => 'kemendespdtt',
                'thumbnail' => 'ministry/kemendespdtt.png',
            ],
            [
                'name' => 'Kementerian Energi dan Sumber Daya Mineral',
                'slug' => 'kemendesdm',
                'thumbnail' => 'ministry/kemenesdm.png',
            ],
            [
                'name' => 'Kementerian Hukum dan Hak Asasi Manusia',
                'slug' => 'kemenkumham',
                'thumbnail' => 'ministry/kemenkumham.png',
            ],
            [
                'name' => 'Kementerian Kelautan dan Perikanan',
                'slug' => 'kemenkp',
                'thumbnail' => 'ministry/kemenkp.png',
            ],
            [
                'name' => 'Kementerian Kesehatan',
                'slug' => 'kemenkes',
                'thumbnail' => 'ministry/kemenkes.png',
            ],
            [
                'name' => 'Kementerian Ketenagakerjaan',
                'slug' => 'kemnaker',
                'thumbnail' => 'ministry/kemnaker.png',
            ],
            [
                'name' => 'Kementerian Keuangan',
                'slug' => 'kemenkeu',
                'thumbnail' => 'ministry/kemenkeu.png',
            ],
            [
                'name' => 'Kementerian Komunikasi dan Informatika',
                'slug' => 'kominfo',
                'thumbnail' => 'ministry/kominfo.png',
            ],
            [
                'name' => 'Kementerian Lingkungan Hidup dan Kehutanan',
                'slug' => 'kemenlhk',
                'thumbnail' => 'ministry/kemenlhk.png',
            ],
            [
                'name' => 'Kementerian Pekerjaan Umum dan Perumahan Rakyat',
                'slug' => 'kemenpupr',
                'thumbnail' => 'ministry/kemenpupr.png',
            ],
            [
                'name' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
                'slug' => 'kemendikbudristek',
                'thumbnail' => 'ministry/kemendikbudristek.png',
            ],
            [
                'name' => 'Kementerian Perdagangan',
                'slug' => 'kemendag',
                'thumbnail' => 'ministry/kemendag.png',
            ],
            [
                'name' => 'Kementerian Perhubungan',
                'slug' => 'kemenhub',
                'thumbnail' => 'ministry/kemenhub.png',
            ],
            [
                'name' => 'Kementerian Perindustrian',
                'slug' => 'kemenperin',
                'thumbnail' => 'ministry/kemenperin.png',
            ],
            [
                'name' => 'Kementerian Pertanian',
                'slug' => 'kementan',
                'thumbnail' => 'ministry/kementan.png',
            ],
            [
                'name' => 'Kementerian Sosial',
                'slug' => 'kemensos',
                'thumbnail' => 'ministry/kemensos.png',
            ],
            [
                'name' => 'Kementerian Sekretariat Negara',
                'slug' => 'kemensetneg',
                'thumbnail' => 'ministry/kemensetneg.png',
            ],
            [
                'name' => 'Kementerian Koperasi dan Usaha Kecil dan Menengah',
                'slug' => 'kemenkopukm',
                'thumbnail' => 'ministry/kemenkopukm.png',
            ],
            [
                'name' => 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak',
                'slug' => 'kemenpppa',
                'thumbnail' => 'ministry/kemenpppa.png',
            ],
            [
                'name' => 'Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi',
                'slug' => 'kemenpanrb',
                'thumbnail' => 'ministry/kemenpanrb.png',
            ],
            [
                'name' => 'Kementerian Perencanaan Pembangunan Nasional',
                'slug' => 'bappenas',
                'thumbnail' => 'ministry/bappenas.png',
            ],
            [
                'name' => 'Kementerian Badan Usaha Milik Negara',
                'slug' => 'kemenbumn',
                'thumbnail' => 'ministry/kemenbumn.png',
            ],
            [
                'name' => 'Kementerian Pemuda dan Olahraga',
                'slug' => 'kemenpora',
                'thumbnail' => 'ministry/kemenpora.png',
            ],
            [
                'name' => 'Kementerian Pariwisata dan Ekonomi Kreatif',
                'slug' => 'kemenparekraf',
                'thumbnail' => 'ministry/kemenparekraf.png',
            ],
            [
                'name' => 'Kementerian Investasi',
                'slug' => 'bkpm',
                'thumbnail' => 'ministry/bkpm.png',
            ],
            [
                'name' => 'Kementerian Koordinator Bidang Politik, Hukum, dan Keamanan',
                'slug' => 'kemenkopolhukam',
                'thumbnail' => 'ministry/kemenkopolhukam.png',
            ],
            [
                'name' => 'Kementerian Koordinator Bidang Perekonomian',
                'slug' => 'kemenkoperekonomian',
                'thumbnail' => 'ministry/kemenkoperekonomian.png',
            ],
            [
                'name' => 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan',
                'slug' => 'kemenkopmk',
                'thumbnail' => 'ministry/kemenkopmk.png',
            ],
            [
                'name' => 'Kementerian Koordinator Bidang Kemaritiman dan Investasi',
                'slug' => 'kemenkomarves',
                'thumbnail' => 'ministry/kemenkomarves.png',
            ],
            // Tambahkan data kementerian lainnya sesuai kebutuhan
        ];
        foreach ($ministries as $ministryData) {
            Ministry::create($ministryData);
        }
        $directorate = [
            [
                'ministry_id' => 1,
                'name' => 'Sekretariat Jenderal',
                'slug' => 'sekjen'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Politik dan Pemerintahan Umum',
                'slug' => 'dirjenpolpum'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Bina Administrasi Kewilayahan',
                'slug' => 'dirjenbinaadwil'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Otonomi Daerah',
                'slug' => 'dirjenotda'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Bina Pembangunan Daerah',
                'slug' => 'dirjenbinbangda'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Bina Pemerintahan Desa',
                'slug' => 'dirjenbindes'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Bina Keuangan Daerah',
                'slug' => 'dirjenbinkeuda'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Direktorat Jenderal Kependudukan dan Pencatatan Sipil',
                'slug' => 'dirjendukcapil'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Inspektorat Jenderal',
                'slug' => 'inspektorat'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Badan Strategi Kebijakan Dalam Negeri',
                'slug' => 'baskendagri'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Badan Pengembangan Sumber Daya Manusia',
                'slug' => 'bapensdm'
            ],
            [
                'ministry_id' => 1,
                'name' => 'Biro Perencanaan',
                'slug' => 'biroren',
                'directorate_id' => 1
            ],
        ];
        foreach ($directorate as $directorateData) {
            Directorate::create($directorateData);
        }
        $position = [
            [
                'name' => 'Eselon I'
            ],
            [
                'name' => 'Eselon II'
            ],
            [
                'name' => 'Eselon III'
            ],
            [
                'name' => 'Eselon IV'
            ],
            [
                'name' => 'Eselon V'
            ]
        ];
        foreach ($position as $positionData) {
            Position::create($positionData);
        }
        $status = [
            [
                'type' => 1,
                'name' => 'Belum Dimulai'
            ],
            [
                'type' => 1,
                'name' => 'Ditunda'
            ],
            [
                'type' => 1,
                'name' => 'Sedang Berlangsung'
            ],
            [
                'type' => 1,
                'name' => 'Selesai'
            ],
            [
                'type' => 1,
                'name' => 'Dibatalkan'
            ],
        ];
        foreach ($status as $statusData) {
            Status::create($statusData);
        }
    }
}
