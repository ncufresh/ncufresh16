<?php

use Illuminate\Database\Seeder;
//use DB;不需要這行

class LivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $lives = [
            [
                'topic'          => '食',
                'title'          => '女14舍地下商場',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

            [
                'topic'          => '食',
                'title'          => '學生餐廳(九餐)',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

            [
                'topic'          => '食',
                'title'          => '松苑餐廳',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

             [
                'topic'          => '食',
                'title'          => '松果餐廳',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

             [
                'topic'          => '食',
                'title'          => '小木屋鬆餅',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],


             [
                'topic'          => '食',
                'title'          => '後門',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

            [
                'topic'          => '住',
                'title'          => '女一舍',
                'content'        => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

            [
                'topic'           => '住',
                'title'          => '女四舍',
                'content'         => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],
             [
                'topic'           => '住',
                'title'          => '男三舍',
                'content'         => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],
            [
                'topic'           => '住',
                'title'          => '男七舍',
                'content'         => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],
             [
                'topic'           => '住',
                'title'          => '男九舍',
                'content'         => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],
            [
                'topic'           => '住',
                'title'          => '男十一舍',
                'content'         => 'waiting to fill',
                'image'          =>'./img/life/detail/food/1.png',
            ],

        ];

        // insert roles
        DB::table('lives')->insert($lives);

    }
}
