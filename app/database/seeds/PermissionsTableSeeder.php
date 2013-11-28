<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();


        $permissions = array(
            array(
                'name'      => 'manage_stories',
                'display_name'      => 'manage stories'
            ),
            array(
                'name'      => 'manage_categories',
                'display_name'      => 'manage categories'
            ),
            array(
                'name'      => 'manage_comments',
                'display_name'      => 'manage comments'
            ),
            array(
                'name'      => 'manage_users',
                'display_name'      => 'manage users'
            ),
            array(
                'name'      => 'manage_roles',
                'display_name'      => 'manage roles'
            ),
            array(
                'name'      => 'post_comment',
                'display_name'      => 'post comment'
            ),
            array(
                'name'      => 'manage_his_profile',
                'display_name'      => 'edit his profile'
            ),
            array(
                'name'      => 'manage_hist_stories',
                'display_name'      => 'create edit delete own stories'
            ),
            array(
                'name'      => 'manage_his_user',
                'display_name'      => 'edit his user info'
            ),
            array(
                'name'      => 'manage_profiles',
                'display_name'      => 'manage profiles'
            )
        );

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();

        $permissions = array(
            array(
                'role_id'      => 1,
                'permission_id' => 1
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 2
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 3
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 4
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 5
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 6
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 7
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 8
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 9
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 1
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 3
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 6
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 7
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 8
            ),
            array(
                'role_id'      => 2,
                'permission_id' => 9
            ),
            array(
                'role_id'      => 3,
                'permission_id' => 6
            ),
            array(
                'role_id'      => 3,
                'permission_id' => 7
            ),
            array(
                'role_id'      => 3,
                'permission_id' => 8
            ),
            array(
                'role_id'      => 3,
                'permission_id' => 9
            ),
            array(
                'role_id'      => 1,
                'permission_id' => 10
            )
        );

        DB::table('permission_role')->insert( $permissions );
    }

}
