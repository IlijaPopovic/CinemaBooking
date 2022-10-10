$(document).ready(function () {
  throw_if_not_admin();
  id_hall = window.location.search.substring(4);
  var old_hall_picture = "";

  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_all_cinemas_and_technologies.php",
    data: {},
    dataType: "json",
    success: function (data) {
      console.log(data);

      $.each(data[0], function (key, value) {
        $("#cinema_id").append(
          '<option value="' + value.id + '">' + value.cinema + "</option>"
        );
      });

      $.each(data[1], function (key, value) {
        $("#technology_id").append(
          '<option value="' + value.id + '">' + value.technology + "</option>"
        );
      });
    },
  });

  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_hall.php",
    data: { id: id_hall },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $("#name").val(data[0].name);
      $("#number_seat").val(data[0].number_seats);
      $("#number_rows").val(data[0].number_rows);
      $("#number_vip_rows").val(data[0].number_vip_rows);
      $("#screen_size").val(data[0].screen_size);
      $("#cinema_id").val(data[0].cinema_id);
      $("#technology_id").val(data[0].technology_id);
      old_hall_picture = data[0].hall_picture;
    },
  });

  $(".insert").on("click", function () {
    if (is_all_inserted()) {
      var post_data = new FormData();
      var hall_picture = $("#hall_picture")[0].files[0];
      console.log(hall_picture);
      post_data.append("hall_picture", hall_picture);
      post_data.append("name", $("#name").val());
      post_data.append("number_seat", $("#number_seat").val());
      post_data.append("number_rows", $("#number_rows").val());
      post_data.append("number_vip_rows", $("#number_vip_rows").val());
      post_data.append("cinema_id", $("#cinema_id").val());
      post_data.append("technology_id", $("#technology_id").val());
      post_data.append("screen_size", $("#screen_size").val());
      post_data.append("old_hall_picture", old_hall_picture);
      post_data.append("hall_id", id_hall);
      for (var key of post_data.entries()) {
        console.log(key[0] + ", " + key[1]);
      }

      $.ajax({
        url: "http://localhost/CinemaBooking/cinema/user/change_hall.php",
        type: "post",
        data: post_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
          console.log(data);
          if (data.status == "changed") {
            alert("changed");
          } else {
            alert(data.status);
          }
        },
      });
    } else {
      alert("You did not enter data correctly");
    }
  });

  function is_all_inserted() {
    if (
      !$("#name").val() ||
      $("#cinema_id").val() == "choose" ||
      $("#technology_id").val() == "choose" ||
      isNaN($("#number_seat").val()) ||
      isNaN($("#number_rows").val()) ||
      isNaN($("#number_vip_rows").val())
    ) {
      return false;
    } else {
      return true;
    }
  }
});
