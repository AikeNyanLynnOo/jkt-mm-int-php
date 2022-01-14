function filterByDate(e) {
//   $("#graphCanvas").remove();
  console.log(e.target.value);
  $.post(
    "filterByDate.php",
    {
      selectedFilteredDate: e.target.value,
    },
    function (data) {
      // console.log(data);
      let months = [];
      let count = [];

      for (var i in data) {
    
      }
    }
  );
}