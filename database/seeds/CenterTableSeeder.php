<?php

use Illuminate\Database\Seeder;
use App\Center;
use App\User;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('centers')->delete();
      $campaign = User::find(2);

      $center_one = new Center();
      $center_one->name = "Centro Villa Rosa";
      $center_one->save();
      $center_one->users()->attach(2);

      $center_two = new Center();
      $center_two->name = "Centro Apostadero";
      $center_two->save();
      $center_two->users()->attach(2);

      $center_three = new Center();
      $center_three->name = "IUPSM Genoves";
      $center_three->save();
      $center_three->users()->attach(2);

      $center_four = new Center();
      $center_four->name = "IUPSM 4 de Mayo";
      $center_four->save();
      $center_four->users()->attach(2);

      $center_five = new Center();
      $center_five->name = "UNIMAR";
      $center_five->save();
      $center_five->users()->attach(2);

      $center_six = new Center();
      $center_six->name = "UDO";
      $center_six->save();
      $center_six->users()->attach(2);

      $center_seven = new Center();
      $center_seven->name = "Galería la Francia";
      $center_seven->save();
      $center_seven->users()->attach(2);

      $center_eight = new Center();
      $center_eight->name = "CC Galerias Fente";
      $center_eight->save();
      $center_eight->users()->attach(2);

      $center_nine = new Center();
      $center_nine->name = "CC Makro";
      $center_nine->save();
      $center_nine->users()->attach(2);
    }
}
