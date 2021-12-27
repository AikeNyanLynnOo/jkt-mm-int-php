function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var htmlPreview =
        '<img width="200" src="' +
        e.target.result +
        '" />' +
        "<p>" +
        input.files[0].name +
        "</p>";
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find(".preview-zone");
      var boxZone = $(input)
        .parent()
        .parent()
        .find(".preview-zone")
        .find(".box")
        .find(".box-body");

      wrapperZone.removeClass("dragover");
      previewZone.removeClass("hidden");
      boxZone.empty();
      boxZone.append(htmlPreview);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(".dropzone").change(function () {
  readFile(this);
  if($(".preview-zone").hasClass("hidden")) {
    console.log("hello")
    $("#ssRequired").text('');
  }
});

$(".dropzone-wrapper").on("dragover", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass("dragover");
});

$(".dropzone-wrapper").on("dragleave", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass("dragover");
});

$(document).ready(function () {
  var paymentForm = $("#paymentForm");

  $.validator.addMethod(
    "nrcNumber",
    function (value, element) {
      return this.optional(element) || /^\d{6}$/i.test(value);
    },
    "NRC number must contain only numbers"
  );

  paymentForm.validate({
    // errorElement: "span",
    errorPlacement: function(error, element) {
      if(element.attr("name") === "nrcNumber") {
        error.appendTo("#nrcNoRequired");
      } else if (element.attr("name") === "paymentImg") {
        error.appendTo("#ssRequired");
      }
    },
    rules: {
      nrcNumber: {
        required: true,
        minlength: 6,
        maxlength: 6,
        nrcNumber: true,
      },
      paymentImg: {
        required: true,
        extension: "jpg|jpeg|png"
      }
    },
    messages: {
      nrcNumber: {
        required: "NRC Number required",
      },
      paymentImg: {
        required: "Payment Screenshot required",
      }
    }
  })
})