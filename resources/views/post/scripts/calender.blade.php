<script>
    
$(document).ready(function() {
    loadCalender();
});
function loadCalender() {
    $('.publish-date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        format: "yyyy-mm-dd",
        autoclose: true
    });
}


</script>