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

  paymentForm.validate({
    errorElement: "p",
    errorClass: "payment-confirm-warning",
    highlight: function (element, errorClass, validClass) {
      $(element).closest(".payment-input").addClass("has-error");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest(".payment-input").removeClass("has-error");
    },
    rules: {
      nrcNumber: {
        required: true,
      },
      paymentImg: {
        required: true,
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