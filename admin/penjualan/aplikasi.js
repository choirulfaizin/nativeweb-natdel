(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var no_meja = 0;
		var main = "data_meja.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-mahasiswa").load(main);
		
		// ketika tombol ubah/tambah di tekan
		$('.ubah').live("click", function(){
			
			var url = "form_meja.php";
			// ambil nilai id dari tombol ubah
			no_meja = this.id;
			
			if(no_meja != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Pilih Meja");
			}

			$.post(url, {id: no_meja} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});
		
		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "input_meja.php";
			// ambil nilai id dari tombol hapus
			no_meja = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin menghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: no_meja} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").load(main);
				});
			}
		});

		// ketika tombol simpan ditekan
		$("#simpan-mahasiswa").bind("click", function(event) {
			var url = "input_meja.php";

			// mengambil nilai dari inputbox, textbox dan select
            var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {status: v_status, id: no_meja} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);

				// sembunyikan modal dialog
				$('#dialog-mahasiswa').modal('hide');
			});
		});
	});
}) (jQuery);
