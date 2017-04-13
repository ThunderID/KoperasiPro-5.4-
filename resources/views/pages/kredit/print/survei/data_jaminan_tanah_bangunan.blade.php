@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
	@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					<u>jaminan tanah &amp; bangunan {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info jaminan</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							tipe
						</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}  
							( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-'  }} )
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							no. sertifikat
						</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Masa Berlaku sampai
						</p>
					</div>
					<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-'  }}
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							atas nama
						</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-'  }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info {{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }} </strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							fungsi bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['fungsi_bangunan']) && !is_null($value['fungsi_bangunan'])) ? str_replace('_', ' ', $value['fungsi_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							luas
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
							{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
							<span class="text-capitalize text-muted m-t-min-xs" style="font-size: 10px;"><em>( bangunan / tanah )</em></span>
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							bentuk bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['bentuk_bangunan']) && !is_null($value['bentuk_bangunan'])) ? str_replace('_', ' ', $value['bentuk_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							konstruksi bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['konstruksi_bangunan']) && !is_null($value['konstruksi_bangunan'])) ? str_replace('_', ' ', $value['konstruksi_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							lantai bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['lantai_bangunan']) && !is_null($value['lantai_bangunan'])) ? str_replace('_', ' ', $value['lantai_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							dinding bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['dinding_bangunan']) && !is_null($value['dinding_bangunan'])) ? str_replace('_', ' ', $value['dinding_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							alamat
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
							RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }} <br/>
							{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
							{{ (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] .'<br/>' : '' }}
							{{ (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] : '' }} - 
							{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
							{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info umum</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							listrik
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['listrik']) && !is_null($value['listrik'])) ? str_replace('_', ' ', $value['listrik']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							air
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-uppercase text-light m-b-xs">
							{{ (isset($value['air']) && !is_null($value['air'])) ? str_replace('_', ' ', $value['air']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							jalan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['jalan']) && !is_null($value['jalan'])) ? str_replace('_', ' ', $value['jalan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							lebar jalan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['lebar_jalan']) && !is_null($value['lebar_jalan'])) ? str_replace('_', ' ', $value['lebar_jalan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							letak lokasi terhadap jalan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['letak_lokasi_terhadap_jalan']) && !is_null($value['letak_lokasi_terhadap_jalan'])) ? str_replace('_', ' ', $value['letak_lokasi_terhadap_jalan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							lingkungan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['lingkungan']) && !is_null($value['lingkungan'])) ? str_replace('_', ' ', $value['lingkungan']) : '-'  }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>lain-lain</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							nilai jaminan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['nilai_jaminan']) && !is_null($value['nilai_jaminan'])) ? str_replace('_', ' ', $value['nilai_jaminan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							taksasi tanah
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['taksasi_tanah']) && !is_null($value['taksasi_tanah'])) ? str_replace('_', ' ', $value['taksasi_tanah']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							taksasi bangunan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['taksasi_bangunan']) && !is_null($value['taksasi_bangunan'])) ? str_replace('_', ' ', $value['taksasi_bangunan']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							njop
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['njop']) && !is_null($value['njop'])) ? str_replace('_', ' ', $value['njop']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							uraian
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? str_replace('_', ' ', $value['uraian']) : '-'  }}
						</p>
					</div>
				</div>
			</div>
		</div>

	

	@endforeach
@else
@endif