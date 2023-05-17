$(document).ready(function() {
    // Mendapatkan elemen input email
    var emailInput = document.getElementById("email");
  
    // Menambahkan event listener untuk event keyup
    emailInput.addEventListener("keyup", function() {
      var email = emailInput.value;
  
      // Mengirim permintaan AJAX
      $.ajax({
        type: "POST",
        url: searchDetailUrl, // Use the route URL from the data attribute
        data: {
          _token: '{{ csrf_token() }}',
          email: email
        },
        success: function(response) {
          if (response.status === "success") {
            var namaInput = document.getElementById("nama");
            var telpInput = document.getElementById("telp");
  
            namaInput.value = response.nama;
            telpInput.value = response.telepon;
          }
        }
      });
    });
  });
  