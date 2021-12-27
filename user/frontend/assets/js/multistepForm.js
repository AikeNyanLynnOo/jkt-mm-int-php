function Ascending_sort(a, b) {
  return $(b).text().toUpperCase() < $(a).text().toUpperCase() ? 1 : -1;
}

var today = new Date();
var maxMonth = today.getMonth() + 1;     // getMonth() is zero-based
var maxDay = today.getDate();
var maxYear = today.getFullYear();
var minYear = today.getFullYear() - 70;
maxMonth = maxMonth < 10 ? '0' + maxMonth.toString() : maxMonth;
maxDay = maxDay < 10 ? '0' + maxDay.toString() : maxDay;

var maxDate = maxYear + '-' + maxMonth + '-' + maxDay;
$('#dob').attr('max', maxDate);
var minDate = minYear + '-' + 1 + '-' + 1;
$('#dob').attr('min', minDate);

var nrc = {
  init: function () {
    $("select#nrcCode").change(function () {
      var stateNumber = $(this).children("option:selected").val();
      // console.log(stateNumber);
      nrc.load_townshipName(stateNumber);
    });
  },
  load_townshipName: function (id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./nrc.php", true);
    xhr.onload = function () {
      var nrcJson = JSON.parse(xhr.responseText);
      nrcJson.sort((a, b) => (a.name_en > b.name_en ? 1 : -1));
      nrcJson.forEach((value) => {
        // console.log(value)
        var option = document.createElement("option");
        if (id === value.nrc_code) {
          console.log(value)
          option.innerText = value.name_en + " - " + value.name_mm;
          option.setAttribute("value", value.name_en + " - " + value.name_mm);
          document.getElementById("township").appendChild(option);
        }
      });
    };
    xhr.send();
  },
};

nrc.init();

$(document).ready(function () {
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;
  // var userInfo = document.getElementById("userInfo");

  setProgressBar(current);

  $.validator.addMethod(
    "usernameRegex",
    function (value, element) {
      return this.optional(element) || /^([a-zA-Z]{1,}[ ]{0,1})*$/i.test(value);
    },
    "Username must contain only letters"
  );

  $.validator.addMethod(
    "phoneRegex",
    function (value, element) {
      return (
        this.optional(element) || /^[0][9]\d{8,10}$/i.test(value)
      );
    },
    "Your phone number's format is invalid"
  );

  $.validator.addMethod(
    "nrcNumber",
    function (value, element) {
      return this.optional(element) || /^\d{6}$/i.test(value);
    },
    "NRC number must contain only numbers"
  );

  $(".next").click(function () {
    // current_fs = $(this).parent();
    // next_fs = $(this).parent().next();

    var form = $("#enrollmentForm");

    form.validate({
      errorElement: "p",
      errorClass: "help-block",
      highlight: function (element, errorClass, validClass) {
        $(element).closest(".fieldlabels").addClass("has-error");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).closest(".fieldlabels").removeClass("has-error");
      },
      rules: {
        photo: {
          required: true,
        },
        uname: {
          required: true,
          usernameRegex: true,
          minlength: 4,
        },
        bod: {
          required: true,
          // CheckDOB: true,
        },
        fname: {
          required: true,
          usernameRegex: true,
          minlength: 3,
        },
        nrcCode: {
          required: true,
        },
        township: {
          required: true,
        },
        type: {
          required: true,
        },
        nrcNumber: {
          required: true,
          minlength: 6,
          maxlength: 6,
          nrcNumber: true,
        },
        email: {
          required: false,
        },
        phone: {
          required: true,
          phoneRegex: true,
          // minlength: 10,
        },
        address: {
          required: true,
          minlength: 8,
        },
        edu: {
          required: true,
          minlength: 8,
        },
        className: {
          required: true,
        },
        classTime: {
          required: true,
        },
        bank: {
          required: true,
        },
      },
      messages: {
        photo: {
          required: "Photo required",
        },
        uname: {
          required: "Full name required",
        },
        bod: {
          required: "Date of birth required",
        },
        fname: {
          required: "Father name required",
        },
        nrcCode: {
          required: "State required",
        },
        township: {
          required: "Township required",
        },
        type: {
          required: "Type required",
        },
        nrcNumber: {
          required: "NRC number required",
        },
        phone: {
          required: "Phone number required",
        },
        address: {
          required: "Address required",
        },
        edu: {
          required: "Education required",
        },
        className: {
          required: "Select the class category",
        },
        classTime: {
          required: "Select the class time",
        },
        bank: {
          required: "Select banking system",
        },
      },
      errorPlacement: function (error, element) {
        if (element.is(":radio")) {
          error.appendTo(element.parents(".bank-container"));
        } else {
          // This is the default behavior
          error.insertAfter(element);
        }
      },
      onfocusout: function (element) {
        if (!this.checkable(element)) {
          this.element(element);
        }
      },
    });
    if (form.valid() === true) {
      let progressbar = document.getElementById("progressbar");
      if ($("#userInformation").is(":visible")) {
        //Add Class Active
        current_fs = $("#userInformation");
        next_fs = $("#classInformation");
        $("#progressbar li")
          .eq($("fieldset").index(next_fs))
          .addClass("active");
        setProgressBar(++current);
      } else if ($("#classInformation").is(":visible")) {
        current_fs = $("#classInformation");
        next_fs = $("#paymentMethod");
        $("#progressbar li")
          .eq($("fieldset").index(next_fs))
          .addClass("active");
        setProgressBar(++current);
      } else if ($("#paymentMethod").is(":visible")) {
        var atLeastOneChecked = false;
        const bankRadioButtons = document.querySelectorAll('input[name="bank"]');
        for(let bank of bankRadioButtons) {
          if(bank.checked) {
            atLeastOneChecked = true;
            break;
          }
        }
        if(atLeastOneChecked === true) {
          current_fs = $("#paymentMethod");
          next_fs = $("#success");
          $("#progressbar li")
            .eq($("fieldset").index(next_fs))
            .addClass("active");
          setProgressBar(++current);
          form.submit();
        } else {
          $("#radioMsg").html(
            "<span class='help-block radio-alert' id='error'>" +
              "Please Choose at least one banking system</span>"
          );
        }
      } else if ($("#success").is(":visible")) {
        current_fs = $("#success");
        setProgressBar(++current);
        // $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
      }
      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate(
        { opacity: 0 },
        {
          step: function (now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
              display: "none",
              position: "relative",
            });
            next_fs.css({ opacity: opacity });
          },
          duration: 500,
        }
      );
    }
  });

  $(".previous").click(function () {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    console.log(current_fs);
    //Remove class active
    $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          previous_fs.css({ opacity: opacity });
        },
        duration: 500,
      }
    );
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").css("width", percent + "%");
  }

  $(".submit").click(function () {
    return false;
  });
});
