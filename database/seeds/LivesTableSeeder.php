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
            ],

            [
                'topic'          => '食',
                'title'          => '松苑餐廳',
                'content'        => 'waiting to fill',
            ],

            [
                'topic'          => '住',
                'title'          => '女一舍',
                'content'        => 'waiting to fill',
            ],

            [
                'topic'           => '住',
                'title'          => '女四舍',
                'content'         => '宿舍名女1舍所屬區域西區傳達室(女1-4舍入口處)
                                    費用
                                    5060元/學期
                                    值勤電話
                                    分機66851、
                                    24H專線：0919019964
                                    寢室設備
                                    書桌、衣櫃、床組、檯燈、插座、網路孔、椅子、
                                    冷氣機、寢室轉扇
                                    宿舍特色
                                    雅房、4人房、上舖床位、
                                    0時~6時熄大燈、24小時刷卡門禁
                                    床組尺寸
                                    長    176 cm    寬    85 cm    床板高度    18 cm  
                                    (愛心寢室)

                                    長    185 cm    寬    95 cm    床板高度    30 cm  

                                    書桌尺寸

                                    長    117 cm   寬    60 cm    到地面高度    68 cm   

                                    衣櫃尺寸

                                    長    60 cm   深度    58 cm   高度    144 cm   ',
            ]
        ];

        // insert roles
        DB::table('lives')->insert($lives);

    }
}
