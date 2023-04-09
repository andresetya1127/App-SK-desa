const flashSuccess = $(".flash-success").data("flashdata");
if (flashSuccess) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  Toast.fire({
    icon: "success",
    iconColor: "#00ff00",
    background: "#454d55",
    title: flashSuccess,
  });
}

const flashError = $(".flash-error").data("flashdata");
if (flashError) {
  Swal.fire({
    position: "center",
    icon: "error",
    title: "Gagal!",
    text: flashError,
    showConfirmButton: true,
    allowOutsideClick: false,
  });
}

// identify
const flashInfo = $(".flash-info").data("flashdata");
if (flashInfo) {
  Swal.fire({
    position: "center",
    icon: "info",
    title: "",
    text: flashInfo,
    showConfirmButton: true,
    allowOutsideClick: false,
  });
}

// Tombol terima

$(".btn-accept").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Verifikasi Data!",
    text: "Apakah Anda Yakin!",
    icon: "info",
    iconColor: "#00ff00",
    showCancelButton: true,
    allowOutsideClick: false,
    allowEnterKey: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, saya Yakin",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

// Tombol tolak
$(".btn-denied").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "",
    text: "Apakah Anda Yakin!",
    icon: "warning",
    iconColor: "#ff3333",
    showCancelButton: true,
    allowOutsideClick: false,
    allowEnterKey: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

// Tombol hapus
$(".btn-delete").on("click", function (e) {
  e.preventDefault();
  var href = $(this).attr("href");
  Swal.fire({
    title: "",
    text: "Apakah Anda Yakin!",
    icon: "warning",
    iconColor: "#ff3333",
    showCancelButton: true,
    allowOutsideClick: false,
    allowEnterKey: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = href;
    }
  });
});

// Tombol selesai
$(".btn-done").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "",
    text: "Apakah Anda Yakin!",
    icon: "success",
    showCancelButton: true,
    allowOutsideClick: false,
    allowEnterKey: false,
    confirmButtonColor: "#00ff00",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

// disable input
$(document).ready(function () {
  $(".dis_user").attr("disabled", "disabled");
});

// format rupiah
var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function (e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function previewImage() {
  const img = document.querySelector("#img-upload");
  const label = document.querySelector(".custom-file-label");
  const preview = document.querySelector(".img-preview");

  // memasukkan nama gambar di labe
  label.textContent = img.files[0].name;

  // untuk menggantik
  const fileSampul = new FileReader();
  fileSampul.readAsDataURL(img.files[0]);
  fileSampul.onload = function (e) {
    preview.src = e.target.result;
  };
}
