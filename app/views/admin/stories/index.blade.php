@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

	<h3>{{{ $title }}}</h3>

	<a href="{{{ URL::to('admin/stories/create') }}}" class="button small secondary">اضافة</a>
    
    <table>
      <thead>
        <tr>
          <th>الرقم</th>
          <th>اسم الشخصية</th>
          <td>منشور</td>
          <td>تعديل</td>
          <td>حذف</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($stories as $story)
        <tr>
          <td>{{{ $story->id }}}</td>
          <td>{{{ $story->title }}}</td>
          <td>{{{ $story->status }}}</td>
          <td>{{{ $story->category->name }}}</td>
          <td>{{{ $story->image }}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

@stop