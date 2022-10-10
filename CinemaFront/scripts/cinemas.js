$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "http://localhost/CinemaBooking/cinema/user/get_cinemas.php",
    data: {},
    dataType: "json",
    success: function (data) {
      console.log(data);
      $.each(data, function (key, value) {
        $(".main").append(
          '<article class="article">\
                    <div class="container">\
                        <div class="image">\
                            <img src="http://localhost/CinemaBooking/cinema/user/images/' +
            value.cinema_picture +
            '" alt="">\
                        </div>\
                        <div class="informations">\
                            <h3>' +
            value.name +
            "</h3>\
                            <p>" +
            value.address +
            " <br>\
                            " +
            value.city +
            " <br>\
                            " +
            value.phone_number +
            '</p>\
                        </div>\
                        <div class="more">\
                            <p><a href="cinema.php?id=' +
            value.id +
            '">Cinema details</a></p>\
                        </div>\
                    </div>\
                </article>'
        );
      });
    },
  });
});
