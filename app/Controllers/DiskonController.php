<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use CodeIgniter\Controller;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        helper(['form', 'number']);
        $this->diskonModel = new DiskonModel();
    }

    public function index()
    {
        $data['diskon'] = $this->diskonModel->orderBy('tanggal', 'DESC')->findAll();
        return view('v_diskon', $data);
    }

    public function store()
    {
        // Validasi tambah diskon (tanggal unik)
        $rules = [
            'tanggal' => 'required|valid_date|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric|greater_than_equal_to[10000]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('failed', 'Gagal menambahkan diskon')
                ->with('errors', $this->validator->getErrors());
        }

        $this->diskonModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function update($id)
{
    $dataLama = $this->diskonModel->find($id);
    if (!$dataLama) {
        return redirect()->to('/diskon')->with('failed', 'Data tidak ditemukan');
    }

    $tanggalBaru = $this->request->getPost('tanggal');

    // 1. Definisikan rules validasi
    $rules = [
        'tanggal' => 'required|valid_date',
        'nominal' => 'required|numeric|greater_than_equal_to[10000]'
    ];

    // 2. Kalau tanggal diubah, tambahkan aturan is_unique
    if ($tanggalBaru !== $dataLama['tanggal']) {
        $rules['tanggal'] .= '|is_unique[diskon.tanggal]';
    }

    // 3. VALIDASI
    if (!$this->validate($rules)) {
        // Kalau gagal validasi, arahkan balik dan bawa pesan error
        return redirect()->to('/diskon')
            ->with('failed', 'Validasi gagal')
            ->with('errors', $this->validator->getErrors());
    }

    // 4. Jika valid, update ke database
    $this->diskonModel->update($id, [
        'tanggal' => $tanggalBaru,
        'nominal' => $this->request->getPost('nominal'),
    ]);

    return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui');
}



    public function delete($id)
{
    $model = new \App\Models\DiskonModel();

    if (!$model->find($id)) {
        return redirect()->to(base_url('diskon'))->with('failed', 'Data tidak ditemukan.');
    }

    $model->delete($id);

    return redirect()->to(base_url('diskon'))->with('success', 'Data berhasil dihapus.');
}


}
