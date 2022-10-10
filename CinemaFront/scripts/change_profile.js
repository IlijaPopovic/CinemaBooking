$(document).ready(function () {
  throw_if_not_user();

  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_client_information.php",
    data: { id: id_user },
    dataType: "json",
    success: function (data) {
      console.log(data);

      $("#name").val(data[0].name);
      $("#surname").val(data[0].surname);
      $("#date_of_birth").val(normal_date(data[0].date_of_birth));
      $("#mail").val(data[0].mail);
      $("#phone_number").val(data[0].phone_number);
      $("#user_name").val(data[0].user_name);
      $("#address").val(data[0].address);
      $("#city").val(data[0].city);
    },
  });

  $(".insert").on("click", function () {
    if (is_all_inserted()) {
      $.ajax({
        type: "POST",
        url: "http://localhost/CinemaBooking/cinema/user/change_user.php",
        data: {
          name1: $("#name").val(),
          surname: $("#surname").val(),
          date_of_birth: date_for_db($("#date_of_birth").val()),
          phone_number: $("#phone_number").val(),
          user_name: $("#user_name").val(),
          mail: $("#mail").val(),
          city: $("#city").val(),
          address: $("#address").val(),
          password: $("#password").val(),
          id: id_user,
        },
        dataType: "json",
        success: function (data) {
          if (data.status == "changed") {
            alert(data.status);
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
});

function is_all_inserted() {
  if (
    !$("#name").val() ||
    !$("#surname").val() ||
    !$("#date_of_birth").val() ||
    !$("#phone_number").val() ||
    !$("#user_name").val() ||
    !$("#mail").val() ||
    !$("#city").val() ||
    !$("#address").val() ||
    !$("#password").val() ||
    !$("#password").val() != !$("#potvrdi_sifru").val()
  ) {
    return false;
  } else {
    return true;
  }
}

function date_check() {
  //Ne radi provera datea, proveri ovo
  var regeks = new RegExp(
    "^(?:(?:31(/|-|.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(/|-|.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]d)?d{2})$|^(?:29(/|-|.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1d|2[0-8])(/|-|.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]d)?d{2})$"
  );

  alert($("#beginning").val());

  if (regeks.test($("#beginning").val())) {
    return true;
  } else {
    return false;
  }
}
