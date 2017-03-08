{{-- 
	Plugin Panel Contact
	Description: panel conctact add more contact with include
	Usage:
	- Param
		$param['prefix']: prefix variable input
		$param['target']: untuk nama id template
		$param['class']['init_add']: untuk initial on load page add single clone
 --}}

<strong><h5>Kontak</h5></strong>
<div class="content-clone-contact">
	<div class="section-clone-contact"></div>
	<fieldset class="form-group">
		<a href="#" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add {{ isset($param['class']['init_add']) ? $param['class']['init_add'] : '' }}" data-active="contact" data-target="{{ $param['target'] ? $param['target'] : 'template-contact' }}"><i class="fa fa-plus"></i> No. Telp</a>
	</fieldset>
</div>

<div class="hidden">
	{{-- template clone untuk data form contact --}}
	<div id="{{ $param['target'] ? $param['target'] : 'template-contact' }}">
		@include('components.helpers.forms.contact', [ 
			'param'	=> [
				'prefix'	=> $param['prefix']
		]])
	</div>
</div>