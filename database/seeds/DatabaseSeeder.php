<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      DB::table("users")->insert([
        'user_type' => 0,
        'first_name' => 'admin',
        'last_name' => 'admin',
        'email_address' => 'admin@admin.com',
        'phone_number' => '0123456789',
        'password' => bcrypt('password'),
        'updated_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ]);
      DB::table("users")->insert([
        'first_name' => 'group5',
        'last_name' => 'group5',
        'email_address' => 'group5@group5.com',
        'phone_number' => '0123456789',
        'password' => bcrypt('password'),
        'updated_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ]);
//##############USERS###############
      foreach (range(1,50) as $index1)
      {
        DB::table("users")->insert([
          'first_name' => $faker->firstName,
          'last_name' => $faker->lastName,
          'email_address' => $faker->firstName.rand(1,1000).'@gmail.com',
          'phone_number' => '0123456789',
          'password' => bcrypt('password'),
          'updated_at' => date("Y-m-d H:i:s"),
          'created_at' => date("Y-m-d H:i:s")
        ]);
      }

//##############Products###############
      $prods = array('Tiger Roll','Philadelphia Roll','Crunch Roll','Rainbow Roll',
                    'Dragon Roll','California Roll', 'Spider Roll','Tempura Roll',
                    'Volcano Roll', 'Kani', 'Ikura', 'Tako', 'Unagi', 'Ika', 'Maguro',
                    'Saba', 'Tai', 'Hokigai', 'Anago', 'Amaebi', 'Uni', 'Chocolate Milk',
                    'Milk', 'Ginger Ale', 'Root Beer', 'Pepsi', 'Cola', 'Tea',
                    'Water', 'Ice Tea');

      foreach (range(0,29) as $index4)
      {
        if ($index4 <= 20)
        {
          DB::table("products")->insert([
            'product_name' => $prods[$index4],
            'category' => 0,
            'product_description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'price' => sprintf("%01.2f", (mt_rand(100,999)/100))
            ]);
        }
        else
        {
          DB::table("products")->insert([
            'product_name' => $prods[$index4],
            'category' => 1,
            'product_description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'price' => sprintf("%01.2f", (mt_rand(100,999)/100))
            ]);
        }
      }


//##############favourites###############
      foreach (range(1,200) as $index2)
      {
        $uid = 0;
        $pid = 0;
        do {
          $uid = DB::table('users')->inRandomOrder()->first()->user_id;
          $pid = DB::table('products')->inRandomOrder()->first()->product_id;
        } while (DB::table('favourites')->where([['user_id', $uid],['product_id', $pid]])->exists());
        DB::table("favourites")->insert([
          'user_id' => $uid,
          'product_id' => $pid
        ]);
      }

//##############Inventory###############
      $ings = array('aka-gai','anago','awabi','seaweed wrap','fugu','salt',
                    'pepper','rice', 'himono', 'cola', 'pepsi', 'water', 'ice tea',
                    'ika', 'maguro', 'saba', 'tai', 'sanma', 'tako', 'soya sauce',
                    'uni', 'daikon', 'gobo', 'kabocha', 'kabu', 'mitsuba', 'mizuna',
                    'nappa', 'myoga', 'negi');
      $measures = array(1 => 'tsp', 2 => 'tbsp', 3 => 'ml', 4 => 'L', 5 => 'lb.', 6 => 'g', 7 => 'kg', 8 => 'units');
      foreach (range(0,29) as $index3)
      {
        DB::table("inventory")->insert([
          'ing_name' => $ings[$index3],
          'quantity' => rand(1, 400),
          'units' => rand(1,8)
        ]);
      }

//##############Vendors###############
      foreach (range(1,50) as $index5)
      {
        DB::table("vendors")->insert([
          'vendor_name' => $faker->company,
          'phone_number' => '0123456789',
        ]);
      }

//############## ORDERS ###############
      $uid = 0;
      foreach (range(1,50) as $index6)
      {
        $uid = DB::table('users')->inRandomOrder()->first()->user_id;
        DB::table("orders")->insert([
          'user_id' => $uid,
          'datetime_ordered' => date("Y-m-d H:i:s")
        ]);
      }

//##############Order Products###############
      $pid = 0;
      $oid = 0;
      foreach (range(1,200) as $index7)
      {
        $oid = DB::table('orders')->inRandomOrder()->first()->order_id;
        $pid = DB::table('products')->inRandomOrder()->first()->product_id;
        DB::table("order_products")->insert([
          'order_id' => $oid,
          'product_id' => $pid,
          'quantity' => rand(1,8)
        ]);
      }

//##############Product Ingredients###############
      $pid = 0;
      $ingid = 0;
      foreach (range(1,300) as $index8)
      {
        $pid = DB::table('products')->inRandomOrder()->first()->product_id;
        $ingid = DB::table('inventory')->inRandomOrder()->first()->ing_id;
        DB::table("product_ingredients")->insert([
          'product_id' => $pid,
          'ing_id' => $ingid,
          'quantity' => (mt_rand(1,999)/100),
          'units' => rand(1,8)
        ]);
      }

//##############Vendor Order History###############

      $pid = 0;
      $ingid = 0;
      $vid = 0;
      foreach (range(1,30) as $index9)
      {
        $decider = rand(0,10000);
        if ($decider > 4553)
        {
          $vid = DB::table('vendors')->inRandomOrder()->first()->vendor_id;
          $ingid = DB::table('inventory')->inRandomOrder()->first()->ing_id;
          DB::table("vendor_order_history")->insert([
            'vendor_id' => $vid,
            'ing_id' => $ingid,
            'quantity' => (mt_rand(1,999)/100),
            'units' => rand(1,8),
            'cost' => (mt_rand(1000,10000)/100),
            'date_ordered' => date("Y-m-d H:i:s")
          ]);
        }
        else
        {
          $vid = DB::table('vendors')->inRandomOrder()->first()->vendor_id;
          $pid = DB::table('products')->inRandomOrder()->first()->product_id;
          DB::table("vendor_order_history")->insert([
            'vendor_id' => $vid,
            'product_id' => $pid,
            'quantity' => (mt_rand(1,999)/100),
            'units' => rand(1,8),
            'cost' => (mt_rand(1000,10000)/100),
            'date_ordered' => date("Y-m-d H:i:s")
          ]);
        }
      }

    }
}
