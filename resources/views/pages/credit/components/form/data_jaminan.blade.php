{{-- in use this blade, don't forget include widget_jaminan --}}
<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>

<div class="content-clone-jaminan">
	<div class="section-clone-jaminan"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add" data-active="jaminan" data-target="template-clone-jaminan"><i class="fa fa-plus"></i> Jaminan</a>
	</fieldset>
</div>

<div class="hidden">
	{{-- template clone untuk data form jaminan --}}
	@include('pages.credit.components.form.widget_jaminan')
</div>