$(document).ready(function () {
  throw_if_not_admin();
  $(".insert").on("click", function () {
    if (is_all_inserted()) {
      $.ajax({
        type: "GET",
        url: "http://localhost/CinemaBooking/cinema/user/insert_technology.php",
        data: {
          technology_name: $("#technology_name").val(),
          technology_price: $("#technology_price").val(),
          technology_discount: $("#technology_discount").val(),
        },
        dataType: "json",
        success: function (data) {
          if (data.status == "inserted") {
            alert(data.status);
            $(":input").val("");
          }
        },
        error: function (xhr, status, error) {
          alert(status);
          alert(xhr.responseText);
          alert(error);
        },
      });
    } else {
      alert("You did not enter data correctly");
    }
  });

  function is_all_inserted() {
    if (
      !$("#technology_name").val() ||
      !$("#technology_price").val() ||
      !$("#technology_discount").val() ||
      isNaN($("#technology_price").val()) ||
      isNaN($("#technology_discount").val())
    ) {
      return false;
    } else {
      return true;
    }
  }
});
