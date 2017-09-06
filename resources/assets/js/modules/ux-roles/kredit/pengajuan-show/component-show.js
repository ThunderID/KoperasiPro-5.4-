var kredit_pengajuan_show = function() {
	this.init = function() {
		// event button edit nasabah
		$(document).on('click', '.button-edit', function(e) {
			flag = $(this).attr('data-flag');

			console.log(data);
			if (flag == 'data-nasabah') {
				let dataAddress = data.debitur.alamat;

				if (typeof (dataAddress) !== 'undefined') {
					$(document.getElementById("debitur[alamat][0][regensi]")).attr('data-preload', dataAddress[0].regensi);
					$(document.getElementById("debitur[alamat][0][distrik]")).attr('data-preload', dataAddress[0].distrik);
					window.selectDropdown.setValue($(document.getElementById("debitur[alamat][0][provinsi]")), 'JAWA TIMUR')
					// re-enabled select regensi
					document.getElementById("debitur[alamat][0][regensi]").disabled = false;
				}
			} else if (flag == 'data-keluarga') {
				let index = $(this).attr('data-index');
				let dataAddress = data.debitur.relasi[index].alamat;

				if (typeof (dataAddress) !== 'undefined') {
					$(document.getElementById("relasi[alamat][0][regensi]")).attr('data-preload', dataAddress[0].regensi);
					$(document.getElementById("relasi[alamat][0][distrik]")).attr('data-preload', dataAddress[0].distrik);
					window.selectDropdown.setValue($(document.getElementById("relasi[alamat][0][provinsi]")), 'JAWA TIMUR')
				}
			} else if (flag == 'data-jaminan-tanah-bangunan') {
				let index = $(this).attr('data-index');
				let dataAddress = data.jaminan_tanah_bangunan[index].alamat;

				if (typeof (dataAddress) !== 'undefined') {
					$(document.getElementById("pengajuan[jaminan_tanah_bangunan][alamat][0][regensi]")).attr('data-preload', dataAddress[0].regensi);
					$(document.getElementById("pengajuan[jaminan_tanah_bangunan][alamat][0][distrik]")).attr('data-preload', dataAddress[0].distrik);
					window.selectDropdown.setValue($(document.getElementById("pengajuan[jaminan_tanah_bangunan][alamat][0][provinsi]")), 'JAWA TIMUR')	
				}
			}
 		});
	}
}

var iface_kredit_pengajuan_show = new kredit_pengajuan_show()

$(document).on('ready', function(kredit_pengajuan_show) {
	iface_kredit_pengajuan_show.init()
})
$(document).on('pjax:end', function(kredit_pengajuan_show) {
	iface_kredit_pengajuan_show.init()
})