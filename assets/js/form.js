 var i = 1;
            function addSPP() {
//                menentukan target append
                var SPPlist = document.getElementById('SPPlist');
                
//                membuat element
                var row = document.createElement('tr');
                var bulan = document.createElement('td');
                var jumlah = document.createElement('td');
                var aksi = document.createElement('td');

//                meng append element
                SPPlist.appendChild(row);
                row.appendChild(bulan);
                row.appendChild(jumlah);
                row.appendChild(aksi);

//                membuat element input
                var bulan_input = document.createElement('input');
                bulan_input.setAttribute('name', 'bulan_input[' + i + ']');
                bulan_input.setAttribute('class', 'input-block-level');

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'jumlah_input[' + i + ']');
                jumlah_input.setAttribute('class', 'input-block-level');

                var hapus = document.createElement('span');

//                meng append element input
                bulan.appendChild(bulan_input);
                jumlah.appendChild(jumlah_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button name="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
            }

function milih(){
	var no_spp, nama_siswa;
	no_spp    = document.getElementById('spp').value;
	nama_siswa 		 = $( "#spp option:selected" ).data('nama_siswa');

	//Kirim Hasil ke Tampilan
	//document.getElementById('id_pegawai').value = id_pegawai;
	document.getElementById('namavalue').value = nama_siswa;

	//document.getElementById('kdtext').innerHTML = id_pegawai;
	//document.getElementById('namatext').innerHTML = nama;
}
