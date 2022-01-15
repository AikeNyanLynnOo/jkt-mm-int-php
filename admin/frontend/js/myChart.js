$(document).ready(function () {
  showStuByMonths();
  showStuByCourses();
});

function showStuByMonths(e) {
  $("#stuByMonths").remove();
  //   console.log(e.target.value);
  $.post(
    "chartData.php",
    {
      selectedId: (e && e.target.value) || 5,
      currentShowing: "stuByMonths",
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
            label: "Students By Month",
            backgroundColor: "#49e2ff",
            borderColor: "#46d5f1",
            hoverBackgroundColor: "#CCCCCC",
            hoverBorderColor: "#666666",
            data: count,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "stuByMonths",
      });
      $("#stuByMonthsArea").append(newCanvas);
      var graphTarget = $("#stuByMonths");
      var barGraph = new Chart(graphTarget, {
        type: "bar",
        data: chartData,
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    }
  );
}
function showStuByCourses(e) {
  $("#stuByCourses").remove();
  //   console.log(e.target.value);
  $.post(
    "chartData.php",
    {
      selectedId: (e && e.target.value) || 5,
      currentShowing: "stuByCourses",
    },
    function (data) {
      // console.log(data);
      let categories = [];
      let count = [];

      for (var i in data) {
        categories.push(data[i].category);
        count.push(data[i].count);
      }

      let chartData = {
        labels: categories,
        datasets: [
          {
            label: "Students By Courses",
            data: count,
            backgroundColor: [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)",
            ],
            hoverOffset: 4,
          },
        ],
      };
      var newCanvas = $("<canvas/>", {
        id: "stuByCourses",
      });
      $("#stuByCoursesArea").append(newCanvas);
      var graphTarget = $("#stuByCourses");
      var doughnut = new Chart(graphTarget, {
        type: "doughnut",
        data: chartData,
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    }
  );
}
