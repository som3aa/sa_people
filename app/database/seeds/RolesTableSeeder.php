<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $reviewerRole = new Role;
        $reviewerRole->name = 'reviewer';
        $reviewerRole->save();

        $subscriberRole = new Role;
        $subscriberRole->name = 'subscriber';
        $subscriberRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','reviewer')->first();
        $user->attachRole( $reviewerRole );

        $user = User::where('username','=','user')->first();
        $user->attachRole( $subscriberRole );
    }

}
