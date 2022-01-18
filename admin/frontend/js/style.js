// enrollments editing
var enrollmentId = document.getElementById("enrollmentId");
var imagePreview = document.getElementById("imagePreview");
var notChangeImg = document.getElementById("notChangeImg");
var userImg = document.getElementById("userImg");
var classId = document.getElementById("classId");
var uname = document.getElementById("uname");
// var dob = document.getElementById("dob");
// var fname = document.getElementById("fname");
// var nrcCode = document.getElementById("nrcCode");
// var township = document.getElementById("township");
// var type = document.getElementById("type");
// var nrcNumber = document.getElementById("nrcNumber");
// var email = document.getElementById("email");
// var phone = document.getElementById("phone");
// var education = document.getElementById("education");
// var address = document.getElementById("address");
var paymentMethod = document.getElementById("paymentMethod");
var paidPercent = document.getElementById("paidPercent");
var isPending = document.getElementById("isPending");
var createdAt = document.getElementById("createdAt");

// enrollments detail
var detailTitle = document.getElementById("detailTitle");
var detailName = document.getElementById("detailName");
// var detailDob = document.getElementById("detailDob");
// var detailFname = document.getElementById("detailFname");
// var detailNrc = document.getElementById("detailNrc");
// var detailEmail = document.getElementById("detailEmail");
// var detailPhone = document.getElementById("detailPhone");
// var detailEducation = document.getElementById("detailEducation");
// var detailAddress = document.getElementById("detailAddress");
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
var courseIdEdit = document.getElementById("courseIdEdit");
var courseCreatedAt = document.getElementById("courseCreatedAt");
var courseTitleEdit = document.getElementById("courseTitleEdit");
var courseCategoryIdEdit = document.getElementById("courseCategoryIdEdit");
var courseTypeIdEdit = document.getElementById("courseTypeIdEdit");
var level_or_sub = document.getElementById("level_or_sub");
var fee = document.getElementById("fee");
var discountPercent = document.getElementById("discountPercent");
var startDate = document.getElementById("startDate");
var duration = document.getElementById("duration");
var startTime = document.getElementById("startTime");
var endTime = document.getElementById("endTime");
var M = document.getElementById("M");
var Tu = document.getElementById("Tu");
var W = document.getElementById("W");
var Th = document.getElementById("Th");
var F = document.getElementById("F");
var Sa = document.getElementById("Sa");
var Su = document.getElementById("Su");

var instructor = document.getElementById("instructor");
var services = document.getElementById("services");
var note = document.getElementById("note");

// course delete
var currentCourseIdDel = document.getElementById("currentCourseIdDel");

// course detail
var detailCourseCategory = document.getElementById("detailCourseCategory");
var detailCourseType = document.getElementById("detailCourseType");
var detailCourseTitle = document.getElementById("detailCourseTitle");
var detailCourseLvlorsub = document.getElementById("detailCourseLvlorsub");
var detailCourseFee = document.getElementById("detailCourseFee");
var detailCourseInstructor = document.getElementById("detailCourseInstructor");
var detailCourseServices = document.getElementById("detailCourseServices");
var detailCourseDiscount = document.getElementById("detailCourseDiscount");
var detailCourseStartDate = document.getElementById("detailCourseStartDate");
var detailCourseDuration = document.getElementById("detailCourseDuration");
var detailCourseDays = document.getElementById("detailCourseDays");
var detailCourseFromTo = document.getElementById("detailCourseFromTo");
var detailCourseNote = document.getElementById("detailCourseNote");

let nrcArr = null;

function setCurrentEditing(event, row, idx, classIdx) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  // id_field.value = id;
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  let approved = '';
  for (var i = 0; i < tds.length; i++) {
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      if(i == 5) {
        rowArr.push(tds[i].innerHTML);
      } else {
        rowArr.push(tds[i].textContent);
      }
    }
  }
  console.log(rowArr);
  enrollmentId.value = idx;
  imagePreview.src = "../../user/backend/" + rowArr[0];
  notChangeImg.value = rowArr[0];
  classId.value = classIdx;
  uname.innerHTML = rowArr[2];
  // dob.value = rowArr[3];
  // fname.value = rowArr[4];

  // nrcArr = rowArr[5].split("/");
  // nrcCode.value = nrcArr[0];
  // getTownship(nrcArr[0]);
  // township.value = nrcArr[1].slice(0, -9);
  // type.value = nrcArr[1].slice(-9, -6);
  // nrcNumber.value = nrcArr[1].slice(-6);
  // email.value = rowArr[6];
  // education.value = rowArr[7];
  // address.value = rowArr[8].trim();
  // phone.value = rowArr[9];
  paymentMethod.value = rowArr[3];
  paidPercent.value = rowArr[4].substring(0, rowArr[4].length - 1);
  console.log(rowArr[5])
  if (rowArr[5] == "✅") {
    approved = true;
  } else if (rowArr[5] == "❌") {
    approved = false;
  }
  console.log(approved)
  isPending.checked = (approved == "1" && true) || false;
  createdAt.value = rowArr[6];
}

function setCurrentDeleting(event, row, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  console.log(tds)
  var rowArr = [];
  for (var i = 0; i < tds.length; i++) {
    if (i == 0) {
      rowArr.push(tds[i].children[0].alt);
    } else {
      rowArr.push(tds[i].textContent);
    }
  }
  console.log(rowArr[2])

  stuName.innerText = rowArr[2];
  enrollmentDeletingId.value = idx;
}

// enrollment detail show
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

  // enrollment id 
  // classId 
  detailImage.src = "../../user/backend/" + rowArr[0];
  detailTitle.innerText = rowArr[1];
  detailName.innerText = rowArr[2];
  // detailDob.innerText = rowArr[3];
  // detailFname.innerText = rowArr[4];

  // detailNrc.innerText = rowArr[5];
  // detailEmail.innerText = rowArr[6];
  // detailEducation.innerText = rowArr[7];
  // detailAddress.innerText = rowArr[8].trim();
  // detailPhone.innerText = rowArr[9];
  detailPaymentMethod.innerText = rowArr[3];
  detailPaidPercent.innerText = rowArr[4];
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

function setCurrentCourseEdit(event, row, catId, typeId) {
  $("#editingModal").modal("show");
  event.stopPropagation();
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  var days = "";
  for (var i = 0; i < tds.length; i++) {
    if (i == 7) {
      for (var j = 0; j < tds[i].children.length; j++) {
        days += tds[i].children[j].textContent + ",";
      }
      rowArr.push(days.substring(0, days.length - 1));
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  courseIdEdit.value = rowArr[0];
  courseCreatedAt.value = rowArr[14];
  courseTitleEdit.value = rowArr[1];
  courseCategoryIdEdit.value = catId;
  courseTypeIdEdit.value = typeId;
  level_or_sub.value = rowArr[4];
  fee.value = rowArr[5];
  discountPercent.value = rowArr[12];
  startDate.value = rowArr[9];
  duration.value = rowArr[10];
  startTime.value = rowArr[8].split("~")[0];
  endTime.value = rowArr[8].split("~")[1];
  if (days.includes("M")) {
    M.checked = true;
  }
  if (days.includes("Tu")) {
    Tu.checked = true;
  }
  if (days.includes("W")) {
    W.checked = true;
  }
  if (days.includes("Th")) {
    Th.checked = true;
  }
  if (days.includes("F")) {
    F.checked = true;
  }
  if (days.includes("Sa")) {
    Sa.checked = true;
  }
  if (days.includes("Su")) {
    Su.checked = true;
  }
  instructor.value = rowArr[6];
  services.textContent = rowArr[11];
  note.textContent = rowArr[13];
}

// course detail show
function setCurrentCourseDetail(row) {
  var tr = row.closest("tr");
  var tds = tr.children;
  var rowArr = [];
  var days = "";
  for (var i = 0; i < tds.length; i++) {
    if (i == 7) {
      for (var j = 0; j < tds[i].children.length; j++) {
        days += tds[i].children[j].textContent + ",";
      }
      rowArr.push(days.substring(0, days.length - 1));
    } else {
      rowArr.push(tds[i].textContent);
    }
  }

  console.log(rowArr);

  detailCourseCategory.innerText = rowArr[2];
  detailCourseType.innerText = rowArr[3];
  detailCourseTitle.innerText = rowArr[1];
  detailCourseLvlorsub.innerText = rowArr[4];
  detailCourseFee.innerText = rowArr[5];
  detailCourseInstructor.innerText = rowArr[6];
  detailCourseServices.innerText = rowArr[11];
  detailCourseDiscount.innerText = rowArr[12];
  detailCourseStartDate.innerText = rowArr[9];
  detailCourseDuration.innerText = rowArr[10];
  detailCourseDays.innerText = days;
  detailCourseFromTo.innerText = rowArr[8];
  detailCourseNote.innerText = rowArr[13];
}

function setCurrentCourseDel(event, idx) {
  $("#deletingModal").modal("show");
  event.stopPropagation();
  currentCourseIdDel.value = idx;
  console.log(idx);
}
