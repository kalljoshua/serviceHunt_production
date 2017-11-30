<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      $packages = [
          ['title'=>'free','price'=>0.00,'days'=>3,'featured_listings'=>3,'properties'=>10],
          ['title'=>'basic','price'=>29.99,'days'=>3,'featured_listings'=>3,'properties'=>10],
          ['title'=>'standard','price'=>49.99,'days'=>3,'featured_listings'=>3,'properties'=>10],
          ['title'=>'premium','price'=>79.99,'days'=>3,'featured_listings'=>3,'properties'=>10]
      ];

      for($i=0;$i<4;$i++){
          DB::table('packages')->insert([
              'title' => $packages[$i]['title'],
              'price' => $packages[$i]['price'],
              'days' => $packages[$i]['days'],
              'featured_listings' => $packages[$i]['featured_listings'],
              'properties' => $packages[$i]['properties'],
              'slider' => 0,
              'feature' => 0,
              'recommended' =>0,
              'best_value' => 0,
              'partner' => 0,
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
          ]);
      }

  }
}
