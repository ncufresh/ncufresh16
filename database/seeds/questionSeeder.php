<?php

use Illuminate\Database\Seeder;

class questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_collection')->insert([
            'question' => "中央大學位在哪個縣市?",
            'selection_1' => "桃園市",
            'selection_2'=>"竹北市",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('question_collection')->insert([
            'question' => "中央大學的簡稱為?",
            'selection_1' => "中學",
            'selection_2'=>"中大",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "何者並非松苑內所出現的餐廳?",
            'selection_1' => "摩斯漢堡",
            'selection_2'=>"頂呱呱",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('question_collection')->insert([
            'question' => "校內有哪間超商，讓學生能方便購物?",
            'selection_1' => "家後",
            'selection_2'=>"全家",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "阿忠喜歡打桌球，請問校內哪些地方設有桌球室?",
            'selection_1' => "男研舍1樓",
            'selection_2'=>"依仁堂二樓",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('question_collection')->insert([
            'question' => "中央大學的宿舍網路有何限制?",
            'selection_1' => "上傳最大量3G",
            'selection_2'=>"下載最大量3G",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "何者並非松苑內所出現的餐廳?",
            'selection_1' => "摩斯漢堡",
            'selection_2'=>"頂呱呱",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "請問中央大學大一新生哪個學院的學生必須修大一微積分?",
            'selection_1' => "小松鼠電台",
            'selection_2'=>"松濤電台",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "請問中央大學大一新生哪個學院的學生必須修大一微積分?",
            'selection_1' => "管理學院",
            'selection_2'=>"文學院",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "下列哪一科為校訂大一共同必修?",
            'selection_1' => "愛情",
            'selection_2'=>"選修國文",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學位在哪個縣市?",
            'selection_1' => "桃園市",
            'selection_2'=>"竹北市",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "如果想要搭公車到市區應搭幾號?",
            'selection_1' => "132",
            'selection_2'=>"1920",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "現任校長的名子?",
            'selection_1' => "蔣偉寧",
            'selection_2'=>"周景揚",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "冷氣卡應到哪得全家買?",
            'selection_1' => "松苑的",
            'selection_2'=>"男九的",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "公用腳踏車叫甚麼?",
            'selection_1' => "小白",
            'selection_2'=>"小綠",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "132公車單程票價(學生票)為何?",
            'selection_1' => "15",
            'selection_2'=>"18",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "松果餐廳在男幾下面?",
            'selection_1' => "男7",
            'selection_2'=>"男9",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "藝文中心在哪?",
            'selection_1' => "舊圖",
            'selection_2'=>"遊藝館",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "到管院的路上有一條路叫甚麼川?",
            'selection_1' => "百花川",
            'selection_2'=>"長谷川",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "冷氣卡應到哪得全家買?",
            'selection_1' => "松苑的",
            'selection_2'=>"男九的",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中大景點不包括何者? 	 	",
            'selection_1' => "大中天",
            'selection_2'=>"中大湖",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校內有哪間超商，讓學生能方便購物?",
            'selection_1' => "家後",
            'selection_2'=>"全家",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


        DB::table('question_collection')->insert([
            'question' => "大一必修體育佔幾學分?",
            'selection_1' => "0",
            'selection_2'=>"2",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "請問中央大學沒有開設哪一堂語文課？",
            'selection_1' => "俄文",
            'selection_2'=>"西班牙文",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學哪一項運動沒有設置室內場館？",
            'selection_1' => "排球",
            'selection_2'=>"網球",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學的專業實驗劇場-黑盒子，隸屬於哪個單位？",
            'selection_1' => "文學院",
            'selection_2'=>"資電學院",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若持中大相關證件到中央校內的小木屋鬆餅點餐，一項可折抵幾元？",
            'selection_1' => "10",
            'selection_2'=>"5",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "操場跑道的顏色為何?",
            'selection_1' => "紅色",
            'selection_2'=>"藍色",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "19.	女生宿舍最貴的為哪棟?",
            'selection_1' => "女14",
            'selection_2'=>"女4",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學的地址?",
            'selection_1' => "中大路",
            'selection_2'=>"中央路",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "幾號公車可以直達桃園高鐵站?",
            'selection_1' => "133",
            'selection_2'=>"172",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "小木屋後面是甚麼學院?",
            'selection_1' => "文學院",
            'selection_2'=>"管學院",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校有雕塑大師朱銘的作品嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "何者並非松苑內所出現的餐廳?",
            'selection_1' => "摩斯漢堡",
            'selection_2'=>"頂呱呱",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "何者並非松苑內所出現的餐廳?",
            'selection_1' => "摩斯漢堡",
            'selection_2'=>"頂呱呱",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "何者並非松苑內所出現的餐廳?",
            'selection_1' => "摩斯漢堡",
            'selection_2'=>"頂呱呱",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }
}
