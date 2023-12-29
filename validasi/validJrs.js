function validasi() {
    let a = document.forms["Jurusan"]["nama_jurusan"].value;
    if (a == "") {
      alert("Mohon isi Nama Jurusan terlebih dahulu");
      return false;
    }
    let b = document.forms["Jurusan"]["nama_prodi"].value;
    if (b == "") {
      alert("Mohon isi Nama Prodi terlebih dahulu");
      return false;
    }
  }