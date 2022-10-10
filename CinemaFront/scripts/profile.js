$(document).ready(function () {
  throw_if_not_user();

  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_client_information.php",
    data: { id: id_user },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $(".table_user").append(
        "<tr>\
                    <td>Name: </td>\
                    <td>" +
          data[0].name +
          "</td>\
                </tr>\
                <tr>\
                    <td>Surname: </td>\
                    <td>" +
          data[0].surname +
          "</td>\
                </tr>\
                <tr>\
                    <td>Korisnicko name: </td>\
                    <td>" +
          data[0].user_name +
          "</td>\
                </tr>\
                <tr>\
                    <td>Mail: </td>\
                    <td>" +
          data[0].mail +
          "</td>\
                </tr>\
                <tr>\
                    <td>Date of birth: </td>\
                    <td>" +
          normal_date(data[0].date_of_birth) +
          "</td>\
                </tr>\
                <tr>\
                    <td>Telephone number: </td>\
                    <td>" +
          data[0].phone_number +
          "</td>\
                </tr>\
                <tr>\
                    <td>Address: </td>\
                    <td>" +
          data[0].address +
          ", " +
          data[0].city +
          "</td>\
                </tr>"
        // <tr>\
        //     <td>number skupljenih bodova: </td>\
        //     <td>' + data[0].br_bodova + '</td>\
        // </tr>'
      );
    },
  });

  fill_reservation_table();
});

$(".log_out").on("click", function () {
  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/log_out.php",
    data: {},
    dataType: "json",
    success: function (data) {
      console.log("USPEP");
      if (data.status == "logged_out") {
        alert("logged_out");
        window.location.replace("login.php"); // ZA MENJATI
      } else {
        alert("error");
      }
    },
  });
});

$(document).on("click", ".cancel", function () {
  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/delete_client_reservation.php",
    data: { reserved_place_id: $(this).attr("data-idseats") },
    dataType: "json",
    success: function (data) {
      alert("Reservation canceled");
      fill_reservation_table();
    },
  });
});

function fill_reservation_table() {
  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_client_reservations.php",
    data: { id: id_user },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $(".table_reservation tbody").empty();
      $(".table_reservation thead").empty();

      if (data.length != 0) {
        $(".table_reservation thead").append(
          "<tr>\
                        <th>Movie name</th>\
                        <th>date and time</th>\
                        <th>Cinema</th>\
                        <th>Hall</th>\
                        <th>row</th>\
                        <th>Seat</th>\
                        <th>Cancel</th>\
                    </tr>"
        );

        $.each(data, function (key, value) {
          console.log(value.movie_id);
          $(".table_reservation tbody").append(
            '\
                            <tr>\
                                <td> <a href="movie.php?id=' +
              value.movie_id +
              '">' +
              value.movie_name +
              "</a></td>\
                                <td>" +
              normal_date_and_time(value.projection_date) +
              "h</td>\
                                <td>" +
              value.cinema +
              "</td>\
                                <td>" +
              value.name +
              "</td>\
                                <td>" +
              value.row_seat +
              "</td>\
                                <td>" +
              value.number_seat +
              '</td>\
                                <td> <button class="cancel" data-idseats="' +
              value.id +
              '"> cancel </button> </td>\
                            </tr>\
                        '
          );
        });
      } else {
        $(".table_reservation thead").append("User has no reservation");
      }
    },
  });
}

$(document).on("click", ".change", function () {
  window.location.replace("change_profile.php?id=" + id_user);
});
