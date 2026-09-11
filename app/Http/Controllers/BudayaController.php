<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BudayaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $kamus = $this->getData('kamus');
        $rumah = $this->getData('rumah');
        $tradisi = $this->getData('tradisi');
        $kuliner = $this->getData('kuliner');

        return view('budaya.dashboard', [
            'jumlahKamus' => count($kamus),
            'jumlahRumah' => count($rumah),
            'jumlahTradisi' => count($tradisi),
            'jumlahKuliner' => count($kuliner),
            'kamusTerbaru' => array_slice(array_reverse($kamus), 0, 5),
            'tradisiTerbaru' => array_slice(array_reverse($tradisi), 0, 3),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | HELPER SESSION
    |--------------------------------------------------------------------------
    */

    private function getData(string $key): array
    {
        if (!session()->has($key)) {
            session()->put($key, $this->defaultData($key));
        }

        return session()->get($key, []);
    }

    private function saveData(string $key, array $data): void
    {
        session()->put($key, array_values($data));
    }

    private function findItem(string $key, string $id): ?array
    {
        $data = $this->getData($key);

        foreach ($data as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }

        return null;
    }

    private function generateId(): string
    {
        return (string) Str::uuid();
    }

    private function notFound(string $message = 'Data tidak ditemukan.')
    {
        abort(404, $message);
    }


    /*
    |--------------------------------------------------------------------------
    | DATA AWAL
    |--------------------------------------------------------------------------
    */

    private function defaultData(string $key): array
    {
        return match ($key) {

            /*
            |--------------------------------------------------------------------------
            | KAMUS OSING
            |--------------------------------------------------------------------------
            */

            'kamus' => [

                [
                    'id' => 'kamus-1',
                    'kata' => 'Isun',
                    'arti' => 'Saya / Aku',
                    'kategori' => 'Kata Ganti',
                    'contoh' => 'Isun arep lunga.',
                    'keterangan' => 'Kata yang digunakan untuk menyebut diri sendiri.',
                ],

                [
                    'id' => 'kamus-2',
                    'kata' => 'Riko',
                    'arti' => 'Kamu',
                    'kategori' => 'Kata Ganti',
                    'contoh' => 'Riko arep menyang endi?',
                    'keterangan' => 'Digunakan untuk menyebut lawan bicara.',
                ],

                [
                    'id' => 'kamus-3',
                    'kata' => 'Mangan',
                    'arti' => 'Makan',
                    'kategori' => 'Kegiatan',
                    'contoh' => 'Isun mangan sega.',
                    'keterangan' => 'Kata kerja untuk aktivitas makan.',
                ],

                [
                    'id' => 'kamus-4',
                    'kata' => 'Omah',
                    'arti' => 'Rumah',
                    'kategori' => 'Tempat',
                    'contoh' => 'Omah iku ana ing Kemiren.',
                    'keterangan' => 'Tempat tinggal atau bangunan tempat seseorang tinggal.',
                ],

                [
                    'id' => 'kamus-5',
                    'kata' => 'Arep',
                    'arti' => 'Akan / Mau',
                    'kategori' => 'Kata Kerja',
                    'contoh' => 'Isun arep sekolah.',
                    'keterangan' => 'Menunjukkan keinginan atau sesuatu yang akan dilakukan.',
                ],

                [
                    'id' => 'kamus-6',
                    'kata' => 'Mrene',
                    'arti' => 'Ke sini',
                    'kategori' => 'Keterangan Tempat',
                    'contoh' => 'Riko mrene sek.',
                    'keterangan' => 'Menunjukkan arah menuju tempat pembicara.',
                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | RUMAH ADAT
            |--------------------------------------------------------------------------
            */

            'rumah' => [

                [
                    'id' => 'rumah-1',
                    'nama' => 'Crokogan',
                    'jenis' => 'Rumah Adat Osing',
                    'deskripsi' => 'Crokogan merupakan salah satu bentuk rumah tradisional masyarakat Osing dengan bentuk atap yang sederhana.',
                    'ciri' => 'Bentuk atap sederhana dan memiliki struktur khas rumah tradisional Osing.',
                    'makna' => 'Mencerminkan kesederhanaan serta kehidupan masyarakat Osing.',
                ],

                [
                    'id' => 'rumah-2',
                    'nama' => 'Baresan',
                    'jenis' => 'Rumah Adat Osing',
                    'deskripsi' => 'Baresan merupakan salah satu bentuk rumah adat Osing yang memiliki bentuk atap lebih tinggi dibandingkan Crokogan.',
                    'ciri' => 'Atap lebih tinggi dengan susunan ruang yang menyesuaikan kebutuhan keluarga.',
                    'makna' => 'Menunjukkan perkembangan bentuk rumah tradisional masyarakat Osing.',
                ],

                [
                    'id' => 'rumah-3',
                    'nama' => 'Tikel Kangmas',
                    'jenis' => 'Rumah Adat Osing',
                    'deskripsi' => 'Tikel Kangmas dikenal sebagai bentuk rumah adat Osing dengan struktur atap yang paling tinggi dan memiliki nilai kesakralan.',
                    'ciri' => 'Atap tinggi dan struktur bangunan yang lebih kompleks.',
                    'makna' => 'Memiliki nilai simbolis dan dianggap sebagai bentuk rumah yang paling tinggi tingkatannya.',
                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | TRADISI & KESENIAN
            |--------------------------------------------------------------------------
            */

            'tradisi' => [

                [
                    'id' => 'tradisi-1',
                    'nama' => 'Tari Gandrung Banyuwangi',
                    'kategori' => 'Kesenian',
                    'lokasi' => 'Banyuwangi',
                    'deskripsi' => 'Tarian penghormatan kepada Dewi Sri. Mahkota Omprok penari memiliki hiasan kepala kerbau Gajah Oling berkilau emas. Diiringi instrumen biola, kendang, kethuk, dan klunting.',
                ],

                [
                    'id' => 'tradisi-2',
                    'nama' => 'Ritual Sakral Seblang',
                    'kategori' => 'Tradisi',
                    'lokasi' => 'Olehsari dan Bakungan',
                    'deskripsi' => 'Seblang digelar di Olehsari pada awal Syawal dan Bakungan pada Dzulhijjah. Penari menari dalam kondisi trance membawa tampah beras koin Kembang Dwi Warna.',
                ],

                [
                    'id' => 'tradisi-3',
                    'nama' => 'Tradisi Kebo-Keboan Aliyan',
                    'kategori' => 'Tradisi',
                    'lokasi' => 'Aliyan',
                    'deskripsi' => 'Warga yang kerasukan roh leluhur bertindak seperti kerbau membajak sawah dan berlumpur untuk memohon musim tanam subur melimpah.',
                ],

                [
                    'id' => 'tradisi-4',
                    'nama' => 'Barong Ider Bumi Kemiren',
                    'kategori' => 'Tradisi',
                    'lokasi' => 'Kemiren',
                    'deskripsi' => 'Arak-arakan topeng Barong berkepala naga bermata merah mengelilingi batas desa Kemiren sambil menyebarkan beras kuning dan koin.',
                ],

                [
                    'id' => 'tradisi-5',
                    'nama' => 'Festival Tumpeng Sewu',
                    'kategori' => 'Tradisi',
                    'lokasi' => 'Kemiren',
                    'deskripsi' => 'Ribuan tumpeng disajikan di pelataran rumah warga Desa Kemiren setiap bulan Dzulhijjah. Sajian utama wajib menggunakan lauk Pecel Pitik.',
                ],

                [
                    'id' => 'tradisi-6',
                    'nama' => 'Adu Ketangkasan Angklung Caruk',
                    'kategori' => 'Kesenian',
                    'lokasi' => 'Banyuwangi',
                    'deskripsi' => 'Dua kelompok penabuh angklung bambu bernada pentatonis saling membalas gending lagu secara improvisasi dan adu ketangkasan melodi.',
                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | KULINER
            |--------------------------------------------------------------------------
            */

            'kuliner' => [

                [
                    'id' => 'kuliner-1',
                    'nama' => 'Pecel Pitik Sakral',
                    'kategori' => 'Makanan Tradisional',
                    'bahan' => 'Ayam kampung, kelapa muda, cabai rawit, terasi, jeruk limau.',
                    'deskripsi' => 'Ayam kampung dibakar dengan bumbu parutan kelapa muda sangrai, cabai rawit, terasi, dan air jeruk limau.',
                    'keunikan' => 'Wajib ada saat acara selamatan adat Osing.',
                ],

                [
                    'id' => 'kuliner-2',
                    'nama' => 'Rujak Soto khas Banyuwangi',
                    'kategori' => 'Makanan Tradisional',
                    'bahan' => 'Rujak petis, kacang hijau, kuah soto babat, seledri, emping.',
                    'deskripsi' => 'Racikan unik rujak petis kacang hijau yang diguyur kuah soto babat hangat dengan taburan seledri dan emping goreng.',
                    'keunikan' => 'Menggabungkan dua makanan yang berbeda menjadi satu sajian khas Banyuwangi.',
                ],

                [
                    'id' => 'kuliner-3',
                    'nama' => 'Sego Tempong Sambal Ranti',
                    'kategori' => 'Makanan Tradisional',
                    'bahan' => 'Nasi, daun pepaya, terong, bayam, tomat ranti, cabai, terasi.',
                    'deskripsi' => 'Sajian nasi dengan lalapan rebus seperti daun pepaya, terong, dan bayam yang disiram sambal terasi mentah tomat ranti.',
                    'keunikan' => 'Ciri utamanya adalah sambal yang pedas dan segar.',
                ],

                [
                    'id' => 'kuliner-4',
                    'nama' => 'Ayam Kesrut Segar Rempah',
                    'kategori' => 'Makanan Tradisional',
                    'bahan' => 'Ayam kampung, cabai, terasi, bunga kecombrang.',
                    'deskripsi' => 'Olahan sup ayam kampung berbumbu ringkas cabai, terasi, dan potongan bunga kecombrang segar.',
                    'keunikan' => 'Menghasilkan rasa gurih, pedas, dan asam yang khas.',
                ],

            ],

            default => [],
        };
    }


    /*
    |--------------------------------------------------------------------------
    | KAMUS OSING CRUD
    |--------------------------------------------------------------------------
    */

    public function kamusIndex(Request $request)
    {
        $data = $this->getData('kamus');

        $search = trim($request->search ?? '');
        $kategori = $request->kategori ?? '';

        if ($search !== '') {
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(
                    strtolower($item['kata']),
                    strtolower($search)
                )
                ||
                str_contains(
                    strtolower($item['arti']),
                    strtolower($search)
                );
            });
        }

        if ($kategori !== '') {
            $data = array_filter($data, function ($item) use ($kategori) {
                return $item['kategori'] === $kategori;
            });
        }

        $kategoriList = array_values(
            array_unique(
                array_column($this->getData('kamus'), 'kategori')
            )
        );

        return view('budaya.kamus.index', compact(
            'data',
            'search',
            'kategori',
            'kategoriList'
        ));
    }

    public function kamusCreate()
    {
        return view('budaya.kamus.create');
    }

    public function kamusStore(Request $request)
    {
        $validated = $request->validate([
            'kata' => 'required|string|max:100',
            'arti' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'contoh' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $data = $this->getData('kamus');

        $validated['id'] = $this->generateId();

        $data[] = $validated;

        $this->saveData('kamus', $data);

        return redirect()
            ->route('budaya.kamus.index')
            ->with('success', 'Kosakata berhasil ditambahkan.');
    }

    public function kamusShow(string $id)
    {
        $item = $this->findItem('kamus', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.kamus.show', compact('item'));
    }

    public function kamusEdit(string $id)
    {
        $item = $this->findItem('kamus', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.kamus.edit', compact('item'));
    }

    public function kamusUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'kata' => 'required|string|max:100',
            'arti' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'contoh' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $data = $this->getData('kamus');

        foreach ($data as $key => $item) {
            if ($item['id'] === $id) {
                $validated['id'] = $id;
                $data[$key] = $validated;

                $this->saveData('kamus', $data);

                return redirect()
                    ->route('budaya.kamus.index')
                    ->with('success', 'Kosakata berhasil diperbarui.');
            }
        }

        return $this->notFound();
    }

    public function kamusDestroy(string $id)
    {
        $data = $this->getData('kamus');

        $data = array_filter($data, function ($item) use ($id) {
            return $item['id'] !== $id;
        });

        $this->saveData('kamus', $data);

        return redirect()
            ->route('budaya.kamus.index')
            ->with('success', 'Kosakata berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | RUMAH ADAT CRUD
    |--------------------------------------------------------------------------
    */

    public function rumahAdatIndex(Request $request)
    {
        $data = $this->getData('rumah');

        $search = trim($request->search ?? '');

        if ($search !== '') {
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(
                    strtolower($item['nama']),
                    strtolower($search)
                )
                ||
                str_contains(
                    strtolower($item['deskripsi']),
                    strtolower($search)
                );
            });
        }

        return view('budaya.rumah-adat.index', compact(
            'data',
            'search'
        ));
    }

    public function rumahAdatCreate()
    {
        return view('budaya.rumah-adat.create');
    }

    public function rumahAdatStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jenis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'ciri' => 'required|string',
            'makna' => 'required|string',
        ]);

        $data = $this->getData('rumah');

        $validated['id'] = $this->generateId();

        $data[] = $validated;

        $this->saveData('rumah', $data);

        return redirect()
            ->route('budaya.rumah.index')
            ->with('success', 'Rumah adat berhasil ditambahkan.');
    }

    public function rumahAdatShow(string $id)
    {
        $item = $this->findItem('rumah', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.rumah-adat.show', compact('item'));
    }

    public function rumahAdatEdit(string $id)
    {
        $item = $this->findItem('rumah', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.rumah-adat.edit', compact('item'));
    }

    public function rumahAdatUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jenis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'ciri' => 'required|string',
            'makna' => 'required|string',
        ]);

        $data = $this->getData('rumah');

        foreach ($data as $key => $item) {
            if ($item['id'] === $id) {
                $validated['id'] = $id;
                $data[$key] = $validated;

                $this->saveData('rumah', $data);

                return redirect()
                    ->route('budaya.rumah.index')
                    ->with('success', 'Rumah adat berhasil diperbarui.');
            }
        }

        return $this->notFound();
    }

    public function rumahAdatDestroy(string $id)
    {
        $data = $this->getData('rumah');

        $data = array_filter($data, function ($item) use ($id) {
            return $item['id'] !== $id;
        });

        $this->saveData('rumah', $data);

        return redirect()
            ->route('budaya.rumah.index')
            ->with('success', 'Rumah adat berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | TRADISI & KESENIAN CRUD
    |--------------------------------------------------------------------------
    */

    public function tradisiIndex(Request $request)
    {
        $data = $this->getData('tradisi');

        $search = trim($request->search ?? '');
        $kategori = $request->kategori ?? '';

        if ($search !== '') {
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(
                    strtolower($item['nama']),
                    strtolower($search)
                )
                ||
                str_contains(
                    strtolower($item['lokasi']),
                    strtolower($search)
                );
            });
        }

        if ($kategori !== '') {
            $data = array_filter($data, function ($item) use ($kategori) {
                return $item['kategori'] === $kategori;
            });
        }

        $kategoriList = array_values(
            array_unique(
                array_column($this->getData('tradisi'), 'kategori')
            )
        );

        return view('budaya.tradisi.index', compact(
            'data',
            'search',
            'kategori',
            'kategoriList'
        ));
    }

    public function tradisiCreate()
    {
        return view('budaya.tradisi.create');
    }

    public function tradisiStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'deskripsi' => 'required|string',
        ]);

        $data = $this->getData('tradisi');

        $validated['id'] = $this->generateId();

        $data[] = $validated;

        $this->saveData('tradisi', $data);

        return redirect()
            ->route('budaya.tradisi.index')
            ->with('success', 'Tradisi berhasil ditambahkan.');
    }

    public function tradisiShow(string $id)
    {
        $item = $this->findItem('tradisi', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.tradisi.show', compact('item'));
    }

    public function tradisiEdit(string $id)
    {
        $item = $this->findItem('tradisi', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.tradisi.edit', compact('item'));
    }

    public function tradisiUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'deskripsi' => 'required|string',
        ]);

        $data = $this->getData('tradisi');

        foreach ($data as $key => $item) {
            if ($item['id'] === $id) {
                $validated['id'] = $id;
                $data[$key] = $validated;

                $this->saveData('tradisi', $data);

                return redirect()
                    ->route('budaya.tradisi.index')
                    ->with('success', 'Tradisi berhasil diperbarui.');
            }
        }

        return $this->notFound();
    }

    public function tradisiDestroy(string $id)
    {
        $data = $this->getData('tradisi');

        $data = array_filter($data, function ($item) use ($id) {
            return $item['id'] !== $id;
        });

        $this->saveData('tradisi', $data);

        return redirect()
            ->route('budaya.tradisi.index')
            ->with('success', 'Tradisi berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | KULINER CRUD
    |--------------------------------------------------------------------------
    */

    public function kulinerIndex(Request $request)
    {
        $data = $this->getData('kuliner');

        $search = trim($request->search ?? '');

        if ($search !== '') {
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(
                    strtolower($item['nama']),
                    strtolower($search)
                )
                ||
                str_contains(
                    strtolower($item['bahan']),
                    strtolower($search)
                );
            });
        }

        return view('budaya.kuliner.index', compact(
            'data',
            'search'
        ));
    }

    public function kulinerCreate()
    {
        return view('budaya.kuliner.create');
    }

    public function kulinerStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'bahan' => 'required|string',
            'deskripsi' => 'required|string',
            'keunikan' => 'required|string',
        ]);

        $data = $this->getData('kuliner');

        $validated['id'] = $this->generateId();

        $data[] = $validated;

        $this->saveData('kuliner', $data);

        return redirect()
            ->route('budaya.kuliner.index')
            ->with('success', 'Kuliner berhasil ditambahkan.');
    }

    public function kulinerShow(string $id)
    {
        $item = $this->findItem('kuliner', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.kuliner.show', compact('item'));
    }

    public function kulinerEdit(string $id)
    {
        $item = $this->findItem('kuliner', $id);

        if (!$item) {
            return $this->notFound();
        }

        return view('budaya.kuliner.edit', compact('item'));
    }

    public function kulinerUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'bahan' => 'required|string',
            'deskripsi' => 'required|string',
            'keunikan' => 'required|string',
        ]);

        $data = $this->getData('kuliner');

        foreach ($data as $key => $item) {
            if ($item['id'] === $id) {
                $validated['id'] = $id;
                $data[$key] = $validated;

                $this->saveData('kuliner', $data);

                return redirect()
                    ->route('budaya.kuliner.index')
                    ->with('success', 'Kuliner berhasil diperbarui.');
            }
        }

        return $this->notFound();
    }

    public function kulinerDestroy(string $id)
    {
        $data = $this->getData('kuliner');

        $data = array_filter($data, function ($item) use ($id) {
            return $item['id'] !== $id;
        });

        $this->saveData('kuliner', $data);

        return redirect()
            ->route('budaya.kuliner.index')
            ->with('success', 'Kuliner berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | KUIS
    |--------------------------------------------------------------------------
    */

    public function kuis()
    {
        $questions = [

            [
                'question' => "Apa arti dari kata 'Isun' dalam Bahasa Osing?",
                'options' => [
                    'Saya / Aku',
                    'Kamu',
                    'Makan',
                    'Rumah',
                ],
                'correct' => 0,
            ],

            [
                'question' => 'Nama Hari Jadi Banyuwangi (Harjaba) memperingati peristiwa sejarah apa?',
                'options' => [
                    'Perang Puputan Bayu 1771',
                    'Sumpah Pemuda',
                    'Berdirinya Desa Kemiren',
                    'Perang Diponegoro',
                ],
                'correct' => 0,
            ],

            [
                'question' => 'Apa bentuk atap rumah adat Osing tertinggi yang paling sakral?',
                'options' => [
                    'Tikel Kangmas',
                    'Crokogan',
                    'Baresan',
                    'Joglo',
                ],
                'correct' => 0,
            ],

            [
                'question' => 'Kuliner sakral Osing berbau kelapa sangrai dan ayam kampung bakar adalah...',
                'options' => [
                    'Pecel Pitik',
                    'Rujak Soto',
                    'Sego Tempong',
                    'Nasi Gandrung',
                ],
                'correct' => 0,
            ],

            [
                'question' => "Motif batik paling tua dan sakral khas Banyuwangi yang bermakna 'Eling marang Gusti' adalah...",
                'options' => [
                    'Gajah Oling',
                    'Kangkung Setingkes',
                    'Kopi Pecah',
                    'Mega Mendung',
                ],
                'correct' => 0,
            ],

        ];

        return view('budaya.kuis', compact('questions'));
    }

    public function kuisHasil(Request $request)
    {
        $questions = [
            0,
            0,
            0,
            0,
            0,
        ];

        $answers = $request->answers ?? [];

        $score = 0;

        foreach ($questions as $index => $correct) {
            if (
                isset($answers[$index])
                &&
                (int) $answers[$index] === $correct
            ) {
                $score += 20;
            }
        }

        return view('budaya.kuis-hasil', compact('score'));
    }
}
