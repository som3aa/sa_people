<?php

class StoriesTableSeeder extends Seeder {

    protected $content = 'الطيب صالح - أو "عبقري الرواية العربية" كما جرى بعض النقاد على تسميته- أديب عربي من السودان، اسمه الكامل الطيب محمد صالح أحمد. ولد عام  في إقليم   شمالي السودان بقرية كَرْمَكوْل بالقرب من قرية دبة الفقراء وهي إحدى قرى قبيلة الركابية التي ينتسب إليها، وتوفي في أحدي مستشفيات العاصمة البريطانية التي أقام فيها في ليلة الأربعاء 18 شباط/فبراير 2009 الموافق عاش مطلع حياته وطفولته في ذلك الإقليم، وفي شبابه انتقل إلى  لإكمال دراسته فحصل من جامعتها على درجة البكالوريوس في العلوم. سافر إلى إنجلترا حيث واصل دراسته، وغيّر تخصصه إلى دراسة الشؤون الدولية السياسية.

تنقل الطيب صالح بين عدة مواقع مهنية فعدا عن خبرة قصيرة في إدارة مدرسة، عمل ----الطيب صالح لسنوات طويلة من حياته في القسم العربي لهيئة الإذاعة البريطانية, وترقى بها حتى وصل إلى منصب مدير قسم الدراما, وبعد استقالته من البي بي سي عاد إلى السودان وعمل لفترة في الإذاعة السودانية, ثم هاجر إلى دولة قطر وعمل في وزارة إعلامها وكيلاً ومشرفاً على أجهزتها. عمل بعد ذلك مديراً إقليمياً بمنظمة اليونيسكو في باريس, وعمل ممثلاً لهذه المنظمة في الخليج العربي. ويمكن القول أن حالة الترحال والتنقل بين الشرق والغرب والشمال والجنوب أكسبته خبرة واسعة بأحوال الحياة والعالم وأهم من ذلك أحوال أمته وقضاياها وهو ما وظفه في كتاباته وأعماله الروائية وخاصة روايته العالمية موسم الهجرة إلى الشمال.';

    public function run()
    {
        DB::table('stories')->delete();

        $user_id = 1;
        $category_id = 1;

        DB::table('stories')->insert( array(
            array(
                'user_id'        => $user_id,
                'category_id'    => $category_id,
                'title'      => 'بلقيس محمد الحسن عثمان',
                'slug'       => 'بلقيس-محمد-الحسن-عثمان',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/400x400',
                'status'    => 1,
                'meta_title' => 'meta_title1',
                'meta_description' => 'meta_description1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => $user_id,
                'category_id'    => $category_id +1,
                'title'      => 'الطيب صالح',
                'slug'       => 'الطيب-صالح',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/400x400',
                'status'    => 1,
                'meta_title' => 'meta_title2',
                'meta_description' => 'meta_description2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => $user_id +1,
                'category_id'    => $category_id,
                'title'      => 'محمد عادل عبد الله',
                'slug'       => 'محمد-عادل-عبد-الله',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/600x600',
                'status'    => 0,
                'meta_title' => 'meta_title3',
                'meta_description' => 'meta_description3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
