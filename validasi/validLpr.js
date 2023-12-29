function validasi() {
    let a = document.forms["Laporan"]["nim"].value;
    if (a == "") {
      alert("Mohon isi NIM terlebih dahulu");
      return false;
    }
    let b = document.forms["Laporan"]["nama"].value;
    if (b == "") {
      alert("Mohon isi Nama terlebih dahulu");
      return false;
    }
    let c = document.forms["Laporan"]["prodi"].value;
    if (c == "") {
      alert("Mohon isi Prodi terlebih dahulu");
      return false;
    }
    let d = document.forms["Laporan"]["pengaduan"].value;
    if (d == "") {
      alert("Mohon isi Pengaduan terlebih dahulu");
      return false;
    }
  }