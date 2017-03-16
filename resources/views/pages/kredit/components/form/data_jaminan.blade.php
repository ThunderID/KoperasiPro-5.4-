{{-- 
	Plugin Panel Jaminan
	Description: panel jaminan add more jaminan with include
	Usage:
	- Param
		$param['prefix']: prefix variable input
		$param['target']: untuk nama id template
		$param['class']['init_add']: untuk initial on load page add single clone
 --}}
<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>

<div class="content-clone-jaminan">
	<div class="section-clone-jaminan"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add {{ isset($param['class']['init_add']) ? $param['class']['init_add'] : '' }}" data-active="jaminan" data-target="{{ $param['target'] ? $param['target'] : 'template-contact' }}"><i class="fa fa-plus"></i> Jaminan</a>
	</fieldset>
</div>

<div class="hidden">
	{{-- template clone untuk data form jaminan --}}
	<div id="{{ $param['target'] ? $param['target'] : 'template-clone-jaminan' }}">
		@include('pages.kredit.components.form.widget_jaminan')
	</div>
</div>