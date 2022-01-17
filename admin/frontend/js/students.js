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

// function decryptUsingAES256(para) {
//   let _key = CryptoJS.enc.Utf8.parse('JKT-2019-20IT85-MM-JP');
//   let _iv = CryptoJS.enc.Utf8.parse('JKT-2019-serV1ce-MM-JP');
  
//   this.decrypted = CryptoJS.AES.decrypt(
//     para, _key, {
//       keySize: 16,
//       iv: _iv,
//       mode: CryptoJS.mode.CBC,
//       padding: CryptoJS.pad.Pkcs7
//     }).toString(CryptoJS.enc.Utf8);
//     return this.decrypted
// }

$(document).ready(function () {
  const params = new URLSearchParams(window.location.search);
  let getParam = params.get('id');
  // let table = $("#dataTable").DataTable();
  let decrypted = '';

  $.post(
    "decrypt.php", {
      encryptedId: getParam 
    },
    function (data) {
      $("#dataTable").DataTable().column(4)
      .search(data.toString()).draw();
    }
   )
})