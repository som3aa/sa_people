@extends('site.layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل البروفايل' }}}
@stop
{{ HTML::script('http://code.jquery.com/jquery-1.10.1.min.js') }}
{{-- Tabes --}}
@section('tabes')
  <ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class="active"><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
  </ul>
@stop

{{-- Sidebar --}}
@section('sidebar')
  
	{{ Form::open(array('action' => array('AccountProfileController@postCrop')) ) }}

	  <input type="hidden" id="x" name="x" />
	  <input type="hidden" id="y" name="y" />
	  <input type="hidden" id="w" name="w" />
	  <input type="hidden" id="h" name="h" />

	  <p style="margin-top:285px">{{ Form::submit('ارسل',array('class'=>'button')) }}</p>

	{{ Form::close() }}

@stop

{{-- Content --}}
@section('content')  

	{{ HTML::script('assets/jcrop/js/jquery.Jcrop.min.js') }}
	{{ HTML::style('assets/jcrop/css/jquery.Jcrop.min.css') }}


	<script type="text/javascript">
	  $(function($){

	    // Create variables (in this scope) to hold the API and image size
	    var jcrop_api,
	        boundx,
	        boundy,

	        // Grab some information about the preview pane
	        $preview = $('#preview-pane'),
	        $pcnt = $('#preview-pane .preview-container'),
	        $pimg = $('#preview-pane .preview-container img'),

	        xsize = $pcnt.width(),
	        ysize = $pcnt.height();
	    
	    $('#target').Jcrop({
	      onChange: updatePreview,
	      onSelect: updatePreview,
	      setSelect: [ 20, 20, 250, 250 ],
	      aspectRatio: 1,
	    },function(){
	      // Use the API to get the real image size
	      var bounds = this.getBounds();
	      boundx = bounds[0];
	      boundy = bounds[1];
	      // Store the API in the jcrop_api variable
	      jcrop_api = this;

	      // Move the preview into the jcrop container for css positioning
	      $preview.appendTo(jcrop_api.ui.holder);
	    });

	    function updatePreview(c)
	    {
	      if (parseInt(c.w) > 0)
	      {
	        var rx = xsize / c.w;
	        var ry = ysize / c.h;

	        $pimg.css({
	          width: Math.round(rx * boundx) + 'px',
	          height: Math.round(ry * boundy) + 'px',
	          marginLeft: '-' + Math.round(rx * c.x) + 'px',
	          marginTop: '-' + Math.round(ry * c.y) + 'px'
	        });
	      }

	        $('#x').val(c.x);
	        $('#y').val(c.y);
	        $('#w').val(c.w);
	        $('#h').val(c.h);

	    };

	  });


	</script>

	<style type="text/css">

	/* Apply these styles only when #preview-pane has
	   been placed within the Jcrop widget */
	.jcrop-holder #preview-pane {
	  display: block;
	  position: absolute;
	  z-index: 2000;
	  top: 10px;
	  right: -240px;
	}

	/* The Javascript code will set the aspect ratio of the crop
	   area based on the size of the thumbnail preview,
	   specified here */
	#preview-pane .preview-container {
	  width: 200px;
	  height: 200px;
	  overflow: hidden;
	  direction: ltr !important;
	}

	div.jcrop-holder div > div {
	  direction: ltr !important;
	}

	</style>

	<h4>تعديل صورة البروفايل :</h4>

	<br />

	<img src="/../{{ $user->profile->avatar}}" id="target" alt="[Jcrop Example]" />

	<div id="preview-pane">
	  <div class="preview-container th radius">
	    <img src="/../{{ $user->profile->avatar}}" class="jcrop-preview" alt="Preview" />
	  </div>
	</div>

@stop