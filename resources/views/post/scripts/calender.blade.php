<script>
$(document).ready(function() {
    loadCalender();
});
function loadCalender() {
    $('.publish-date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        format: "dd/mm/yyyy",
        autoclose: true
    });
}
</script>