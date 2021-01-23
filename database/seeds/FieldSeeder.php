<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = ['خدماتی', 'آموزشی', 'هنری', 'فرهنگی', 'درمانی', 'عمرانی', 'رسانه', 'مالی', 'پشتیبانی'
            , 'کارآفرینی'
            , 'پژوهش'
            , 'مشاوره'
            , 'روانشناسی'
            , 'تحصیلی'
            , 'فروش'
            , 'مدیریتی'
            , 'فنی'
            , 'بهداشت'
        ];
        for ($i = 0; $i < count($fields); $i++)
            DB::table('fields')->insert([
                'title' => $fields[$i]
            ]);
    }
}
