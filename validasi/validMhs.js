function validasi() {
    let a = document.forms["Mahasiswa"]["nim"].value;
    if (a == "") {
      alert("Mohon isi NIM terlebih dahulu");
      return false;
    }
    let b = document.forms["Mahasiswa"]["nama"].value;
    if (b == "") {
      alert("Mohon isi Nama terlebih dahulu");
      return false;
    }
    let c = document.forms["Mahasiswa"]["prodi"].value;
    if (c == "") {
      alert("Mohon isi Prodi terlebih dahulu");
      return false;
    }
    let d = document.forms["Mahasiswa"]["no_telp"].value;
    if (d == "") {
      alert("Mohon isi No Telepon terlebih dahulu");
      return false;
    }
  }