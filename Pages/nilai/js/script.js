// ambil element" yang di butuhkan
let keyword = document.getElementById("keyword");
let tombol_cari = document.getElementById("tombol_cari");
let container = document.getElementById("container");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  //buat object ajax
  let xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  //eksekusi ajax
  xhr.open("GET", "ajax/nl.php?keyword=" + keyword.value, true);
  xhr.send();
});

function cariHal() {
  let no = document.getElementById("pagination").value;
  window.location.assign(
    "http://localhost/kuliahphp/Semester4/Pages/nilai/nilai.php?hal=" + no
  );
}
