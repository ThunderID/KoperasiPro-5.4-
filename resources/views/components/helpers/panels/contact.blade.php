{{-- 
	Plugin Panel Contact
	Description: panel conctact add more contact with include
	Usage:
	- variable['phone']  	untuk nama form input
	- variable['target'] 	untuk nama id template

 --}}
<strong><h5>Kontak</h5></strong>
<div class="content-clone-contact">
	<div class="section-clone-contact"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add" data-active="contact" data-target="{{ $variable['target'] }}"><i class="fa fa-plus"></i> No. Handphone</a>
	</fieldset>
</div>

<div class="hidden">
	{{-- template clone untuk data form contact --}}
	<div id="{{ $variable['target'] }}">
		@include('components.helpers.forms.contact', [ 'variable'	=> [
			'phone'		=> $variable['phone']
		]])
	</div>
</div>