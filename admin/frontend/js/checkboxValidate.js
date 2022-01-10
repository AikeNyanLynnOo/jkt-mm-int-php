$(document).ready(function () {
    $("#course_submit").click(() => {
        var selected_data = 0;
        var days = document.getElementsByName("days[]");
        console.log(days[0].checked)
        for(let i=0; i<days.length; i++) {
            // console.log(days)
            if(days[i].checked) {
                selected_data++;
            }
        }
        if(selected_data <= 0) {
            $("#dayCheckErr").text("Please select at least one!");
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.focus()
            })
            // document.getElementById("M").autofocus;
        } else {
           $("#courseForm").submit();
        }
    })
})