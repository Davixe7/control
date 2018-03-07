<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Voter;

class VoterTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('voters')->delete();
    
    $user_admin = User::find(1);
    
    $votante = new Voter();
    $votante->age = 18;
    $votante->name = "Carlos";
    $votante->last_name = "Perez";
    $votante->dni = "21123456";
    $votante->dir = "Porlamar, Plaza Bolivar";
    $votante->tel = "02956968956";
    $votante->email = "carlos@gmail.com";
    $votante->voter_id = null;
    $votante->isleader = 1;
    $votante->user_id = 1;
    $votante->center_id = 1;
    $votante->table = 1;
    $votante->save();
    
    $votante_1 = new Voter();
    $votante_1->age = 18;
    $votante_1->name = "Jose";
    $votante_1->last_name = "Perez";
    $votante_1->dni = "21123456";
    $votante_1->dir = "Porlamar, Plaza Bolivar";
    $votante_1->tel = "02956968956";
    $votante_1->email = "jose@gmail.com";
    $votante_1->voter_id = 1;
    $votante_1->isleader = 0;
    $votante_1->user_id = 1;
    $votante_1->center_id = 1;
    $votante_1->table = 2;
    $votante_1->save();
    
    $votante_2 = new Voter();
    $votante_2->age = 21;
    $votante_2->name = "Luis";
    $votante_2->last_name = "Martinez";
    $votante_2->dni = "21123456";
    $votante_2->dir = "Porlamar, Plaza Bolivar";
    $votante_2->tel = "02956912356";
    $votante_2->email = "luisz@gmail.com";
    $votante_2->voter_id = 1;
    $votante_2->isleader = 0;
    $votante_2->user_id = 1;
    $votante_2->center_id = 1;
    $votante_2->table = 3;
    $votante_2->save();
    
    $votante_3 = new Voter();
    $votante_3->age = 19;
    $votante_3->name = "Maria";
    $votante_3->last_name = "Rodriguez";
    $votante_3->dni = "21123456";
    $votante_3->dir = "Porlamar, Av. 4 de Mayo";
    $votante_3->tel = "02956968956";
    $votante_3->email = "mariarodriguez@gmail.com";
    $votante_3->voter_id = 1;
    $votante_3->isleader = 0;
    $votante_3->user_id = 1;
    $votante_3->center_id = 1;
    $votante_3->table = 4;
    $votante_3->save();

    $votante_4 = new Voter();
    $votante_4->age = 18;
    $votante_4->name = "david";
    $votante_4->last_name = "Perez";
    $votante_4->dni = "21123456";
    $votante_4->dir = "Porlamar, Plaza Bolivar";
    $votante_4->tel = "02956968956";
    $votante_4->email = "david@gmail.com";
    $votante_4->voter_id = null;
    $votante_4->isleader = 1;
    $votante_4->user_id = 2;
    $votante_4->center_id = 1;
    $votante_4->table = 1;
    $votante_4->save();

    $votante_5 = new Voter();
    $votante_5->age = 18;
    $votante_5->name = "ignacio";
    $votante_5->last_name = "Perez";
    $votante_5->dni = "21123456";
    $votante_5->dir = "Porlamar, Plaza Bolivar";
    $votante_5->tel = "02956968956";
    $votante_5->email = "ignacio@gmail.com";
    $votante_5->voter_id = 2;
    $votante_5->isleader = 0;
    $votante_5->user_id = 2;
    $votante_5->center_id = 2;
    $votante_5->table = 2;
    $votante_5->save();
    
    $votante_6 = new Voter();
    $votante_6->age = 21;
    $votante_6->name = "renny";
    $votante_6->last_name = "Martinez";
    $votante_6->dni = "21123456";
    $votante_6->dir = "Porlamar, Plaza Bolivar";
    $votante_6->tel = "02956912356";
    $votante_6->email = "renny@gmail.com";
    $votante_6->voter_id = 2;
    $votante_6->isleader = 0;
    $votante_6->user_id = 2;
    $votante_6->center_id =2;
    $votante_6->table = 3;
    $votante_6->save();
    
    $votante_7 = new Voter();
    $votante_7->age = 19;
    $votante_7->name = "Maria josefina";
    $votante_7->last_name = "Rodriguez";
    $votante_7->dni = "21123456";
    $votante_7->dir = "Porlamar, Av. 4 de Mayo";
    $votante_7->tel = "02956968956";
    $votante_7->email = "mariajosefinarodriguez@gmail.com";
    $votante_7->voter_id = 2;
    $votante_7->isleader = 0;
    $votante_7->user_id = 2;
    $votante_7->center_id = 2;
    $votante_7->table = 4;
    $votante_7->save();

    $votante_8 = new Voter();
    $votante_8->age = 18;
    $votante_8->name = "Juan luis";
    $votante_8->last_name = "Perez";
    $votante_8->dni = "21123456";
    $votante_8->dir = "Porlamar, Plaza Bolivar";
    $votante_8->tel = "02956968956";
    $votante_8->email = "juanluisperez@gmail.com";
    $votante_8->voter_id = 2;
    $votante_8->isleader = 0;
    $votante_8->user_id = 4;
    $votante_8->center_id = 2;
    $votante_8->table = 1;
    $votante_8->save();

    $votante_9 = new Voter();
    $votante_9->age = 18;
    $votante_9->name = "pedro jose";
    $votante_9->last_name = "Perez";
    $votante_9->dni = "21123456";
    $votante_9->dir = "Porlamar, Plaza Bolivar";
    $votante_9->tel = "02956968956";
    $votante_9->email = "pedrojose@gmail.com";
    $votante_9->voter_id = null;
    $votante_9->isleader = 1;
    $votante_9->user_id = 4;
    $votante_9->center_id = 3;
    $votante_9->table = 2;
    $votante_9->save();
    
    $votante_10 = new Voter();
    $votante_10->age = 21;
    $votante_10->name = "vinicio";
    $votante_10->last_name = "Martinez";
    $votante_10->dni = "21123456";
    $votante_10->dir = "Porlamar, Plaza Bolivar";
    $votante_10->tel = "02956912356";
    $votante_10->email = "viniciomartinez@gmail.com";
    $votante_10->voter_id = 3;
    $votante_10->isleader = 0;
    $votante_10->user_id = 4;
    $votante_10->center_id = 3;
    $votante_10->table = 3;
    $votante_10->save();
    
    $votante_11 = new Voter();
    $votante_11->age = 19;
    $votante_11->name = "Leonoradel camen";
    $votante_11->last_name = "Rodriguez";
    $votante_11->dni = "21123456";
    $votante_11->dir = "Porlamar, Av. 4 de Mayo";
    $votante_11->tel = "02956968956";
    $votante_11->email = "Leonoradelcamenrodriguez@gmail.com";
    $votante_11->voter_id = 3;
    $votante_11->isleader = 0;
    $votante_11->user_id = 4;
    $votante_11->center_id = 3;
    $votante_11->table = 4;
    $votante_11->save();
    
    $votante_12 = new Voter();
    $votante_12->age = 18;
    $votante_12->name = "julio";
    $votante_12->last_name = "Perez";
    $votante_12->dni = "21123456";
    $votante_12->dir = "Porlamar, Plaza Bolivar";
    $votante_12->tel = "02956968956";
    $votante_12->email = "julioperez@gmail.com";
    $votante_12->voter_id = 3;
    $votante_12->isleader = 0;
    $votante_12->user_id = 4;
    $votante_12->center_id = 3;
    $votante_12->table = 1;
    $votante_12->save();
    
    $votante_13 = new Voter();
    $votante_13->age = 18;
    $votante_13->name = "Juan clemente";
    $votante_13->last_name = "Perez";
    $votante_13->dni = "21123456";
    $votante_13->dir = "Porlamar, Plaza Bolivar";
    $votante_13->tel = "02956968956";
    $votante_13->email = "juanclementeperez@gmail.com";
    $votante_13->voter_id = null;
    $votante_13->isleader = 1;
    $votante_13->user_id = 4;
    $votante_13->center_id = 4;
    $votante_13->table = 2;
    $votante_13->save();

    $votante_14= new Voter();
    $votante_14->age = 18;
    $votante_14->name = "Petronila";
    $votante_14->last_name = "Perez";
    $votante_14->dni = "21123456";
    $votante_14->dir = "Porlamar, Plaza Bolivar";
    $votante_14->tel = "02956968956";
    $votante_14->email = "petronilaperez@gmail.com";
    $votante_14->voter_id = 4;
    $votante_14->isleader = 0;
    $votante_14->user_id = 4;
    $votante_14->center_id = 4;
    $votante_14->table = 3;
    $votante_14->save();
    
    $votante_15 = new Voter();
    $votante_15->age = 21;
    $votante_15->name = "Manuel";
    $votante_15->last_name = "Martinez";
    $votante_15->dni = "21123456";
    $votante_15->dir = "Porlamar, Plaza Bolivar";
    $votante_15->tel = "02956912356";
    $votante_15->email = "manuelmartinez@gmail.com";
    $votante_15->voter_id = 4;
    $votante_15->isleader = 0;
    $votante_15->user_id = 4;
    $votante_15->center_id = 4;
    $votante_15->table = 4;
    $votante_15->save();
    
    $votante_16 = new Voter();
    $votante_16->age = 19;
    $votante_16->name = "Marlev";
    $votante_16->last_name = "Rodriguez";
    $votante_16->dni = "21123456";
    $votante_16->dir = "Porlamar, Av. 4 de Mayo";
    $votante_16->tel = "02956968956";
    $votante_16->email = "marlevrodriguez@gmail.com";
    $votante_16->voter_id = 4;
    $votante_16->isleader = 0;
    $votante_16->user_id = 4;
    $votante_16->center_id = 4;
    $votante_16->save();
  }
}