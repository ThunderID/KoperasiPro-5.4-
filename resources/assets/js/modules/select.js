import $ from 'jquery';
window.selectDropdown = {

	/* OVERRIDES */
	clear: function(e){
		$(e).val('').trigger('change');
	},

	setValue: function(e, val){
		$(e).val(val).trigger('change');
	},	

	/* END of OVERRIDES */


	default: function () {
		$('.select').select2({
			theme: "bootstrap",
			allowClear: true,
			width: null,
		});	

		$(".select").each(function() {
			if($(this).data('select-preload')){
				$(this).val($(this).data('select-preload')).trigger('change');
			}
		});
	},
	getAjax: function () {		
		$('.select-get-ajax').on('change', function(evt) {
			// init
			// get select2 to parsing data
			var targetParsing = $(this).data('target-parsing');
			// get parent select on aktif
			var rootSelect = $(this).parent().parent().parent().parent();
			var elementTarget = rootSelect.find(targetParsing);		


			// ui
			elementTarget.prop('disabled', true);
			elementTarget.val('');


			// loader
			if($(this).val()){
				// disable on this disabled state
				if(!$(this).prop('disabled')){
					if($(this).data('loader')){
					// need loader effect
						$('.' + $(this).data('loader')).css("visibility", "visible");
					}
				}
			}

			var el = $(this);
			var url = $(this).attr('data-url');
			var id = $(this).find('option:selected').attr('data-id');
			var val = $(this).find('option:selected').val();
			var caption = $(this).find('option:selected').html();
			var dataFlag = $(this).data('value-from-caption');
			
			if ((typeof dataFlag != 'undefined')) {
				$(this).val(caption);
			}

			// get data list on ajax
			$.ajax({
				type: "GET",
				url: url,
				data: {id: id},
				cache: true,
				success: function (data) {
					// parsing data ajax to content
					elementTarget.html('');
					$.each(data, function(index, value) {
						var $option = $("<option value='" + value + "' data-id='" +index+ "'>" + value +"</option>");
						// $option.val(v.id).text(v.nama);
						// elementTarget.append($option);
						elementTarget.append($option);
					});
					// remove default on selected
					elementTarget.val('');

					// ux
					if(!el.prop('disabled'))
					{
						if(el.val()){
							// remove disable select regensi
							elementTarget.removeAttr('disabled');

							// after get data, set focus to select-regensi
							elementTarget.focus();	

							// turn off loader if any
							if(el.data('loader')){
								$('.' + el.data('loader')).css("visibility", "hidden");
							}
						}
					}
				}
			});

		});
	},
	init: function () {
		window.selectDropdown.getAjax();
		window.selectDropdown.default();
	}
}
// window.select = function(element, param) {
// 	// on event select2 'desa' on selected after focus to 'select-desa' on form kontak
// 	$('.select-desa').on('select2:select', function(evt) {
// 		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-cities
// 		rootSelect.find('.input-kodepos').focus();
// 	});

// 	// on event select2 'pekerjaan' on selected after focus to 'input-jabatan' on form pekerjaan
// 	$('.select-pekerjaan').on('select2:select', function(evt) {
// 		rootSelect = $(this).parent().parent().parent().parent();
// 		rootSelect.find('.input-instansi').focus();
// 	});

// 	// on event select2 'lama-angsuran' on selected after focus to 'input-tujuan-kredit' on form rencana kredit
// 	$('.select-lama-angsuran').on('select2:select', function(evt) {
// 		rootSelect = $(this).parent().parent().parent().parent();
// 		rootSelect.find('.input-tujuan-kredit').focus();
// 	});
// }

// document ready & document pjax:end
$(document).ready( function() {
	window.selectDropdown.init();
});