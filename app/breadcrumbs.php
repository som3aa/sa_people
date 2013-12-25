<?php

// Story & Category
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('الصفحة الرئيسية', URL::to('/') );
});

Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, URL::to('/category/'.$category->slug));
});

Breadcrumbs::register('story', function($breadcrumbs, $story) {
    $breadcrumbs->parent('category', $story->category);
	$breadcrumbs->push($story->title, URL::to('/'.$story->slug));
});

// Search 
Breadcrumbs::register('search', function($breadcrumbs,$keyword) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('نتائج البحث عن ( '.$keyword.' )');
});

// Any Page 
Breadcrumbs::register('page', function($breadcrumbs,$title) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($title);
});

