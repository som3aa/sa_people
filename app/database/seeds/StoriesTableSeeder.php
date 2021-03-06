<?php

class StoriesTableSeeder extends Seeder {

    protected $content = '<p>الدكتورة بلقيس محمد الحسن عثمان هي
        من كبار العلماء في السودان، تخرجت ببكاليريوس درجة الشرف من علوم الغابات جامعه
        الخرطوم ثم تخصصت في علوم البيئة في دراسة الماجستير حتى نالت درجة الدكتوراه. </p><p>كان لها
        العديد من الأوراق العلمية و المشاركات، فقامت بإعداد العديد من الدراسات
        الاستشارية و الفنية و كتابة العديد البحوث العلمية المشهورة على دوريات عالمية و
        محلية، و كذلك شاركت في اكثر من 65 مؤتمر في أكثر من 45 دولة حول العالم، أيضاً
        تفردت الدكتورة بلقيس بأنها كانت كاتب و منسق في عدد من الهيئات الحكومية
        بالتقارير الخاصة بحصاد و تخزين ثاني أكسيد الكربون و في الهيئات الخاصة بالتقييم
        العالمي لدور العلوم الزراعية و التكنلوجيا والتنمية.</p><p>إحتلت
        الدكتورة بلقيس عدد من المناصب و المجالس العلمية حيث كانت عضو الهئية الاستشارية
        لمجلس الوزراء عن قطاع البيئة ثم نائب رئيس المجلس الاستشاري للمشروع الاقليمي
        لقارة افريقيا و الخاصل بأبحاث التكيف فيها و الممول من المعهد العلمي لأبحاث
        التنمية بكندا. و أيضاً كانت عضو في عدد من اللجان العلمية و العالمية، كل هذا لم
        يمنعها من ممارسة التدريس حيث عملت كأستاذة متعاونة بجامعة الزعيم الازهري قسم
        الدراسات البيئية.</p><p>;كرم برنامج
        الامم المتحدة للبيئة سبعه قيادين في مجال مكافحة ظاهرة الاحتباس الحراري كأبطال
        الارض لهذا العام و كانت من بينهم السودانية د. بلقيس محمد الحسن تقديراً لجهودها
        الكبيرة في مجال البيئة و قال بيان صادر من مكتب برنامج الامم المتحدة الأنمائي
        للبيئة أن هذه الجائزة تعتبر أعلى جائزة بيئة يمنحها برنامج الامم المتحدة
        الإنمائي تقديراً للجهود الغير مسبوقة من الدكتورة بلقيس في مجال تغير المناخ في
        قارة افريقيا بإعتبارها نموذجا للعمل الجاد و كذلك بالنسبة للسودان خاصة في ظل
        الارتباط الوثيق بين ظاهرة تغير المناخ و تصاعد الصراعات و الحروب الاهلية، و اضاف
        البيان ان الجائزة جاءت إعترافاً بمشاركتها الفعالة بعلمها في الهيئة الحكومية
        لتغير المناخ التي تعتبر أكبر شبكة معنية بحماية البيئة و التنمية المستدامة بجانب
        إسهاماتها المتعددة في هذا المجال.</p><p>و أشار البيان
        إلى إعتراف البرنامج بمشاركتها في كتابة و اعداد الكثير من التقارير و الاوراق
        العلمية; التي كانت لها صدى كبير في
        الاوساط العلمية حيث توجت هذه الجهود بإعتراف عالمي أهلها لنيل جائزة نوبل للسلام
        مناصفة مع آل قور. و اشارت اللجنة بمشاركة د. بلقيس في تقرير السودان الاول
        للإتفاقية الإطارية لتغير المناخ بقيادة فريرق السودان البحثي في المبادرة
        العالمية لتقييم الاثار و التكيف مع الظاهرة. </p><p>
        </p><p>الدكتورة
        بلقيس هي من المع و ابرز الشخصيات السودانية و النسائية بالتحديد التي أثرت في
        مجال علم المناخ و البيئة. و قد أنتجت أعمالاً كانت فتحاً في مجال الاحترار
        العالمي في شمال أفريقيا و شرقها و كان لها جهود خاصة في تثقيف طلبة في مسئلة تغير
        المناخ، و بهذه الطريقة إرهاف وعي الجيل الجديد في البلد لهذه القضية.</p>';
        

    public function run()
    {
        DB::table('stories')->delete();

        $category_id = 1;

        DB::table('stories')->insert( array(
            array(
                'user_id'        => 1,
                'category_id'    => $category_id,
                'title'      => 'د. بلقيس محمد الحسن',
                'slug'       => 'د-بلقيس-محمد-الحسن',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/400x400',
                'status'    => 1,
                'meta_title' => 'سوداكتف - '.'بلقيس محمد الحسن عثمان',
                'meta_description' => Str::limit($this->content, 200),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => 3,
                'category_id'    => $category_id +1,
                'title'      => 'الطيب صالح',
                'slug'       => 'الطيب-صالح',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/400x400',
                'status'    => 1,
                'meta_title' => 'سوداكتف - '.'الطيب صالح',
                'meta_description' => Str::limit($this->content, 200),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'        => 1,
                'category_id'    => $category_id,
                'title'      => 'محمد عادل عبد الله',
                'slug'       => 'محمد-عادل-عبد-الله',
                'content'    => $this->content,
                'image'    => 'http://placehold.it/600x600',
                'status'    => 0,
                'meta_title' => 'سوداكتف - '.'محمد عادل عبد الله',
                'meta_description' => Str::limit($this->content, 200),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
