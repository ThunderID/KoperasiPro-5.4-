@php 
/*  ===================================================================
	Readme
	===================================================================
	Component name: 	Address Component
	Author: 			Agil M. - agil.mahendra@gmail.com
	Description: 		Basic bootstrap form alamat on bootstrap version 3.
	Requirement: 		This component only works on laravel 5.4
	===================================================================
	Usage
	===================================================================
	to use this component, simply include this component and parsing your parameters.

	Example:

	include this component
		@include('components.helpers.forms.address', [parameters])

	===================================================================
	Parameters
	===================================================================
	Pass this parameter inside array. some required or some not. 
	Make sure that you always pass required one.

	List of parameters:
	1. param
		required:			no
		description : 		this will contains some parameters inside.

		a. prefix
			required:		no
			value:			string only (snake case format; ie : halo_modal)
			description:	this will binding on some all "input name=parameters"

	2. data
		required:			no
		Description:		this will contains some parameters inside.

		a. provinsi
			required:		yes
			value:			array only
			description:	this will binding on value select option

	3. settings
		required:			no
		description:		this will contains some parameters inside.

		a. class
			required:		no
			value:			string only
			description:	this parameters add class name on all input & all select option.

		b. data_attribute_flag
			required:		no
			value:			string only
			description:	this parameters can use for need data-attribute

		c. data_attribute_value
			required:		yes (if usage 'data_attribute_flag')
			value:			string
			description:	this parameters can use data-attribute on select option
	===================================================================
**/
 @endphp

<h5 class="text-uppercase text-light">Alamat</h5>
<fieldset class="form-group">
	<label class="text-sm">Jalan</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[alamat]', (isset($param['data']['alamat']) ? $param['data']['alamat'] : null), ['class' => 'form-control auto-tabindex ' . (isset($settings["class"]) ? $settings["class"] : ""), 'placeholder' => 'Ex. Jln. Blimbing No. 8', 'data-field' => 'alamat']) !!}
		</div>
		<!-- <div class="col-md-3 p-l-none">
			<a href="#" class="btn btn-link btn-sm p-l-none p-r-none open-modal" data-toggle="modal" data-target=".modal"><i class="fa fa-search"></i> Cari Alamat yg Ada</a>
		</div> -->
	</div>
</fieldset>
<fieldset class="form-group">
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<label class="text-sm">RT</label>
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[rt]', (isset($param['data']['rt']) ? $param['data']['rt'] : null), ['class' => 'form-control auto-tabindex ' . (isset($settings['class']) ? $settings['class'] : ''), 'placeholder' => 'RT', 'data-field' => 'rt']) !!}
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<label class="text-sm">RW</label>
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[rw]', (isset($param['data']['rw']) ? $param['data']['rw'] : null), ['class' => 'form-control auto-tabindex ' . (isset($settings['class']) ? $settings['class'] : ''), 'placeholder' => 'RW', 'data-field' => 'rw']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Provinsi</label>
	<div class="row">
		<div class="col-md-6">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[provinsi]' }}" class="form-control auto-tabindex select select-get-ajax {{ (isset($settings["class"]) ? $settings["class"] : "") }} {{ (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : "") }}" placeholder="Pilih Provinsi" data-placeholder="Pilih Provinsi" data-url="{{ route('regensi.index') }}" data-target-parsing=".select-regensi" data-field="provinsi" data-attribute-value="{{ (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null") }}" data-value-from-caption="yes">
				@foreach ($data['provinsi'] as $k => $v)
					<option value="{{ $k }}" data-id="{{ $k }}" {{ (isset($param['data']['provinsi']) && (strtolower($param['data']['provinsi']) == strtolower($v))) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach
			</select>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Kota/Kabupaten</label>
	<div class="row">
		<div class="col-md-6">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[regensi]' }}" class="form-control auto-tabindex select select-regensi select-get-ajax {{ (isset($settings["class"]) ? $settings["class"] : "") }} {{ (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : "") }}" placeholder="Pilih Kota/Kabupaten" data-placeholder="Pilih Kota/Kabupaten" data-url="{{ route('distrik.index') }}" data-target-parsing=".select-distrik" data-field="regensi" data-attribute-value="{{ (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null") }}" data-value-from-caption="yes">
				{{-- @foreach ($data['provinsi'] as $k => $v)
					<option value="{{ $v }}" data-id="{{ $k }}" {{ (isset($param['data'][0]['provinsi']) && !is_null($param['data'][0]['provinsi'])) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach --}}
			</select>

			{{-- {!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[regensi]', [], (isset($param['data'][0]['regensi']) ? $param['data'][0]['regensi'] : null), [
				'class' => 'form-control auto-tabindex select select-get-ajax select-regensi ' . (isset($settings["class"]) ? $settings["class"] : "")
					. (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : ""), 
				'placeholder' => 'Pilih Kota/Kabupaten', 
				
				'data-placeholder' => 'Pilih Kota/Kabupaten', 
				'data-url' => route('distrik.index'), 
				'data-target-parsing' => '.select-distrik', 
				'data-field' => 'regensi', 
				'data-attribute-value' => (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null")
			]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Kecamatan</label>
	<div class="row">
		<div class="col-md-6">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[distrik]' }}" class="form-control auto-tabindex select select-distrik select-get-ajax {{ (isset($settings["class"]) ? $settings["class"] : "") }} {{ (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : "") }}" placeholder="Pilih Kecamatan" data-placeholder="Pilih Kecamatan" data-url="{{ route('desa.index') }}" data-target-parsing=".select-desa" data-field="distrik" data-attribute-value="{{ (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null") }}" data-value-from-caption="yes">
				{{-- @foreach ($data['provinsi'] as $k => $v)
					<option value="{{ $v }}" data-id="{{ $k }}" {{ (isset($param['data'][0]['provinsi']) && !is_null($param['data'][0]['provinsi'])) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach --}}
			</select>

			{{-- {!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[distrik]', [], (isset($param['data'][0]['distrik']) ? $param['data'][0]['distrik'] : null), [
				'class' => 'form-control auto-tabindex select select-get-ajax select-distrik ' . (isset($settings["class"]) ? $settings["class"] : "") 
					. (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : ""), 
				'placeholder' => 'Pilih Kecamatan', 
				
				'data-placeholder' => 'Pilih Kecamatan', 
				'data-url' => route('desa.index'), 
				'data-target-parsing' => '.select-desa', 
				'data-field' => 'distrik', 
				'data-attribute-value' => (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null")
			]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Desa</label>
	<div class="row">
		<div class="col-md-6">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[provinsi]' }}" class="form-control auto-tabindex select select-desa select-get-ajax {{ (isset($settings["class"]) ? $settings["class"] : "") }} {{ (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : "") }}" placeholder="Pilih Desa" data-placeholder="Pilih Desa" data-field="desa" data-attribute-value="{{ (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null") }}" data-value-from-caption="yes">
				{{-- @foreach ($data['provinsi'] as $k => $v)
					<option value="{{ $v }}" data-id="{{ $k }}" {{ (isset($param['data'][0]['provinsi']) && !is_null($param['data'][0]['provinsi'])) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach --}}
			</select>

			{{-- {!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[desa]', [], (isset($param['data'][0]['desa']) ? $param['data'][0]['desa'] : null), [
				'class' => 'form-control auto-tabindex select select-get-ajax select-desa ' . (isset($settings["class"]) ? $settings["class"] : "") 
					. (isset($settings["data_attribute_flag"]) ? $settings["data_attribute_flag"] : ""), 
				'placeholder' => 'Pilih Desa', 
				
				'data-placeholder' => 'Pilih Desa', 
				'data-field' => 'desa', 
				'data-attribute-value' => (isset($settings["data_attribute_value"]) ? $settings['data_attribute_value'] : "null")
			]) !!} --}}
		</div>
	</div>
</fieldset>

{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[alamat][0]' : 'alamat') . '[negara]', 'indonesia', ['class' => ' ' . (isset($settings["class"]) ? $settings["class"] : ""), 'data-field' => 'negara']) !!}