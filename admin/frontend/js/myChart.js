function showGraph(e) {
  $("#graphCanvas").remove();
  console.log(e.target.value);
  $.post(
    "chartData.php",
    {
      selectedId: e.target.value,
    },
    function (data) {
      // console.log(data);
      let months = [];
      let count = [];

      for (var i in data) {
        months.push(data[i].date);
        count.push(data[i].count);
      }

      var chartData = {
        labels: months,
        datasets: [
          {
            label: "Student By Month",
            backgroundColor: "#49e2ff",
            borderColor: "#46d5f1",
            hoverBackgroundColor: "#CCCCCC",
            hoverBorderColor: "#666666",
            data: count,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "graphCanvas",
      });
      $("#canvasArea").append(newCanvas);
      var graphTarget = $("#graphCanvas");
      var barGraph = new Chart(graphTarget, {
        type: "bar",
        data: chartData,
      });
    }
  );
}
