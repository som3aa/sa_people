@extends('layouts.story')

{{-- Web site Title --}}
@section('title')
@parent - 
 عن سوداتكف
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ Config::get('app.url') }}}/about" rel="canonical" />
  <meta name="description" content="تطمح شبكة سوداكتف لتكون منبر إلكتروني عريض يضم كل ما تزخر به أرضنا الحبيبة من علامات تستحق أن يكون لها نصيب من الاعلام والظهور، ونحن نؤمن
      تماما بماهية وقوة الإعلامي الإلكتروني وانه هو مستقبل" />
  <meta property="og:image" content="{{{ Config::get('app.url').'/img/sudactive-logo.jpg' }}}" />
  <meta property="og:title" content="سوداكتف - عن سوداكتف" />
  <meta property="og:description" content="تطمح شبكة سوداكتف لتكون منبر إلكتروني عريض يضم كل ما تزخر به أرضنا الحبيبة من علامات تستحق أن يكون لها نصيب من الاعلام والظهور، ونحن نؤمن
      تماما بماهية وقوة الإعلامي الإلكتروني وانه هو مستقبل" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{{ Config::get('app.url') }}}/about" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('page','عن سوداكتف'))

{{-- Content --}}
@section('content')

  <div class="post">

    <h3>نظرة سوداكتف</h3>
		<p>
	    تطمح شبكة <strong>سوداكتف</strong> لتكون منبر إلكتروني عريض يضم كل ما تزخر به أرضنا الحبيبة من علامات تستحق أن يكون لها نصيب من الاعلام والظهور، ونحن نؤمن
	    تماما بماهية وقوة الإعلامي الإلكتروني وانه هو مستقبل الاعلام، وها نحن هنا نخطوا أولى خطواتنا ببناء أول موقع يوثق للشخصيات السودانية وذلك بحصرها في مكان
	    واحد ثم نشرها حول كل ارجاء قريتنا الإلكترونية الصغيرة، وما هذه إلا بداية لمسيرة طويلة تهدف فيها شبكة سوداكتف لخلق بيئة اجتماعية ومحطة للوسط الشبابي
	    السوداني لتبادل معارفهم وخبراتهم، حيث يساهم الجميع في بناء محتويات الشبكة مع مراعاة تقديم محتوى جيد وفق الجودة المرجوة، كما سوف تقدم شبكة سوداكتف العديد من
	    الخدمات الإلتكرونية <strong>مجانا</strong> حتى تمثل اسلوب جديد في الحياة العصرية للشباب السوداني.
		</p>

  	<div class="row">
  		<div class="large-5 large-centered columns">
  			<p>{{ HTML::image('img/sudactive-logo.jpg') }}</p>
  		</div>
  	</div>

  </div>

@stop
