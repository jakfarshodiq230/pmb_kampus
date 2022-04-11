<?php
	//Start session  
	session_start();
	
	//import connection to database
	include "koneksi/koneksi.php";
	
	//check if $_SESSION is exist
	if (isset($_SESSION)) {
		foreach ($_SESSION as $key => $val) {
			${$key} = $val;
		}


		// $sql	= "INSERT INTO pendaftaran VALUES(null,'$full_name', '$nick_name', '$birth_place'
		// 			, '$birth_date' ,'$gender', '$child_number', '$child_total', '$in_jakarta_follow'
		// 			, '$father_name', '$birth_place_father','$birth_date_father', '$father_last_education'
		// 			, '$father_job', '$father_religion','$mother_name', '$birth_place_mother', '$birth_date_mother'
		// 			, '$mother_last_education', '$mother_job', '$mother_religion', '$telp','','','','')";
		// membuat kode akun
			$today = date('ymd');
			$char = $today.'PMB';
			$query = mysqli_query($conn, "SELECT max(id_akun) as max_id FROM akun WHERE id_akun LIKE '{$char}%' ORDER BY id_akun DESC LIMIT 1");
			$data = mysqli_fetch_assoc($query);
			$getId = $data['max_id'];
			$no = substr($getId, -4, 4);
			$no = (int) $no;
			// Ditambah 1
			$no += 1;
			$IDAkun = $char . sprintf("%04s", $no);
		// kode pendaftaran
			$today2 = date('ymd');
			$char2 = $today2.'PND';
			$query2 = mysqli_query($conn, "SELECT max(id_pendaftaran) as max_id2 FROM data_pendaftaran WHERE id_pendaftaran LIKE '{$char2}%' ORDER BY id_pendaftaran DESC LIMIT 1");
			$data2 = mysqli_fetch_assoc($query2);
			$getId2 = $data2['max_id2'];
			$no2 = substr($getId2, -4, 4);
			$no2 = (int) $no2;
			// Ditambah 1
			$no2 += 1;
			$IDPendaftaran = $char2 . sprintf("%04s", $no2);
		// kode Data ORTU
			$today3 = date('ymd');
			$char3 = $today3.'ORT';
			$query3 = mysqli_query($conn, "SELECT max(id_dataortu) as max_id3 FROM data_orangtua WHERE id_dataortu LIKE '{$char3}%' ORDER BY id_dataortu DESC LIMIT 1");
			$data3 = mysqli_fetch_assoc($query3);
			$getId2 = $data3['max_id3'];
			$no3 = substr($getId3, -4, 4);
			$no3 = (int) $no3;
			// Ditambah 1
			$no3 += 1;
			$IDORTU = $char3 . sprintf("%04s", $no3);
		// daftar akun
			$queryCEK  =   "SELECT email FROM akun WHERE email='$email'";
			$exacCEK   = mysqli_query($conn, $queryCEK);
			if($exacCEK){
				$email_count = mysqli_num_rows($exacCEK);
				if ($email_count == 0) {
					$sqlAkun = "INSERT INTO akun (`email`, `password`, `nama_admin`, `role_user`, `id_akun`) VALUES  ('$email','$password','','user','$IDAkun')";
					$execAKUN 	= mysqli_query($conn, $sqlAkun);
					if($execAKUN){
						// data_pendaftaran
						$insertPendaftaran = " INSERT INTO `data_pendaftaran`(`id_akun`, `nama_lengkap_mhs`, `nama_panggilan_mhs`,
						`agama_mhs`, `tempat_lahir_mhs`, `tanggal_lahir`, `jenis_kelamin`, `anak_ke`, `saudara`, `no_hpmhs`, 
						`tinggi_badan`, `alamat_mhs`, `asal_sekolah`, `alamat_sekolah`, `ikut_lokasi`, `id_pendaftaran`,
						`berat_badan`)
						VALUES ('$IDAkun','$full_name','$nick_name','$agama_mhs','$birth_place','$birth_date','$gender',
						'$child_number','$child_total','$no_hp','$tinggi_badan','$alamat_mhs','$asal_sekolah_mhs',
						'$alamat_sekolah_mhs','$in_jakarta_follow','$IDPendaftaran','$berat_badan')";
						mysqli_query($conn,$insertPendaftaran);

						// data ortuAYAH
						$sqlORTU1 = "INSERT INTO `data_orangtua`(`id_pendaftaran`, `nama`, `tempat_lahir`,
						 `tanggal_lahir`, `pendidikan`, `pekerjaan`, `agama`, `nomor_hp`, `kategori`) 
						 VALUES ('$IDPendaftaran','$father_name','$birth_place_father','$birth_date_father','$father_last_education',
						 '$father_job','$father_religion','$no_hpayah','ayah')";
						mysqli_query($conn,$sqlORTU1);
						// data ortuIBU
						$sqlORTU2 = "INSERT INTO `data_orangtua`( `id_pendaftaran`, `nama`, `tempat_lahir`,
						 `tanggal_lahir`, `pendidikan`, `pekerjaan`, `agama`, `nomor_hp`, `kategori`) 
						 VALUES ('$IDPendaftaran','$mother_name','$birth_place_mother','$birth_date_mother','$mother_last_education',
						 '$mother_job','$mother_religion','$telp','ibu')";
						$sukses = mysqli_query($conn,$sqlORTU2);
						if($sukses){
							session_destroy();
							echo'<script> window.location="success_register.php"; </script> ';
						}
					}
					// and daftar akun
				}
			}else{
				echo mysqli_error($conn);
			}
	}
?>