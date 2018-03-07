<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->delete();
      
      $role_admin = new Role();
      $role_admin->name = "admin";
      $role_admin->desc = "Un administrador del sistema, tiene todos los permisos";
      $role_admin->title = "Administrador";
      $role_admin->save();
      
      $leader_master = new Role();
      $leader_master->name = "leader_master";
      $leader_master->desc = "Un Lider Master registra y lleva control de un grupo de votantes, asociados a un punto de votación";
      $leader_master->title = "Lider Master";
      $leader_master->save();
      
      $role_admin = new Role();
      $role_admin->name = "table_member";
      $role_admin->desc = "Un administrador de punto de votación, se encarga de controlar entrada y salida de los votantes";
      $role_admin->title = "Miembro de Centro";
      $role_admin->save();
      
      $role_campaign = new Role();
      $role_campaign->name = "campaign";
      $role_campaign->desc = "Un usuario representante y lider de una campaña";
      $role_campaign->title = "Campaña";
      $role_campaign->save();
    }
}
