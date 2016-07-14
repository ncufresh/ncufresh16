<?php

use Illuminate\Database\Seeder;
//use DB;不需要這行

class WatchtowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $roles = [
            [
                'name'          => 'Godness',
                'slug'          => 'god',
                'description'   => '最高管理員',
                'special'       => 'all-access',
            ],

            [
                'name'          => 'Administrators',
                'slug'          => 'admin',
                'description'   => '一般管理員',
                'special'       => null,
            ],

            [
                'name'          => 'General Users',
                'slug'          => 'user',
                'description'   => '一般使用者',
                'special'       => null,
            ],

            [
                'name'          => 'Banned',
                'slug'          => 'banned',
                'description'   => '被Ban的使用者',
                'special'       => 'no-access',
            ]
        ];

        // insert roles
        DB::table('roles')->insert($roles);

        // is there a user
        $any = DB::table('users')->get();
        if ( empty($any) ) {
            DB::table('users')
                ->insert( [
                    'name' => 'admin',
                    'email' => 'q',
                    'password' => bcrypt('q')
                ]
            );
        }

        //associate first user with admin role
        DB::table('role_user')->insert( ['role_id' => 1, 'user_id'=> 1] );

         // permissions
        $permissions = [
            // 我用的權限
            [
                'name'          => '一般管理員權限唷',
                'slug'          => 'management',
                'description'   => '管理網站的內容, 新增修改刪除公告之類的'
            ],
            //

            [
                'name'          => 'Show Watchtower Dashboard',
                'slug'          => 'show.watchtower.index',
                'description'   => 'View the watchtower dashboard shortcuts page'
            ],

            [
                'name'          => 'Show user list',
                'slug'          => 'show.user.index',
                'description'   => 'Can show the user list on the index page'
            ],

            [
                'name'          => 'Create user',
                'slug'          => 'create.user',
                'description'   => 'Create a user'
            ],

            [
                'name'          => 'View user',
                'slug'          => 'show.user',
                'description'   => 'See an individual user info'
            ],

            [
                'name'          => 'Edit user',
                'slug'          => 'edit.user',
                'description'   => 'Edit an existing user'
            ],

            [
                'name'          => 'Destroy user',
                'slug'          => 'destroy.user',
                'description'   => 'Remove a user permanently'
            ],

            [
                'name'          => 'Synchronize users with roles',
                'slug'          => 'sync.user.roles',
                'description'   => 'Used for both the user matrix and user role pages.'
            ],

            [
                'name'          => 'User search',
                'slug'          => 'search.user',
                'description'   => 'Able to search users'
            ],

            [
                'name'          => 'Show role list',
                'slug'          => 'show.role.index',
                'description'   => 'Can show the role list on the index page'
            ],

            [
                'name'          => 'Create role',
                'slug'          => 'create.role',
                'description'   => 'Create a role'
            ],

            [
                'name'          => 'View role',
                'slug'          => 'show.role',
                'description'   => 'See an individual role info'
            ],

            [
                'name'          => 'Edit role',
                'slug'          => 'edit.role',
                'description'   => 'Edit an existing role'
            ],

            [
                'name'          => 'Destroy role',
                'slug'          => 'destroy.role',
                'description'   => 'Remove a role permanently'
            ],

            [
                'name'          => 'Synchronize roles with users',
                'slug'          => 'sync.role.users',
                'description'   => 'Syncs a role with multiple users.'
            ],

            [
                'name'          => 'Synchronize roles with permissions',
                'slug'          => 'sync.role.permissions',
                'description'   => 'Used for both the role matrix and role permissions pages.'
            ],

            [
                'name'          => 'role search',
                'slug'          => 'search.role',
                'description'   => 'Able to search roles'
            ],

            [
                'name'          => 'Show permission list',
                'slug'          => 'show.permission.index',
                'description'   => 'Can show the permission list on the index page'
            ],

            [
                'name'          => 'Create permission',
                'slug'          => 'create.permission',
                'description'   => 'Create a permission'
            ],

            [
                'name'          => 'View permission',
                'slug'          => 'show.permission',
                'description'   => 'See an individual permission info'
            ],

            [
                'name'          => 'Edit permission',
                'slug'          => 'edit.permission',
                'description'   => 'Edit an existing permission'
            ],

            [
                'name'          => 'Destroy permission',
                'slug'          => 'destroy.permission',
                'description'   => 'Remove a permission permanently'
            ],

            [
                'name'          => 'Synchronize permissions with roles',
                'slug'          => 'sync.permission.roles',
                'description'   => 'Syncs a permission with multiple roles.'
            ],

            [
                'name'          => 'permission search',
                'slug'          => 'search.permission',
                'description'   => 'Able to search permissions'
            ],
        ];

        //insert permissions
        DB::table('permissions')->insert($permissions);

    }
}
