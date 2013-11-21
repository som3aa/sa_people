<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $subscriberRole = new Role;
        $subscriberRole->name = 'subscriber';
        $subscriberRole->save();

        $user = User::where('username','=','mr2all')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','user')->first();
        $user->attachRole( $subscriberRole );
    }

}
