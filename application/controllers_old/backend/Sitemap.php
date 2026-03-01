<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url_helper', 'seo_helper']);
        
        $this->load->model(['Product_model', 'Category_model']);
    }

    public function index()
    {
        // Atur header agar format XML
        header("Content-Type: text/xml; charset=UTF-8");

        $data['sort_field'] = 'products.id';
        $get_products = $this->Product_model->get_products(null, null, $data);

        $get_categories = $this->Category_model->get_categories(['level' => 1]);

        $sitemaps = $this->defaultSitemap();

        foreach($get_products ?? [] as $product) {
            $sitemaps[] = [
                'slug' => $product->slug,
                'updated_at' => $product->updated_at,
            ];
        }

        foreach($get_categories ?? [] as $category) {
            $sitemaps[] = [
                'slug' => $category->slug,
                'updated_at' => $category->updated_at,
            ];
        }

        
        $data['sitemaps'] = $sitemaps;
        $this->load->view('backend/sitemap', $data);
    }

    public function robots()
    {
        header("Content-Type: text/plain");

        echo "User-agent: *\n";
        echo "Disallow: /backend/\n";
        echo "Disallow: /cache/\n";
        echo "Disallow: /application/\n";
        echo "Disallow: /system/\n";
        echo "Disallow: /index.php\n";
        echo "Disallow: /*?current_page=*\n";
        echo "Disallow: /*?sort_field=*\n";
        
        # Tidak perlu "Allow: /" karena defaultnya semua boleh dirayapi
        echo "\n";
        
        echo "Sitemap: " . base_url('sitemap.xml') . "\n";
    }

    private function defaultSitemap()
    {
        return [
            [
                'slug' => 'tentang-kami',
                'updated_at' => '2025-02-18 08:00:00'
            ],
            [
                'slug' => 'hubungi-kami',
                'updated_at' => '2025-02-18 08:00:00'
            ],
            [
                'slug' => 'syarat-dan-ketentuan',
                'updated_at' => '2025-02-18 08:00:00'
            ],
            [
                'slug' => 'kebijakan-privasi',
                'updated_at' => '2025-02-18 08:00:00'
            ],
            [
                'slug' => 'disclaimer',
                'updated_at' => '2025-02-18 08:00:00'
            ],
            [
                'slug' => 'kebijakan-pengembalian',
                'updated_at' => '2025-02-24 08:00:00'
            ]
        ];
    }
}