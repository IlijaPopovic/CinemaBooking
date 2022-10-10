$(document).ready(function () {
  throw_if_not_admin();

  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_pricelist.php",
    data: {},
    dataType: "json",
    success: function (data) {
      console.log(data);

      $("#pricelist_text").val(data[0].text);
    },
  });

  $(".insert").on("click", function () {
    $.ajax({
      type: "GET",
      url: "http://localhost/CinemaBooking/cinema/user/change_pricelist.php",
      data: { text: $("#pricelist_text").val() },
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.status == "changed") {
          alert("Text changed");
        }
      },
    });
  });
});
