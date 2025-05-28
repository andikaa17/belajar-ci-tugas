<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Laptop Gaming',
                'deskripsi'     => 'Laptop dengan spesifikasi tinggi untuk bermain game berat dengan lancar.',
                'created_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Laptop Harian',
                'deskripsi'     => 'Cocok digunakan untuk kebutuhan sehari-hari seperti belajar, bekerja, dan hiburan.',
                'created_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Laptop Pelajar',
                'deskripsi'     => 'Laptop ringan dan praktis, cocok untuk pelajar dan mahasiswa.',
                'created_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Laptop Bisnis',
                'deskripsi'     => 'Dirancang untuk kebutuhan kerja dengan daya tahan baterai dan keamanan ekstra.',
                'created_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Laptop Ekonomis',
                'deskripsi'     => 'Laptop dengan harga terjangkau, cocok untuk pengguna dengan kebutuhan dasar.',
                'created_at'    => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('product_category')->insert($item);
        }
    }
}
