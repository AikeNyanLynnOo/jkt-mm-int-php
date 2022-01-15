// $(document).ready(function () {
//   $("#filterByDate").change(function () {
//     let chosenData = $(this).val();
//     $.post(
//       "filterByDate.php",
//       {
//         selectedFilteredDate: chosenData,
//       },
//       function (data) {
//         $("#dataTable").DataTable().row.add({
//           "id": `${data.enrollment_id}`,
//           "photo": `${data.photo}`,
//           "course": `${data.title} - ${data.level_or_sub}`,
//           "name": `${data.uname}`,
//           "dateOfBirth": `${data.dob}`,
//           "fatherName": `${data.fname}`,
//           "nrc": `${data.nrc}`,
//           "email": `${data.email}`,
//           "education": `${data.education}`,
//           "address": `${data.address}`,
//           "phone": `${data.phone}`,
//           "payment": `${data.payment_method}`,
//           "paidPercent": `${data.paid_percent}`,
//           "isPending": `${data.is_pending}`,
//           "created_at": `${data.created_at}`,
//           "updated_at": `${data.updated_at}`,
//           "edit" : `<button class="tb-btn" onclick="setCurrentEditing(event,this,<?php echo $row['enrollment_id'] ?>,<?php echo $row['course_id'] ?>)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button>`,
//           "delete" : `<button class="tb-btn" onclick="setCurrentDeleting(event,this,<?php echo $row['enrollment_id'] ?>)" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></i></button>`
//         });
//         $("#dataTable").DataTable({
//           // destroy : true,
//           language : {
//             processing: "Processing...",
//             loadingRecords: "Loading...",
//             paginate: {
//               first: "&lsaquo;",
//               last: "&rsaquo;",
//               next: "&raquo;",
//               previous: "&laquo;",
//             },
//           },
//           columns : [
//             { targets: "photo-dt", data: "photo" },
//             { targets: "course-dt", data: "course" },
//             { targets: "uname-dt", data: "name" },
//             { targets: "dob-dt", data: "dateOfBirth" },
//             { targets: "fname-dt", data: "fatherName" },
//             { targets: "nrc-dt", data: "nrc" },
//             { targets: "email-dt", data: "email" },
//             { targets: "education-dt", data: "education" },
//             { targets: "address-dt", data: "address" },
//             { targets: "phone-dt", data: "phone" },
//             { targets: "payment-method-dt", data: "payment" },
//             { targets: "paid-percent-dt", data: "paidPercent" },
//             { targets: "is-pending-dt", data: "isPending" },
//             { targets: "created-at-dt", data: "created_at" },
//             { targets: "updated-at-dt", data: "updated_at" },
//             { targets: "edit-dt", data: "edit" },
//             { targets: "delete-dt", data: "delete" },
//           ] 
//         });
//         // $("#dataTable").DataTable().clear().destroy();
//         console.log(data);
//         //   filterByDateTable.clear().destroy();
        
//       }
//     );
//   });
// });