<script>
$(document).ready(function () {
    
    $.fn.serializeObject = function () {
        var obj = {};
        $.each(this.serializeArray(), function (i, o) {
            var n = o.name, v = o.value;

            obj[n] = obj[n] === undefined ? v
                : $.isArray(obj[n]) ? obj[n].concat(v)
                    : [obj[n], v];
        });
        return obj;
    };


    var data_table = $('.postsTable').DataTable({
        "searching": false,
        processing: true,
        serverSide: true,
        order: [[2, 'desc']],
        "pageLength": 25,
        ajax: {
            url: "{{route('getAllPosts')}}",
            data: function (result) {
                result.filter = $('#post-filter-form').serializeObject();
            }
        },
        columns: [
            { data: 'no' },
            { data: 'title' },
            { data: 'content' },
            { data: 'publish_date' },
            { data: 'author' },
            { data: 'comments' },
            { data: 'actions' },
        ],
    });

    $('#post-filter-form').submit(function (e) {
        e.preventDefault();
        data_table.draw();
    });

});

$(".post-filter").on("change input", function () {
    $("#post-filter-form").submit();
});

$('.chosen-select').chosen({
    width: "208px"
});

</script>