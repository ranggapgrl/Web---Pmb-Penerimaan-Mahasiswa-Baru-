<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /*
     * Struktur data tiap jurusan:
     *  - deskripsi : ringkasan satu kalimat (dipakai di halaman daftar jurusan)
     *  - tentang   : penjelasan lengkap (dipakai di halaman detail)
     *  - lama_studi: keterangan lama studi
     *  - kegiatan  : [ikon (Font Awesome), judul, deskripsi]
     *  - dosen     : [nama, bidang]
     *
     * Catatan: isi "tentang", "lama_studi", "kegiatan[deskripsi]" dan "dosen[bidang]"
     * adalah contoh. Sesuaikan dengan data resmi universitas.
     */
    private $dataJurusan = [
        // --- FAKULTAS TEKNIK ---
        'teknik-informatika' => [
            'nama' => 'S1 Teknik Informatika', 'fakultas' => 'Fakultas Teknik', 'gelar' => 'S.Kom', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Fokus pada pengembangan perangkat lunak (software), kecerdasan buatan (AI), keamanan siber, dan analisis data.',
            'tentang' => 'Teknik Informatika mempelajari cara merancang, membangun, dan mengamankan sistem perangkat lunak. Kamu belajar dari dasar logika dan algoritma sampai pengembangan aplikasi, kecerdasan buatan, keamanan siber, dan analisis data. Sebagian besar perkuliahan dijalankan lewat proyek nyata, jadi kamu terbiasa bekerja dalam tim seperti di industri.',
            'kegiatan' => [
                ['ikon' => 'fa-code', 'judul' => 'Ngoding di berbagai bahasa pemrograman', 'deskripsi' => 'Berlatih Python, Java, JavaScript, dan C++ lewat praktikum mingguan, dari algoritma dasar sampai struktur data.'],
                ['ikon' => 'fa-mobile-alt', 'judul' => 'Membangun aplikasi web dan mobile', 'deskripsi' => 'Merancang aplikasi dari kebutuhan pengguna sampai rilis, dikerjakan dalam tim kecil pada proyek semester.'],
                ['ikon' => 'fa-brain', 'judul' => 'Mengembangkan model Machine Learning', 'deskripsi' => 'Melatih model untuk mengenali gambar, teks, atau pola data, lalu menguji seberapa akurat hasilnya.'],
                ['ikon' => 'fa-shield-alt', 'judul' => 'Latihan keamanan siber', 'deskripsi' => 'Mencari celah keamanan pada aplikasi latihan dan belajar cara menutupnya.'],
            ],
            'prospek' => ['Software Engineer', 'Data Scientist', 'Cyber Security Analyst'],
            'dosen' => [
                ['nama' => 'Dr. Budi Santoso, M.Kom.', 'bidang' => 'Kecerdasan buatan dan pembelajaran mesin'],
                ['nama' => 'Siti Aminah, M.T.', 'bidang' => 'Rekayasa perangkat lunak dan basis data'],
            ],
        ],
        'teknik-sipil' => [
            'nama' => 'S1 Teknik Sipil', 'fakultas' => 'Fakultas Teknik', 'gelar' => 'S.T.', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari perancangan, pembangunan, dan pemeliharaan infrastruktur seperti gedung, jalan, dan jembatan.',
            'tentang' => 'Teknik Sipil menyiapkan kamu untuk merancang dan membangun infrastruktur yang dipakai orang setiap hari, seperti gedung, jalan, jembatan, dan bendungan. Kamu belajar menghitung kekuatan struktur, membaca kondisi tanah, dan mengelola proyek agar selesai tepat waktu dan aman.',
            'kegiatan' => [
                ['ikon' => 'fa-ruler-combined', 'judul' => 'Praktikum ilmu ukur tanah', 'deskripsi' => 'Mengukur kontur dan batas lahan langsung di lapangan memakai theodolite dan alat ukur digital.'],
                ['ikon' => 'fa-building', 'judul' => 'Desain dan analisis struktur bangunan', 'deskripsi' => 'Menghitung beban dan merancang struktur, lalu memeriksa hasilnya dengan perangkat lunak analisis struktur.'],
                ['ikon' => 'fa-flask', 'judul' => 'Uji material di laboratorium', 'deskripsi' => 'Menguji kuat tekan beton dan sifat tanah untuk memahami bagaimana material bekerja.'],
                ['ikon' => 'fa-tasks', 'judul' => 'Manajemen proyek konstruksi', 'deskripsi' => 'Menyusun jadwal, anggaran, dan pengendalian mutu untuk proyek konstruksi simulasi.'],
            ],
            'prospek' => ['Insinyur Sipil', 'Manajer Konstruksi', 'Konsultan Struktur'],
            'dosen' => [
                ['nama' => 'Ir. Wahyu Hidayat, M.T.', 'bidang' => 'Struktur bangunan dan rekayasa gempa'],
                ['nama' => 'Dian Pelangi, S.T., M.Eng.', 'bidang' => 'Geoteknik dan manajemen konstruksi'],
            ],
        ],
        'teknik-elektro' => [
            'nama' => 'S1 Teknik Elektro', 'fakultas' => 'Fakultas Teknik', 'gelar' => 'S.T.', 'akreditasi' => 'B',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mendalami kelistrikan, elektronika, sistem kendali, dan telekomunikasi.',
            'tentang' => 'Teknik Elektro membahas listrik dan elektronika, dari rangkaian kecil di dalam gawai sampai jaringan listrik dan telekomunikasi. Kamu belajar merancang, merakit, dan memprogram perangkat yang bisa mengukur, mengendalikan, dan berkomunikasi.',
            'kegiatan' => [
                ['ikon' => 'fa-microchip', 'judul' => 'Merakit sirkuit elektronika', 'deskripsi' => 'Membuat rangkaian di papan proyek dan menguji tegangan serta arusnya dengan osiloskop dan multimeter.'],
                ['ikon' => 'fa-wifi', 'judul' => 'Pemrograman mikrokontroler dan IoT', 'deskripsi' => 'Memprogram Arduino atau ESP32 agar sensor dapat mengirim data lewat jaringan.'],
                ['ikon' => 'fa-bolt', 'judul' => 'Merancang sistem kelistrikan bangunan', 'deskripsi' => 'Menggambar dan menghitung instalasi listrik untuk rumah atau gedung sesuai standar keselamatan.'],
                ['ikon' => 'fa-broadcast-tower', 'judul' => 'Praktik telekomunikasi', 'deskripsi' => 'Mempelajari cara sinyal dikirim dan diterima, mulai dari radio sampai jaringan seluler.'],
            ],
            'prospek' => ['Electrical Engineer', 'IoT Specialist', 'Telecommunication Engineer'],
            'dosen' => [
                ['nama' => 'Dr. Hendra, S.T., M.Sc.', 'bidang' => 'Sistem tenaga listrik'],
                ['nama' => 'Faisal, M.T.', 'bidang' => 'Sistem kendali dan Internet of Things'],
            ],
        ],
        'teknik-industri' => [
            'nama' => 'S1 Teknik Industri', 'fakultas' => 'Fakultas Teknik', 'gelar' => 'S.T.', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Optimalisasi sistem yang kompleks, proses, organisasi, untuk efisiensi produksi dan bisnis.',
            'tentang' => 'Teknik Industri berfokus pada membuat proses produksi dan layanan berjalan lebih efisien, aman, dan hemat biaya. Kamu belajar memadukan pengetahuan teknik, data, dan manajemen untuk memperbaiki cara kerja pabrik, gudang, sampai rumah sakit.',
            'kegiatan' => [
                ['ikon' => 'fa-truck', 'judul' => 'Analisis rantai pasok (Supply Chain)', 'deskripsi' => 'Memetakan alur barang dari pemasok sampai konsumen dan mencari bagian yang bisa dipercepat atau dihemat.'],
                ['ikon' => 'fa-hard-hat', 'judul' => 'Ergonomi dan keselamatan kerja', 'deskripsi' => 'Menilai posisi dan lingkungan kerja, lalu merancang perbaikan agar pekerja lebih nyaman dan aman.'],
                ['ikon' => 'fa-industry', 'judul' => 'Perencanaan tata letak pabrik', 'deskripsi' => 'Menata mesin, gudang, dan jalur kerja supaya proses produksi berjalan lancar.'],
                ['ikon' => 'fa-chart-line', 'judul' => 'Pengendalian kualitas', 'deskripsi' => 'Memakai statistik untuk menemukan penyebab cacat produk dan mengurangi pemborosan.'],
            ],
            'prospek' => ['Supply Chain Manager', 'Quality Control Engineer', 'Production Manager'],
            'dosen' => [
                ['nama' => 'Prof. Dr. Andi, S.T.', 'bidang' => 'Sistem produksi dan optimasi'],
                ['nama' => 'Lia, M.T.', 'bidang' => 'Rantai pasok dan logistik'],
            ],
        ],
        'arsitektur' => [
            'nama' => 'S1 Arsitektur', 'fakultas' => 'Fakultas Teknik', 'gelar' => 'S.Ars', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Memadukan seni dan teknik untuk merancang ruang dan bangunan yang fungsional dan estetis.',
            'tentang' => 'Arsitektur memadukan seni, teknik, dan pemahaman tentang manusia untuk merancang ruang dan bangunan yang nyaman dipakai dan enak dilihat. Kamu belajar menggambar, membuat model, dan menjelaskan gagasan desain lewat kelas studio yang menjadi inti perkuliahan.',
            'kegiatan' => [
                ['ikon' => 'fa-cubes', 'judul' => 'Membuat maket bangunan', 'deskripsi' => 'Mengubah rancangan menjadi model tiga dimensi dari kertas, kayu, dan bahan lain untuk dipresentasikan.'],
                ['ikon' => 'fa-drafting-compass', 'judul' => 'Desain dengan AutoCAD dan SketchUp', 'deskripsi' => 'Menggambar denah, tampak, dan model 3D memakai perangkat lunak yang dipakai di biro arsitek.'],
                ['ikon' => 'fa-landmark', 'judul' => 'Mempelajari sejarah arsitektur', 'deskripsi' => 'Menelusuri gaya bangunan dari masa ke masa dan pengaruhnya pada desain sekarang.'],
                ['ikon' => 'fa-users', 'judul' => 'Kelas studio perancangan', 'deskripsi' => 'Mengerjakan rancangan dengan bimbingan dosen dan mempresentasikannya dalam kritik desain.'],
            ],
            'prospek' => ['Arsitek', 'Urban Planner', 'Desainer Interior'],
            'dosen' => [
                ['nama' => 'Ir. Baskoro, IAI', 'bidang' => 'Perancangan arsitektur dan teori desain'],
                ['nama' => 'Anisa, S.Ars., M.Arch.', 'bidang' => 'Arsitektur berkelanjutan'],
            ],
        ],

        // --- FAKULTAS EKONOMI & BISNIS ---
        'manajemen-bisnis' => [
            'nama' => 'S1 Manajemen Bisnis', 'fakultas' => 'Ekonomi & Bisnis', 'gelar' => 'S.M', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Membentuk pemimpin masa depan yang paham strategi bisnis, pemasaran, keuangan, dan SDM.',
            'tentang' => 'Manajemen Bisnis melatih kamu mengelola dan memimpin organisasi dengan memahami strategi, pemasaran, keuangan, dan sumber daya manusia sekaligus. Kuliahnya banyak memakai studi kasus perusahaan nyata, sehingga kamu terbiasa mengambil keputusan dengan data.',
            'kegiatan' => [
                ['ikon' => 'fa-briefcase', 'judul' => 'Analisis studi kasus perusahaan', 'deskripsi' => 'Membedah keputusan bisnis perusahaan nyata dan mendiskusikan pilihan lain yang bisa diambil.'],
                ['ikon' => 'fa-lightbulb', 'judul' => 'Membuat Business Plan', 'deskripsi' => 'Merancang rencana usaha lengkap dengan target pasar, model bisnis, dan proyeksi keuangan.'],
                ['ikon' => 'fa-chart-pie', 'judul' => 'Simulasi investasi', 'deskripsi' => 'Berlatih mengelola portofolio simulasi dan membaca risiko sebelum mengambil keputusan.'],
                ['ikon' => 'fa-users', 'judul' => 'Kerja tim dan presentasi', 'deskripsi' => 'Mempresentasikan usulan strategi di depan dosen dan teman untuk melatih komunikasi dan kepemimpinan.'],
            ],
            'prospek' => ['Business Manager', 'Entrepreneur', 'Marketing Director'],
            'dosen' => [
                ['nama' => 'Dr. H. Ahmad Fauzi, M.M.', 'bidang' => 'Strategi bisnis dan kepemimpinan'],
                ['nama' => 'Ratna Ningsih, M.B.A.', 'bidang' => 'Pemasaran dan perilaku konsumen'],
            ],
        ],
        'akuntansi' => [
            'nama' => 'S1 Akuntansi', 'fakultas' => 'Ekonomi & Bisnis', 'gelar' => 'S.Ak', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari pencatatan, pelaporan, dan analisis keuangan organisasi atau perusahaan.',
            'tentang' => 'Akuntansi mempelajari cara mencatat, melaporkan, dan menganalisis keuangan perusahaan atau organisasi. Kamu belajar menyusun laporan keuangan, memeriksa kewajarannya, dan menghitung pajak sesuai aturan yang berlaku.',
            'kegiatan' => [
                ['ikon' => 'fa-file-invoice', 'judul' => 'Praktik audit laporan keuangan', 'deskripsi' => 'Memeriksa laporan keuangan contoh dan menemukan bagian yang tidak wajar.'],
                ['ikon' => 'fa-calculator', 'judul' => 'Perhitungan pajak perusahaan', 'deskripsi' => 'Menghitung dan melaporkan pajak lewat contoh kasus, dari usaha kecil sampai perusahaan besar.'],
                ['ikon' => 'fa-laptop', 'judul' => 'Simulasi software akuntansi', 'deskripsi' => 'Mencatat transaksi dan menghasilkan laporan memakai aplikasi akuntansi yang dipakai di dunia kerja.'],
                ['ikon' => 'fa-balance-scale', 'judul' => 'Etika profesi akuntan', 'deskripsi' => 'Membahas kasus kecurangan laporan keuangan dan tanggung jawab seorang akuntan.'],
            ],
            'prospek' => ['Akuntan Publik', 'Auditor', 'Konsultan Pajak'],
            'dosen' => [
                ['nama' => 'Dr. Rini, S.E., Ak., CA.', 'bidang' => 'Audit dan pelaporan keuangan'],
                ['nama' => 'Yusuf Maulana, M.Ak.', 'bidang' => 'Perpajakan dan akuntansi manajemen'],
            ],
        ],
        'bisnis-digital' => [
            'nama' => 'S1 Bisnis Digital', 'fakultas' => 'Ekonomi & Bisnis', 'gelar' => 'S.B.D', 'akreditasi' => 'B',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Menggabungkan ilmu bisnis dengan teknologi digital dan e-commerce terkini.',
            'tentang' => 'Bisnis Digital menggabungkan ilmu bisnis dengan teknologi, terutama e-commerce, pemasaran digital, dan analisis data. Kamu belajar membangun dan mengembangkan usaha yang berjalan di internet.',
            'kegiatan' => [
                ['ikon' => 'fa-rocket', 'judul' => 'Membangun startup digital', 'deskripsi' => 'Merintis produk atau layanan dari ide sampai diuji ke calon pelanggan.'],
                ['ikon' => 'fa-bullhorn', 'judul' => 'Digital marketing dan SEO', 'deskripsi' => 'Menjalankan kampanye iklan dan mengoptimalkan situs agar mudah ditemukan di mesin pencari.'],
                ['ikon' => 'fa-chart-bar', 'judul' => 'Analisis data konsumen', 'deskripsi' => 'Membaca data penjualan dan perilaku pengguna untuk menentukan strategi berikutnya.'],
                ['ikon' => 'fa-shopping-cart', 'judul' => 'Mengelola toko online', 'deskripsi' => 'Mengatur katalog, pembayaran, dan pengiriman pada toko online percobaan.'],
            ],
            'prospek' => ['Digital Marketer', 'Startup Founder', 'E-commerce Manager'],
            'dosen' => [
                ['nama' => 'Reza Pahlevi, S.Kom., M.M.', 'bidang' => 'E-commerce dan transformasi digital'],
                ['nama' => 'Dita, M.B.A.', 'bidang' => 'Pemasaran digital'],
            ],
        ],
        'ekonomi-pembangunan' => [
            'nama' => 'S1 Ekonomi Pembangunan', 'fakultas' => 'Ekonomi & Bisnis', 'gelar' => 'S.E', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mengkaji masalah ekonomi makro, kebijakan publik, dan pembangunan wilayah.',
            'tentang' => 'Ekonomi Pembangunan mengkaji bagaimana kebijakan dan kondisi ekonomi memengaruhi kesejahteraan masyarakat, dari tingkat daerah sampai dunia. Kamu belajar membaca data, menganalisis kebijakan, dan mengusulkan solusi untuk masalah ekonomi.',
            'kegiatan' => [
                ['ikon' => 'fa-search-dollar', 'judul' => 'Riset kebijakan ekonomi makro', 'deskripsi' => 'Meneliti dampak kebijakan seperti pajak, subsidi, atau suku bunga terhadap masyarakat.'],
                ['ikon' => 'fa-database', 'judul' => 'Analisis data BPS', 'deskripsi' => 'Mengolah data resmi Badan Pusat Statistik untuk melihat tren kemiskinan, inflasi, dan pertumbuhan.'],
                ['ikon' => 'fa-globe', 'judul' => 'Mempelajari ekonomi internasional', 'deskripsi' => 'Memahami perdagangan antarnegara, nilai tukar, dan pengaruhnya pada ekonomi dalam negeri.'],
                ['ikon' => 'fa-map-marked-alt', 'judul' => 'Kajian pembangunan wilayah', 'deskripsi' => 'Menganalisis potensi ekonomi suatu daerah dan menyusun rekomendasi pengembangannya.'],
            ],
            'prospek' => ['Ekonom', 'Analis Kebijakan', 'Pegawai Bank Indonesia'],
            'dosen' => [
                ['nama' => 'Prof. Dr. Emil, S.E.', 'bidang' => 'Ekonomi makro dan kebijakan publik'],
                ['nama' => 'Santi, M.Ec.', 'bidang' => 'Ekonometrika dan ekonomi regional'],
            ],
        ],

        // --- FAKULTAS KEDOKTERAN ---
        'kedokteran' => [
            'nama' => 'S1 Kedokteran', 'fakultas' => 'Fakultas Kedokteran', 'gelar' => 'S.Ked', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun sarjana, dilanjutkan pendidikan profesi',
            'deskripsi' => 'Mempelajari anatomi, fisiologi, dan patologi untuk mendiagnosis dan mengobati penyakit.',
            'tentang' => 'Kedokteran mempelajari tubuh manusia dalam keadaan sehat maupun sakit, serta cara mendiagnosis dan mengobati penyakit. Tahap sarjana berisi ilmu dasar dan latihan keterampilan klinis, lalu dilanjutkan dengan pendidikan profesi di rumah sakit.',
            'kegiatan' => [
                ['ikon' => 'fa-microscope', 'judul' => 'Praktikum anatomi di lab', 'deskripsi' => 'Mempelajari struktur tubuh manusia lewat model dan praktikum, didampingi dosen.'],
                ['ikon' => 'fa-stethoscope', 'judul' => 'Keterampilan klinis (Skill Lab)', 'deskripsi' => 'Berlatih anamnesis, pemeriksaan fisik, dan prosedur dasar pada manekin dan pasien simulasi.'],
                ['ikon' => 'fa-hospital', 'judul' => 'Pendidikan profesi (Koas)', 'deskripsi' => 'Bertugas di rumah sakit pendidikan dan menangani pasien langsung di bawah pengawasan dokter.'],
                ['ikon' => 'fa-book-medical', 'judul' => 'Diskusi kasus klinis', 'deskripsi' => 'Membahas kasus pasien dalam kelompok kecil untuk melatih penalaran diagnosis.'],
            ],
            'prospek' => ['Dokter Umum', 'Dokter Spesialis', 'Peneliti Medis'],
            'dosen' => [
                ['nama' => 'Dr. dr. Anisa Rahmawati', 'bidang' => 'Anatomi dan ilmu biomedik'],
                ['nama' => 'dr. Gunawan, Sp.PD.', 'bidang' => 'Penyakit dalam'],
            ],
        ],
        'farmasi' => [
            'nama' => 'S1 Farmasi', 'fakultas' => 'Fakultas Kedokteran', 'gelar' => 'S.Farm', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun sarjana, dilanjutkan profesi apoteker',
            'deskripsi' => 'Ilmu tentang obat-obatan, mulai dari formulasi, pembuatan, hingga efeknya pada tubuh.',
            'tentang' => 'Farmasi mempelajari obat dari sisi bahan, pembuatan, sampai cara kerjanya di dalam tubuh. Kamu belajar meracik dan menguji obat, sekaligus memberi informasi yang tepat agar obat dipakai dengan aman.',
            'kegiatan' => [
                ['ikon' => 'fa-mortar-pestle', 'judul' => 'Praktikum meracik obat', 'deskripsi' => 'Membuat sediaan seperti tablet, salep, dan sirup dengan takaran dan prosedur yang tepat.'],
                ['ikon' => 'fa-flask', 'judul' => 'Uji klinis bahan kimia', 'deskripsi' => 'Menguji kadar dan kemurnian bahan obat dengan alat laboratorium.'],
                ['ikon' => 'fa-leaf', 'judul' => 'Mempelajari botani farmasi', 'deskripsi' => 'Mengenal tanaman berkhasiat obat dan cara mengolahnya menjadi bahan obat.'],
                ['ikon' => 'fa-comments', 'judul' => 'Konseling dan informasi obat', 'deskripsi' => 'Berlatih menjelaskan aturan pakai dan efek samping obat kepada pasien.'],
            ],
            'prospek' => ['Apoteker', 'R&D Industri Farmasi', 'BPOM Staff'],
            'dosen' => [
                ['nama' => 'Dr. apt. Sari, M.Si.', 'bidang' => 'Kimia farmasi dan bahan alam'],
                ['nama' => 'apt. Rudi, M.Farm.', 'bidang' => 'Farmasi klinis'],
            ],
        ],
        'keperawatan' => [
            'nama' => 'S1 Ilmu Keperawatan', 'fakultas' => 'Fakultas Kedokteran', 'gelar' => 'S.Kep', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun sarjana, dilanjutkan profesi Ners',
            'deskripsi' => 'Mempersiapkan perawat profesional dengan pengetahuan medis modern dan keterampilan empatik.',
            'tentang' => 'Ilmu Keperawatan mempersiapkan perawat yang menguasai pengetahuan medis dan mampu merawat pasien dengan empati. Kamu belajar memberikan asuhan keperawatan mulai dari pengkajian sampai evaluasi, di laboratorium maupun di rumah sakit.',
            'kegiatan' => [
                ['ikon' => 'fa-ambulance', 'judul' => 'Simulasi penanganan gawat darurat', 'deskripsi' => 'Berlatih resusitasi dan pertolongan pertama pada situasi darurat di laboratorium simulasi.'],
                ['ikon' => 'fa-hospital', 'judul' => 'Praktik kerja di rumah sakit', 'deskripsi' => 'Merawat pasien langsung di bangsal dan puskesmas dengan bimbingan perawat senior.'],
                ['ikon' => 'fa-notes-medical', 'judul' => 'Asuhan keperawatan pasien', 'deskripsi' => 'Menyusun rencana perawatan berdasarkan kondisi pasien dan mencatat perkembangannya.'],
                ['ikon' => 'fa-hands-helping', 'judul' => 'Edukasi kesehatan masyarakat', 'deskripsi' => 'Memberi penyuluhan kesehatan kepada warga di lingkungan sekitar kampus.'],
            ],
            'prospek' => ['Perawat Klinis', 'Manajer Rumah Sakit', 'Dosen Keperawatan'],
            'dosen' => [
                ['nama' => 'Ns. Maria Ulfa, Sp.Kep.MB', 'bidang' => 'Keperawatan medikal bedah'],
                ['nama' => 'Ns. Kevin Aditya, M.Kep.', 'bidang' => 'Keperawatan gawat darurat'],
            ],
        ],
        'gizi' => [
            'nama' => 'S1 Gizi', 'fakultas' => 'Fakultas Kedokteran', 'gelar' => 'S.Gz', 'akreditasi' => 'B',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari hubungan antara makanan, nutrisi, dan kesehatan tubuh manusia.',
            'tentang' => 'Gizi mempelajari hubungan antara makanan, nutrisi, dan kesehatan. Kamu belajar menilai status gizi seseorang, menyusun menu yang sesuai kebutuhan, dan memberi edukasi agar masyarakat makan lebih sehat.',
            'kegiatan' => [
                ['ikon' => 'fa-utensils', 'judul' => 'Menyusun diet pasien rumah sakit', 'deskripsi' => 'Merancang menu untuk pasien dengan kebutuhan khusus, misalnya rendah garam atau tinggi protein.'],
                ['ikon' => 'fa-apple-alt', 'judul' => 'Analisis kandungan gizi makanan', 'deskripsi' => 'Menghitung energi, protein, lemak, dan vitamin dalam makanan lewat uji laboratorium dan tabel komposisi.'],
                ['ikon' => 'fa-comments', 'judul' => 'Konseling gizi masyarakat', 'deskripsi' => 'Berlatih memberi saran gizi kepada individu dan kelompok, termasuk ibu hamil dan anak.'],
                ['ikon' => 'fa-clipboard-check', 'judul' => 'Penilaian status gizi', 'deskripsi' => 'Mengukur tinggi badan, berat badan, dan asupan makan untuk menilai status gizi seseorang.'],
            ],
            'prospek' => ['Ahli Gizi Klinis (Nutrisionis)', 'Konsultan Diet', 'Quality Control Makanan'],
            'dosen' => [
                ['nama' => 'Dr. Retno, S.Gz., M.Si.', 'bidang' => 'Gizi klinis'],
                ['nama' => 'Tina, M.Gizi.', 'bidang' => 'Gizi masyarakat'],
            ],
        ],

        // --- FAKULTAS HUKUM & SOSIAL ---
        'ilmu-hukum' => [
            'nama' => 'S1 Ilmu Hukum', 'fakultas' => 'Hukum & Sosial', 'gelar' => 'S.H', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mendidik ahli hukum yang adil dan berintegritas. Berfokus pada hukum perdata, pidana, dan tata negara.',
            'tentang' => 'Ilmu Hukum mempelajari aturan yang mengatur kehidupan bersama dan cara menegakkannya. Kamu belajar hukum perdata, pidana, dan tata negara, serta melatih kemampuan menyusun argumen yang runtut dan berdasar.',
            'kegiatan' => [
                ['ikon' => 'fa-gavel', 'judul' => 'Simulasi peradilan semu (Moot Court)', 'deskripsi' => 'Memerankan hakim, jaksa, dan pengacara dalam sidang latihan berdasarkan kasus rekaan.'],
                ['ikon' => 'fa-file-alt', 'judul' => 'Analisis putusan pengadilan', 'deskripsi' => 'Membaca putusan nyata dan menilai pertimbangan hukumnya.'],
                ['ikon' => 'fa-building', 'judul' => 'Magang di kejaksaan atau firma hukum', 'deskripsi' => 'Mengikuti pekerjaan hukum sehari-hari, dari menyusun dokumen sampai mendampingi persidangan.'],
                ['ikon' => 'fa-pen-fancy', 'judul' => 'Menulis kajian hukum', 'deskripsi' => 'Menyusun karya tulis yang membahas satu persoalan hukum secara runtut dan berdasar.'],
            ],
            'prospek' => ['Hakim', 'Jaksa', 'Pengacara', 'Notaris'],
            'dosen' => [
                ['nama' => 'Prof. Dr. Antonius, S.H., M.H.', 'bidang' => 'Hukum pidana'],
                ['nama' => 'Dr. Siska Amelia, M.Kn.', 'bidang' => 'Hukum perdata dan kenotariatan'],
            ],
        ],
        'ilmu-komunikasi' => [
            'nama' => 'S1 Ilmu Komunikasi', 'fakultas' => 'Hukum & Sosial', 'gelar' => 'S.I.Kom', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari cara menyampaikan pesan secara efektif melalui berbagai media.',
            'tentang' => 'Ilmu Komunikasi mempelajari cara pesan dibuat, disampaikan, dan diterima lewat berbagai media. Kamu belajar menulis, berbicara, memproduksi konten, dan mengelola citra organisasi.',
            'kegiatan' => [
                ['ikon' => 'fa-video', 'judul' => 'Praktik siaran TV dan radio', 'deskripsi' => 'Menjadi penyiar, juru kamera, dan penyunting di studio kampus.'],
                ['ikon' => 'fa-bullhorn', 'judul' => 'Manajemen Public Relations', 'deskripsi' => 'Menyusun rencana komunikasi dan menangani situasi krisis untuk organisasi rekaan.'],
                ['ikon' => 'fa-camera', 'judul' => 'Produksi konten kreatif', 'deskripsi' => 'Membuat video, podcast, dan tulisan untuk media sosial dan media daring.'],
                ['ikon' => 'fa-newspaper', 'judul' => 'Praktik jurnalistik', 'deskripsi' => 'Meliput, menulis, dan menyunting berita sesuai kode etik jurnalistik.'],
            ],
            'prospek' => ['Public Relations', 'Jurnalis', 'Broadcaster'],
            'dosen' => [
                ['nama' => 'Dr. Fitri, M.Si.', 'bidang' => 'Komunikasi media dan jurnalistik'],
                ['nama' => 'Bowo, S.I.Kom., M.I.Kom.', 'bidang' => 'Public relations dan komunikasi korporat'],
            ],
        ],
        'hubungan-internasional' => [
            'nama' => 'S1 Hubungan Internasional', 'fakultas' => 'Hukum & Sosial', 'gelar' => 'S.Hub.Int', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mengkaji interaksi antar negara, diplomasi, politik global, dan isu internasional.',
            'tentang' => 'Hubungan Internasional mengkaji bagaimana negara, organisasi, dan kelompok masyarakat berinteraksi lintas batas. Kamu belajar membaca politik global, diplomasi, dan isu seperti perdagangan, keamanan, dan lingkungan.',
            'kegiatan' => [
                ['ikon' => 'fa-flag', 'judul' => 'Simulasi sidang PBB (Model UN)', 'deskripsi' => 'Mewakili sebuah negara dalam sidang simulasi dan berlatih bernegosiasi dalam bahasa Inggris.'],
                ['ikon' => 'fa-globe-asia', 'judul' => 'Analisis politik luar negeri', 'deskripsi' => 'Menelaah alasan di balik kebijakan luar negeri suatu negara.'],
                ['ikon' => 'fa-handshake', 'judul' => 'Kajian resolusi konflik', 'deskripsi' => 'Mempelajari bagaimana konflik antarnegara dicegah dan diselesaikan lewat diplomasi.'],
                ['ikon' => 'fa-file-signature', 'judul' => 'Menulis policy brief', 'deskripsi' => 'Menyusun ringkasan kebijakan singkat tentang isu internasional untuk para pengambil keputusan.'],
            ],
            'prospek' => ['Diplomat', 'Staf Kedutaan', 'Konsultan Internasional'],
            'dosen' => [
                ['nama' => 'Prof. Dr. Hikmah, M.A.', 'bidang' => 'Diplomasi dan politik luar negeri'],
                ['nama' => 'Dicky, M.IR.', 'bidang' => 'Keamanan internasional'],
            ],
        ],
        'psikologi' => [
            'nama' => 'S1 Psikologi', 'fakultas' => 'Hukum & Sosial', 'gelar' => 'S.Psi', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari perilaku, proses mental, dan interaksi manusia dengan lingkungannya.',
            'tentang' => 'Psikologi mempelajari perilaku dan proses mental manusia, serta bagaimana keduanya dipengaruhi lingkungan. Kamu belajar meneliti, mengamati, dan memakai alat ukur psikologis. Untuk berpraktik sebagai psikolog, lulusan perlu melanjutkan ke S2 profesi.',
            'kegiatan' => [
                ['ikon' => 'fa-flask', 'judul' => 'Eksperimen psikologi', 'deskripsi' => 'Merancang eksperimen sederhana tentang ingatan, perhatian, atau perilaku, lalu menganalisis datanya.'],
                ['ikon' => 'fa-clipboard-list', 'judul' => 'Administrasi alat tes psikologi', 'deskripsi' => 'Belajar memberikan dan menilai tes psikologi dengan prosedur yang benar.'],
                ['ikon' => 'fa-child', 'judul' => 'Observasi perilaku anak', 'deskripsi' => 'Mengamati perkembangan anak di sekolah atau taman kanak-kanak dan mencatat temuannya.'],
                ['ikon' => 'fa-comments', 'judul' => 'Latihan wawancara dan konseling dasar', 'deskripsi' => 'Berlatih mendengarkan dan mengajukan pertanyaan yang membantu orang bercerita.'],
            ],
            'prospek' => ['HRD Manager', 'Psikolog (setelah S2)', 'Konselor'],
            'dosen' => [
                ['nama' => 'Dr. Maya, S.Psi., M.Psi.', 'bidang' => 'Psikologi klinis'],
                ['nama' => 'Tito, M.Si.', 'bidang' => 'Psikologi industri dan organisasi'],
            ],
        ],

        // --- FAKULTAS ILMU PENDIDIKAN ---
        'pgsd' => [
            'nama' => 'S1 PGSD', 'fakultas' => 'Ilmu Pendidikan', 'gelar' => 'S.Pd', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Pendidikan Guru Sekolah Dasar mempersiapkan calon guru yang kreatif dan memahami karakter anak.',
            'tentang' => 'PGSD mempersiapkan calon guru sekolah dasar yang memahami cara belajar anak dan mampu membuat pelajaran menarik. Kamu belajar mengajar berbagai mata pelajaran dasar sekaligus mendampingi perkembangan karakter anak.',
            'kegiatan' => [
                ['ikon' => 'fa-chalkboard-teacher', 'judul' => 'Praktik mengajar (Microteaching)', 'deskripsi' => 'Mengajar teman sekelas dalam waktu singkat, lalu menerima masukan dari dosen.'],
                ['ikon' => 'fa-puzzle-piece', 'judul' => 'Membuat media pembelajaran interaktif', 'deskripsi' => 'Merancang alat peraga dan permainan edukatif agar materi mudah dipahami anak.'],
                ['ikon' => 'fa-child', 'judul' => 'Kajian psikologi anak', 'deskripsi' => 'Memahami tahap perkembangan anak SD dan cara menghadapi perilaku mereka di kelas.'],
                ['ikon' => 'fa-school', 'judul' => 'Praktik di sekolah dasar', 'deskripsi' => 'Mengajar dan membantu guru di SD mitra selama masa praktik lapangan.'],
            ],
            'prospek' => ['Guru SD', 'Pengembang Kurikulum Dasar', 'Kepala Sekolah'],
            'dosen' => [
                ['nama' => 'Dr. Yanti, M.Pd.', 'bidang' => 'Pembelajaran di sekolah dasar'],
                ['nama' => 'Bagus, S.Pd., M.Pd.', 'bidang' => 'Pengembangan kurikulum dan media ajar'],
            ],
        ],
        'pendidikan-bahasa-inggris' => [
            'nama' => 'S1 Pendidikan Bahasa Inggris', 'fakultas' => 'Ilmu Pendidikan', 'gelar' => 'S.Pd', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari keterampilan bahasa Inggris (speaking, writing) serta pedagogi pengajarannya.',
            'tentang' => 'Pendidikan Bahasa Inggris melatih kemampuan speaking, writing, reading, dan listening kamu sekaligus cara mengajarkannya. Kamu belajar menjadi pengguna bahasa Inggris yang percaya diri dan guru yang bisa membuat siswa berani berbicara.',
            'kegiatan' => [
                ['ikon' => 'fa-comments', 'judul' => 'Debat bahasa Inggris', 'deskripsi' => 'Berlatih menyusun argumen dan berbicara di depan umum dalam bahasa Inggris.'],
                ['ikon' => 'fa-language', 'judul' => 'Menerjemahkan teks akademik', 'deskripsi' => 'Menerjemahkan artikel dan buku ilmiah sambil memperhatikan ketepatan istilah.'],
                ['ikon' => 'fa-chalkboard-teacher', 'judul' => 'Praktik mengajar bahasa asing', 'deskripsi' => 'Menyusun rencana pelajaran dan mengajar di kelas simulasi maupun sekolah mitra.'],
                ['ikon' => 'fa-book-reader', 'judul' => 'Kajian sastra dan linguistik', 'deskripsi' => 'Membaca karya sastra berbahasa Inggris dan mempelajari struktur bahasanya.'],
            ],
            'prospek' => ['Guru Bahasa Inggris', 'Penerjemah', 'Edutour Guide'],
            'dosen' => [
                ['nama' => 'Prof. Dr. Sarah, M.A.', 'bidang' => 'Linguistik terapan'],
                ['nama' => 'John, M.Ed.', 'bidang' => 'Pengajaran speaking dan pembelajaran bahasa'],
            ],
        ],
        'pendidikan-matematika' => [
            'nama' => 'S1 Pendidikan Matematika', 'fakultas' => 'Ilmu Pendidikan', 'gelar' => 'S.Pd', 'akreditasi' => 'A',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mengembangkan metode mengajar matematika yang menyenangkan dan mudah dipahami siswa.',
            'tentang' => 'Pendidikan Matematika mempelajari matematika sekaligus cara mengajarkannya supaya mudah dipahami. Kamu memperdalam konsep seperti aljabar dan kalkulus, lalu merancang pembelajaran yang membuat siswa tidak takut pada matematika.',
            'kegiatan' => [
                ['ikon' => 'fa-square-root-alt', 'judul' => 'Analisis teorema matematika', 'deskripsi' => 'Memahami bukti teorema dan cara berpikir di balik rumus.'],
                ['ikon' => 'fa-shapes', 'judul' => 'Membuat alat peraga matematika', 'deskripsi' => 'Membuat alat bantu dari bahan sederhana untuk menjelaskan konsep yang abstrak.'],
                ['ikon' => 'fa-chalkboard-teacher', 'judul' => 'Simulasi mengajar di kelas', 'deskripsi' => 'Berlatih menjelaskan materi di depan kelas dan menanggapi pertanyaan siswa.'],
                ['ikon' => 'fa-laptop', 'judul' => 'Belajar dengan perangkat lunak matematika', 'deskripsi' => 'Memakai aplikasi seperti GeoGebra untuk membuat visualisasi dan bahan ajar.'],
            ],
            'prospek' => ['Guru Matematika', 'Analis Data Pendidikan', 'Peneliti Pendidikan'],
            'dosen' => [
                ['nama' => 'Dr. Heru, M.Si.', 'bidang' => 'Analisis dan aljabar'],
                ['nama' => 'Lita, M.Pd.', 'bidang' => 'Strategi pembelajaran matematika'],
            ],
        ],
        'paud' => [
            'nama' => 'S1 Pendidikan Anak Usia Dini', 'fakultas' => 'Ilmu Pendidikan', 'gelar' => 'S.Pd', 'akreditasi' => 'B',
            'lama_studi' => '4 tahun (8 semester)',
            'deskripsi' => 'Mempelajari metode pendidikan, perkembangan kognitif, dan motorik untuk anak usia prasekolah.',
            'tentang' => 'PAUD mempelajari cara mendidik anak usia prasekolah, dengan fokus pada perkembangan kognitif, bahasa, sosial, dan motorik. Kamu belajar merancang kegiatan bermain yang sekaligus mengajarkan sesuatu.',
            'kegiatan' => [
                ['ikon' => 'fa-puzzle-piece', 'judul' => 'Membuat permainan edukatif', 'deskripsi' => 'Merancang dan membuat alat bermain yang aman dan melatih kemampuan anak.'],
                ['ikon' => 'fa-school', 'judul' => 'Observasi ke TK dan PAUD', 'deskripsi' => 'Mengamati kegiatan belajar anak dan cara guru mengelola kelas.'],
                ['ikon' => 'fa-seedling', 'judul' => 'Kajian tumbuh kembang anak', 'deskripsi' => 'Mempelajari tahap perkembangan anak usia 0 sampai 6 tahun dan cara mendukungnya.'],
                ['ikon' => 'fa-music', 'judul' => 'Kegiatan seni, musik, dan bercerita', 'deskripsi' => 'Menyusun kegiatan menyanyi, menggambar, dan mendongeng untuk anak.'],
            ],
            'prospek' => ['Guru TK/PAUD', 'Konsultan Pendidikan Anak', 'Pemilik Daycare'],
            'dosen' => [
                ['nama' => 'Ira, S.Pd., M.Pd.', 'bidang' => 'Pembelajaran anak usia dini'],
                ['nama' => 'Dr. Wina, M.Si.', 'bidang' => 'Perkembangan anak'],
            ],
        ],
    ];

    public function index()
    {
        return view('akademik', ['jurusan' => $this->dataJurusan]);
    }

    // Halaman "Tentang Kami": memakai data jurusan untuk menghitung angka fakultas dan program studi.
    // Sesuaikan nama view ('tentang') dengan nama file view Anda.
    public function tentang()
    {
        return view('tentang', ['jurusan' => $this->dataJurusan]);
    }

    public function show($slug)
    {
        if (!array_key_exists($slug, $this->dataJurusan)) {
            abort(404);
        }

        $detail = $this->dataJurusan[$slug];

        // Jurusan lain di fakultas yang sama (tanpa jurusan yang sedang dibuka)
        $terkait = collect($this->dataJurusan)
            ->filter(fn ($j, $kunci) => $j['fakultas'] === $detail['fakultas'] && $kunci !== $slug);

        return view('jurusan-detail', [
            'slug'    => $slug,
            'detail'  => $detail,
            'terkait' => $terkait,
        ]);
    }
}