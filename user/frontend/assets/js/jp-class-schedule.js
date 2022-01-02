$(document).ready(function() {
    $(".detail").click(function () {
        $("#modal_days").html('');
        var rowId = $(this).parent().parent().attr('id');
        console.log(rowId);
        var days = $(this).closest("tr").find(".days"); 
        var data = document.getElementById(rowId).querySelectorAll(".row-data");
        let category_title = data[0].innerHTML;
        let type_title = data[1].innerHTML;
        let course_level = data[2].innerHTML;
        let instructor = data[3].innerHTML;
        let services = data[4].innerHTML;
        let discount_percent = data[5].innerHTML;
        let course_title = data[6].innerHTML;
        let section_hour = data[7].innerHTML;
        let price = data[8].innerHTML;
        let duration = data[9].innerHTML;
        let start_date = data[10].innerHTML;

        $("#modal_course_title").text(course_title);
        $("#modal_category_title").text(category_title);
        $("#modal_level").text(course_level);
        $("#modal_type_title").text(type_title);
        $("#modal_time").addClass('modal-badges section-hour').text(section_hour);
        $("#modal_instructor").addClass('modal-badges instructor').text(instructor);
        $("#modal_fees").text(price);
        $("#modal_duration").text(duration);
        $("#modal_start_date").text(start_date);
        $("#modal_services").text(services);
        discount_percent = discount_percent <= 0 ? '-' : discount_percent + "%";
        $("#modal_discount_percent").text(discount_percent);
        console.log(days, days.length)
        for(let i=0; i<days.length; i++) {
            let day = days[i].innerHTML; 
            let badges;
            console.log(i, day)
            switch(day) {
                case "Sat":
                case "Sun":
                    badges = "weekend";
                    break;
                default:
                    badges = "weekday";                          
              }
            let append_day_modal = `<span class="${badges} modal-badges">${day}</span>`
            $("#modal_days").append(append_day_modal);
        }
    })
})