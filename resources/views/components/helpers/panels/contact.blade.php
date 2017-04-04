 @php
 /**
  * ===================================================================
  * Readme
  * ===================================================================
  * component name:		Contact
  * author:				Agil M (agil.mahendra@gmail.com)
  * description:		form untuk kontak
  * 
  * ===================================================================
  * Usage
  * ===================================================================
  * include this file
  * 
  * ===================================================================
  * Parameters
  * ===================================================================
  * list parameters:
  *
  * 1. param
  * 		required:			no
  * 		description:		diperlukan untuk menampilkan hasil dari value input, untuk edit data
  *
  * 		a. [name dari input value]
  * 			required:		no
  * 			value:			string
  * 			description:	untuk menampilkan value dari input, select maupun textarea
  *
  * 			contoh: 		tanggal_pengajuan
  *
  *			b. prefix
  *   			required: 		yes
  *   			value:			string
  *   			description:	untuk menambahkan nama inputan di form contact
  * 
  * 2. settings
  * 	required: 				no
  * 	descriptions: 			diperlukan untuk menampilkan parameters
  *
  * 	a. class
  * 		required: 			no
  * 		description:		diperlukan untuk menampilkan parameters childnya
  *
  *			a.1. init_add
  *					required:		no
  *					value: 			string
  *					description: 	digunakan untuk menambahkan 1 form contact secara langsung		 
  *		b. target
  *			required:			no
  *			value:				string
  *			description:		untuk menampilkan target dari yang ingin dituju
  */
 @endphp
<h5 class="text-uppercase text-light">Kontak</h5></strong>
<div class="content-clone-contact">
	<div class="root-template-contact"></div>
	<fieldset class="form-group">
		<a href="#" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add {{ isset($settings['class']['init_add']) ? $settings['class']['init_add'] : '' }}" data-active="contact" data-type-clone="form" data-template-clone="{{ (isset($settings['target']) ? $settings['target'] : 'template-clone-contact') }}" data-root-template="root-template-contact"><i class="fa fa-plus"></i> No. Telp</a>
	</fieldset>
</div>

<div class="hidden">
	{{-- template clone untuk data form contact --}}
	<div id="{{ isset($settings['target']) ? $settings['target'] : 'template-contact' }}">
		@include('components.helpers.forms.contact', [ 
			'param'	=> [
				'prefix'	=> $param['prefix'],
				'telepon'	=> (isset($param['telepon']) ? $param['telepon'] : null),
		]])
	</div>
</div>