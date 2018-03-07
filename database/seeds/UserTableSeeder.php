<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Center;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      
      $role_admin = Role::where("name", "admin")->first();
      $role_leader = Role::where("name", "leader_master")->first();
      $role_member = Role::where("name", "table_member")->first();
      $role_campaign = Role::where("name", "campaign")->first();
      
      $user_admin = new User(); 
      $user_admin->name = "Carlos";
      $user_admin->last_name = "Redondo";
      $user_admin->dni = "20123456";
      $user_admin->tel = "4147912134";
      $user_admin->dir = "Urb. Villa Rosa, Bloque 11, apto. 0205";
      $user_admin->email = "admin@control.com";
      $user_admin->password = bcrypt('123456');
      $user_admin->save();
      $user_admin->roles()->attach($role_admin);
      
      // $user_member = new User();
      // $user_member->name = "Pedro";
      // $user_member->last_name = "Perez";
      // $user_member->dni = "20123456";
      // $user_member->tel = "4141234567";
      // $user_member->dir = "Urb. Villa Rosa, Bloque 11, apto. 0204";
      // $user_member->email = "pedroperez@gmail.com";
      // $user_member->password = bcrypt('123456');
      // $user_member->user_id = 1;
      // $user_member->save();
      // $user_member->roles()->attach($role_member);
      
      // $user_campaign = new User();
      // $user_campaign->name = "Campaign";
      // $user_campaign->last_name = "One";
      // $user_campaign->dni = "201234526";
      // $user_campaign->tel = "4141234567";
      // $user_campaign->dir = "Urb. Villa Rosa, Bloque 11, apto. 0204";
      // $user_campaign->email = "campaign@gmail.com";
      // $user_campaign->password = bcrypt('123456');
      // $user_campaign->user_id = 1;
      // $user_campaign->save();
      // $user_campaign->roles()->attach($role_campaign);
      
      // $user_leader = new User();
      // $user_leader->name = "Carlos";
      // $user_leader->last_name = "Figuera";
      // $user_leader->dni = "19897276";
      // $user_leader->tel = "04248486105";
      // $user_leader->dir = "Apostadero";
      // $user_leader->email = "figuerac21@gmail.com";
      // $user_leader->password = bcrypt('123456');
      // $user_leader->user_id = 3;
      // $user_leader->save();
      // $user_leader->roles()->attach($role_leader);
    }
}
