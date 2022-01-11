var enrollmentId = document.getElementById("enrollmentId");
var imagePreview = document.getElementById("imagePreview");
var userImg = document.getElementById("userImg");
var classId = document.getElementById("classId");
var uname = document.getElementById("uname");
var dob = document.getElementById("dob");
var fname = document.getElementById("fname");
var nrcCode = document.getElementById("nrcCode");
var township = document.getElementById("township");
var type = document.getElementById("type");
var nrcNumber = document.getElementById("nrcNumber");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var education = document.getElementById("education");
var address = document.getElementById("address");
var paymentMethod = document.getElementById("paymentMethod");
var paidPercent = document.getElementById("paidPercent");
var isPending = document.getElementById("isPending");
let nrcArr = null;

function setCurrentEditing(row, idx, classIdx) {
  // id_field.value = id;
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  enrollmentId.value = idx;
  imagePreview.src = "../../user/backend/" + rowArr[0];
  //   userImg.value = rowArr[0];
  classId.value = classIdx;
  uname.value = rowArr[2];
  dob.value = rowArr[3];
  fname.value = rowArr[4];

  nrcArr = rowArr[5].split("/");
  console.log(nrcArr[1].slice(0, -9));
  nrcCode.value = nrcArr[0];
  getTownship(nrcArr[0]);
  township.value = nrcArr[1].slice(0, -9);
  type.value = nrcArr[1].slice(-9, -6);
  nrcNumber.value = nrcArr[1].slice(-6);
  email.value = rowArr[6];
  education.value = rowArr[7];
  address.value = rowArr[8];
  phone.value = rowArr[9];
  paymentMethod.value = rowArr[10];
  paidPercent.value = rowArr[11];
  isPending.checked = (rowArr[12] == "1" && true) || false;
}

function getTownship(state) {
  let selected_township = nrcArr[1].slice(0, -9);
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./nrc.php", true);
  xhr.onload = function () {
    var nrcJson = JSON.parse(xhr.responseText);
    nrcJson.sort((a, b) => (a.name_en > b.name_en ? 1 : -1));
    $("#township").html(`<option value="" selected disabled>Township</option>`);
    nrcJson.forEach((value) => {
      var option = document.createElement("option");
      if (state == value.nrc_code) {
        let township = value.name_en + " - " + value.name_mm;
        option.innerText = township;
        option.setAttribute("value", township);
        document.getElementById("township").appendChild(option);
        if (selected_township === township) {
          $(`#township option[value='${township}'`).prop("selected", true);
        }
      }
    });
  };
  xhr.send();
}

nrcCode.addEventListener("change", function (e) {
  getTownship(e.target.value);
});
userImg.addEventListener("change", function (e) {
  const [file] = userImg.files;
  if (file) {
    imagePreview.src = URL.createObjectURL(file);
  }
});
