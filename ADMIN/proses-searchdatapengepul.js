function searchpengepul(){
  $("#loading").show(); // Tampilkan loadingnya
  
  $.ajax({
      type: "POST", // Method pengiriman data bisa dengan GET atau POST
      url: "proses-searchdatapengepul.php", // Isi dengan url/path file php yang dituju
      data: {idPengepul : $("#idPengepul").text()}, // data yang akan dikirim ke file proses
      dataType: "json",
      beforeSend: function(e) {
          if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
          }
    },
    success: function(response){ // Ketika proses pengiriman berhasil
        $("#loading").hide(); // Sembunyikan loadingnya

        if(response.status == "success"){ // Jika isi dari array status adalah success
            $("#namaPengepul").val(response.namaPengepul); // set textbox dengan id namaNasabah
            $("#jk").val(response.jk); // set textbox dengan id jk
            $("#alamat").val(response.alamat); // set textbox dengan id alamat
            $("#telp").val(response.telp); // set textbox dengan id telp
        }else{ // Jika isi dari array status adalah failed
            alert("Data Tidak Ditemukan");
        }
    },
    error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
        alert(xhr.responseText);
    }
  });
}