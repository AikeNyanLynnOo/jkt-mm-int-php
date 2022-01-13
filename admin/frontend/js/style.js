// enrollments editing
var enrollmentId = document.getElementById("enrollmentId");
var imagePreview = document.getElementById("imagePreview");
var notChangeImg = document.getElementById("notChangeImg");
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
var createdAt = document.getElementById("createdAt");

// enrollments detail
var detailTitle = document.getElementById("detailTitle");
var detailName = document.getElementById("detailName");
var detailDob = document.getElementById("detailDob");
var detailFname = document.getElementById("detailFname");
var detailNrc = document.getElementById("detailNrc");
var detailEmail = document.getElementById("detailEmail");
var detailPhone = document.getElementById("detailPhone");
var detailEducation = document.getElementById("detailEducation");
var detailAddress = document.getElementById("detailAddress");
var detailPaymentMethod = document.getElementById("detailPaymentMethod");
var detailPaidPercent = document.getElementById("detailPaidPercent");
var pendingBadge = document.getElementById("pendingBadge");

// deleting
var stuName = document.getElementById("stuName");
var enrollmentDeletingId = document.getElementById("enrollmentDeletingId");

// category edit and delete
var catCreatedAt = document.getElementById("catCreatedAt");
var catUpdatedAt = document.getElementById("catUpdatedAt");
var catIdEdit = document.getElementById("catIdEdit");
var catTitle = document.getElementById("catTitle");
var catIdDel = document.getElementById("catIdDel");

// type edit and delete
var typeCreatedAt = document.getElementById("typeCreatedAt");
var typeUpdatedAt = document.getElementById("typeUpdatedAt");
var typeIdEdit = document.getElementById("typeIdEdit");
var typeTitle = document.getElementById("typeTitle");
var typeIdDel = document.getElementById("typeIdDel");

// courses edit



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
  notChangeImg.value = rowArr[0];
  classId.value = classIdx;
  uname.value = rowArr[2];
  dob.value = rowArr[3];
  fname.value = rowArr[4];

  nrcArr = rowArr[5].split("/");
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
  createdAt.value = rowArr[13];
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

function setCurrentDeleting(row, idx) {
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

  stuName.innerText = rowArr[2];
  enrollmentDeletingId.value = idx;
}

function setCurrentDetail(row) {
  var tds = row.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  detailImage.src = "../../user/backend/" + rowArr[0];
  detailTitle.innerText = rowArr[1];
  detailName.innerText = rowArr[2];
  detailDob.innerText = rowArr[3];
  detailFname.innerText = rowArr[4];

  detailNrc.innerText = rowArr[5];
  detailEmail.innerText = rowArr[6];
  detailEducation.innerText = rowArr[7];
  detailAddress.innerText = rowArr[8];
  detailPhone.innerText = rowArr[9];
  detailPaymentMethod.innerText = rowArr[10];
  detailPaidPercent.innerText = rowArr[11];
  if (rowArr[12] == "1") {
    pendingBadge.innerText = "Pending";
    pendingBadge.style.backgroundColor = "#ff6347";
  } else {
    pendingBadge.innerText = "Studying";
    pendingBadge.style.backgroundColor = "#3b5998";
  }
}

function setCurrentCatEdit(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  catIdEdit.value = rowArr[0];
  catTitle.value = rowArr[1];
  catCreatedAt.value = rowArr[2];
  catUpdatedAt.value = rowArr[3];
}
function setCurrentCatDel(idx) {
  catIdDel.value = idx;
}
function setCurrentTypeEdit(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    rowArr.push(tds[i].textContent);
  }
  typeIdEdit.value = rowArr[0];
  typeTitle.value = rowArr[1];
  typeCreatedAt.value = rowArr[2];
  typeUpdatedAt.value = rowArr[3];
}
function setCurrentTypeDel(idx) {
  typeIdDel.value = idx;
}
