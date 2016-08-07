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
            'question' => "請問中央大學大一新生哪個學院的學生必須修大一微積分?",
            'selection_1' => "管理學院",
            'selection_2'=>"文學院",
            'answer'=>"1",
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
            'question' => "操場跑道的顏色為何?",
            'selection_1' => "紅色",
            'selection_2'=>"藍色",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "女生宿舍最貴的為哪棟?",
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
            'question' => "男九前面的噴水池是叫鯉魚池嗎?",
            'selection_1' => "是",
            'selection_2'=>"不是",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "K書中心在哪?",
            'selection_1' => "舊圖",
            'selection_2'=>"國鼎大樓",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "非游泳課時間去游泳要付?",
            'selection_1' => "40",
            'selection_2'=>"30",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校主要的校風為?",
            'selection_1' => "純樸",
            'selection_2'=>"積極",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校有醫學院嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "本校隸屬哪個系統?",
            'selection_1' => "台聯大",
            'selection_2'=>"台大聯盟",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "搭台聯大的專車去清大要錢嗎?",
            'selection_1' => "不要",
            'selection_2'=>"要",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "搭台聯大的專車去交大要錢嗎?",
            'selection_1' => "要",
            'selection_2'=>"不要",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "搭台聯大的專車去陽明要錢嗎?",
            'selection_1' => "不要",
            'selection_2'=>"要",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中大在復校前所在位置為?",
            'selection_1' => "南京",
            'selection_2'=>"山東",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "凌晨3點有開的早餐店為?",
            'selection_1' => "萊姆思",
            'selection_2'=>"惟客",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校內有7-11嗎?",
            'selection_1' => "沒有",
            'selection_2'=>"有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學郵局在?",
            'selection_1' => "男9旁",
            'selection_2'=>"女14旁",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "想買二手教科書可到?",
            'selection_1' => "敦煌書局",
            'selection_2'=>"全家超商",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校哪買的到床墊?",
            'selection_1' => "全家超商",
            'selection_2'=>"581生活館",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "選課要上哪個網站?",
            'selection_1' => "portal",
            'selection_2'=>"lms",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校約有幾個姊妹校?",
            'selection_1' => "70",
            'selection_2'=>"170",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "一張冷氣卡裡面有多少錢?",
            'selection_1' => "500",
            'selection_2'=>"250",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校哪裏有ubike?",
            'selection_1' => "觀景台旁",
            'selection_2'=>"總圖書館前",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "Ubike前幾分鐘不用錢?",
            'selection_1' => "30",
            'selection_2'=>"60",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "我們可持中大圖書證到清大借書嗎?",
            'selection_1' => "不可",
            'selection_2'=>"可",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "我們可持中大圖書證到交大借書嗎?",
            'selection_1' => "可",
            'selection_2'=>"不可",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "我們可持中大圖書證到陽明借書嗎?",
            'selection_1' => "不可",
            'selection_2'=>"可",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "圖書館平日幾點開館?",
            'selection_1' => "8am",
            'selection_2'=>"9am",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "圖書館書最多可以借幾本?",
            'selection_1' => "5",
            'selection_2'=>"20",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校內工讀哪個網站可以找到?",
            'selection_1' => "portal",
            'selection_2'=>"lms",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "通識課程在畢業前應修滿幾學分?",
            'selection_1' => "18",
            'selection_2'=>"14",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('question_collection')->insert([
            'question' => "全校有幾個學系?",
            'selection_1' => "22",
            'selection_2'=>"33",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學生專用信箱web mail是由哪個單位負責管理的？",
            'selection_1' => "圖書館",
            'selection_2'=>"電子計算中心",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學語言中心位在哪一棟大樓？",
            'selection_1' => "綜教館",
            'selection_2'=>"志希館",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學宿舍網路上傳量上限為?",
            'selection_1' => "隨便",
            'selection_2'=>"3GB",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "如果腳踏車壞了要去哪修?",
            'selection_1' => "後門腳踏車店",
            'selection_2'=>"找警衛伯伯",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學的英文縮寫為?",
            'selection_1' => "HGSH",
            'selection_2'=>"NCU",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "郵局平日營業時間為?",
            'selection_1' => "8:00~17:00",
            'selection_2'=>"9:30~18:00",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若有人寄信給你,你該到行政大樓的哪領?",
            'selection_1' => "出納組",
            'selection_2'=>"文書組",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若想網購,後門的7-11叫甚麼門市?",
            'selection_1' => "學央門市",
            'selection_2'=>"學店門市",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "國鼎圖書館是為了紀念哪位校友?",
            'selection_1' => "吳健雄",
            'selection_2'=>"李國鼎",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學的校樹為?",
            'selection_1' => "松",
            'selection_2'=>"竹",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "下列哪個偶像劇有在中央取景?",
            'selection_1' => "1989一念間",
            'selection_2'=>"我的自由年代",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校內沒有何種運動場地?",
            'selection_1' => "保齡球館",
            'selection_2'=>"重訓室",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "下列何者為中央大學的體育館名字?",
            'selection_1' => "據德樓",
            'selection_2'=>"依仁堂",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "校內有個著名的劇場叫?",
            'selection_1' => "黑盒子",
            'selection_2'=>"名劇場",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若遇到人生低潮該去哪尋求協助?",
            'selection_1' => "校長室",
            'selection_2'=>"諮商中心",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "排球場在哪?",
            'selection_1' => "依仁堂旁",
            'selection_2'=>"中大湖旁",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "你現在念哪所大學?",
            'selection_1' => "中山",
            'selection_2'=>"中央",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央的垃圾場在?",
            'selection_1' => "男9後面",
            'selection_2'=>"中大湖後面",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學除了哪一天以外都有垃圾車時間?",
            'selection_1' => "六",
            'selection_2'=>"日",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "凌晨想吃消夜可到哪吃?",
            'selection_1' => "宵夜街",
            'selection_2'=>"後門",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央最新成立的學院為?",
            'selection_1' => "理學院",
            'selection_2'=>"生醫理工學院",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學專屬的電台為?",
            'selection_1' => "小中大電視台",
            'selection_2'=>"大中大電視台",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央學生自己專屬的學校信箱結尾為何?",
            'selection_1' =>"@cc.ntu.edu.tw",
            'selection_2'=>"@cc.ncu.edu.tw",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "期中期末考時k書中心會開24小時嗎?",
            'selection_1' => "會",
            'selection_2'=>"不會",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "請問105學年度，中央大學的FB社團名稱為何?",
            'selection_1' => "中大自由年代",
            'selection_2'=>"2016 嶄．望 中央大學",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央甚麼樹最多?",
            'selection_1' => "松樹",
            'selection_2'=>"榕樹",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央目前有幾個學院?",
            'selection_1' => "10",
            'selection_2'=>"8",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "請問中央大學的校色為什麼顏色?",
            'selection_1' => "紫金",
            'selection_2'=>"紅綠",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學內有幾家全家?",
            'selection_1' => "5",
            'selection_2'=>"3",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央大學內最高建築為哪棟?",
            'selection_1' => "女14",
            'selection_2'=>"客家學院",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學內的新圖書館(總圖書館)地上總共有幾層樓?",
            'selection_1' => "9",
            'selection_2'=>"8",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "你即將進入的國立中央大學於今年滿幾週年呢?",
            'selection_1' => "101",
            'selection_2'=>"99",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校內的腳踏車打氣站分別位於何處?",
            'selection_1' => "小木屋旁",
            'selection_2'=>"正門警衛室",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "學生機車騎入校園之入校時間限制為?",
            'selection_1' => "8:00~21:00",
            'selection_2'=>"12:00~18:00",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "宿舍網路啟動碼價錢要花多少錢?",
            'selection_1' => "1500",
            'selection_2'=>"800",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "請問中央大學道路的最高限速是多少公里?",
            'selection_1' => "25",
            'selection_2'=>"5",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "宿舍網路卡需要到行政大樓中的哪個處室買?",
            'selection_1' => "文書組",
            'selection_2'=>"出納組",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "哪個宿舍有桌球室?",
            'selection_1' => "男9",
            'selection_2'=>"女2",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若要申請寒假宿舍要到哪申請?",
            'selection_1' => "系辦",
            'selection_2'=>"宿舍服務中心",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央大學的校樹為?",
            'selection_1' => "松",
            'selection_2'=>"竹",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "哪間宿舍地下室有餐廳、581商店、全家、影印店等等?",
            'selection_1' => "女1",
            'selection_2'=>"女14",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "知名作家吳明益畢業於中央哪個科系?",
            'selection_1' => "中文系",
            'selection_2'=>"地科系",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "校歌中 ”宏我黌舍兮”的”黌”字讀做?",
            'selection_1' => "ㄩˋ",
            'selection_2'=>"ㄏㄨㄥˊ",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央大學有北友會嗎?",
            'selection_1' => "沒有",
            'selection_2'=>"有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "如果不會用宿網可以去哪個網站查詢?",
            'selection_1' => "lms",
            'selection_2'=>"中央電子計算中心",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央哪個網站有提供Microsoft Office的下載服務?",
            'selection_1' => "中央電子計算中心",
            'selection_2'=>"portal",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央哪個網站有提供防毒軟體的下載服務?",
            'selection_1' => "portal",
            'selection_2'=>"中央電子計算中心",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "科學四館又名甚麼?",
            'selection_1' => "健雄館",
            'selection_2'=>"國鼎大樓",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "健雄館是為了紀念誰?",
            'selection_1' => "宋健雄",
            'selection_2'=>"吳健雄",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "位於阿里山海拔2862m的鹿林天文台由本校哪個所所管理?",
            'selection_1' => "天文所",
            'selection_2'=>"地質所",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校哪裡有天文台?",
            'selection_1' => "理學院",
            'selection_2'=>"科學四館",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    
        DB::table('question_collection')->insert([
            'question' => "小木屋鬆餅有賣飲料嗎?",
            'selection_1' => "沒有",
            'selection_2'=>"有",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "阿諾可麗餅有賣黑糖糕嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "女14樓下的全家有自動提款機嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "阿諾可麗餅有賣義大利麵嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "阿諾可麗餅賣鬆餅嗎?/",
            'selection_1' => "賣",
            'selection_2'=>"不賣",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "Fb有個社團可以提供中央的學生買賣不要的東西,該社團叫?",
            'selection_1' => "中央復活福利社",
            'selection_2'=>"中央省錢站",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央交流選課資訊的fb社團叫?",
            'selection_1' => "中大選課讚讚讚",
            'selection_2'=>"中大選課~Ctrl+F很EAZY!!!",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央有設英文畢業門檻嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央有設中文畢業門檻嗎?",
            'selection_1' => "有",
            'selection_2'=>"沒有",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "中央有設數學畢業門檻嗎?",
            'selection_1' => "沒有",
            'selection_2'=>"有",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "每個學院的畢業英文畢業門檻相同嗎?",
            'selection_1' => "相同",
            'selection_2'=>"不同",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "學校後門那間很優的咖啡甜點店叫?",
            'selection_1' => "Backdoor Café",
            'selection_2'=>"Sidewalk",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "夏天時走百花川時有什麼會從樹上掉下來?",
            'selection_1' => "錢",
            'selection_2'=>"毛毛蟲",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央大學的校樹為?",
            'selection_1' => "松",
            'selection_2'=>"竹",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "大一週會要去哪聽?",
            'selection_1' => "鴻經管",
            'selection_2'=>"大講堂",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "大一學生必須聽幾次大一週會?",
            'selection_1' => "4次",
            'selection_2'=>"3次",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "大一學生必須聽幾次各院週會?",
            'selection_1' => "3次",
            'selection_2'=>"2次",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "大一週會要去哪個網站報名?",
            'selection_1' => "服務學習網",
            'selection_2'=>"生活職涯網",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "學校最多的超商是哪家?",
            'selection_1' => "7-11",
            'selection_2'=>"全家",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "學校的運動會為期幾天?",
            'selection_1' => "2天",
            'selection_2'=>"1天",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "若受傷了該去哪處理?",
            'selection_1' => "生活服務組",
            'selection_2'=>"衛生保健組",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
                DB::table('question_collection')->insert([
            'question' => "職涯發展中心位在舊圖幾樓?",
            'selection_1' => "2樓",
            'selection_2'=>"3樓",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "K書中心位在舊圖幾樓?",
            'selection_1' => "3樓",
            'selection_2'=>"2樓",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "宿舍中使用一次洗衣機須投多少錢?",
            'selection_1' => "10元",
            'selection_2'=>"20元",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "宿舍中使用烘衣機最少須投多少錢?",
            'selection_1' => "20元",
            'selection_2'=>"10元",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "宿舍中使用脫水機需投多少錢?",
            'selection_1' => "免錢",
            'selection_2'=>"10元",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "如果想要出國交換可以到哪詢問?",
            'selection_1' => "職涯發展中心",
            'selection_2'=>"國際事務處",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央2006發現的小行星於2016通過審查命名為?",
            'selection_1' => "屏東",
            'selection_2'=>"中央",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "遊藝館的由來出自於下列哪句話?",
            'selection_1' => "不遠遊。遊必有藝",
            'selection_2'=>"依於仁，遊於藝",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "中央被二一幾次就會被退學?",
            'selection_1' => "3次",
            'selection_2'=>"2次",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "平行常在校內可以騎機車嗎?",
            'selection_1' => "不",
            'selection_2'=>"可以",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('question_collection')->insert([
            'question' => "校內公用腳踏車可以騎出校外嗎?",
            'selection_1' => "不行",
            'selection_2'=>"可以",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('question_collection')->insert([
            'question' => "好兇蛋餅晚上幾點開?",
            'selection_1' => "10pm",
            'selection_2'=>"7pm",
            'answer'=>"1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('question_collection')->insert([
            'question' => "你喜歡這個網站嗎?喜歡/不喜歡",
            'selection_1' => "不喜歡",
            'selection_2'=>"喜歡",
            'answer'=>"2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
