// enrollments detail
// var detailTitle = document.getElementById("detailTitle");
var detailName = document.getElementById("detailName");
var detailDob = document.getElementById("detailDob");
var detailFname = document.getElementById("detailFname");
var detailNrc = document.getElementById("detailNrc");
var detailEmail = document.getElementById("detailEmail");
var detailPhone = document.getElementById("detailPhone");
var detailEducation = document.getElementById("detailEducation");
var detailAddress = document.getElementById("detailAddress");


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
  console.log(rowArr)

  detailImage.src = "../../user/backend/" + rowArr[0];
  detailName.innerText = rowArr[1];
  detailDob.innerText = rowArr[2];
  detailFname.innerText = rowArr[3];

  detailNrc.innerText = rowArr[4];
  detailEmail.innerText = rowArr[5];
  detailEducation.innerText = rowArr[6];
  detailAddress.innerText = rowArr[7];
  detailPhone.innerText = rowArr[8];
}