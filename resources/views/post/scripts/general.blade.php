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
            { data: 'status' },
            { data: 'actions' },
        ],
    });

    $('#post-filter-form').submit(function (e) {
        e.preventDefault();
        data_table.draw();
    });

    $(document).on('click', '.comment-count', function () {
        var postId = $(this).data('id');
        $.ajax({
            url: "{{route('getPostComments')}}",
            method: 'GET',
            data: {
                postId: postId
            },
            success: function (data) {
                $('#commentContent').html(data);
                $('#commentModal').modal('show');
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    });

    $(document).keydown(function(e) {
    // ESCAPE key pressed
        if (e.keyCode == 27) {
            $('#commentModal').one('shown.bs.modal', function () {
                $(this).modal('hide');
            }).modal('show');
        }
    });

});

$(".post-filter").on("change input", function () {
    $("#post-filter-form").submit();
});

$(function() {
    $('#publish_date').daterangepicker({
        opens: 'left',
        locale: {
        format: 'MMM DD, YYYY'
        },
        autoUpdateInput: false,
        ranges: {
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    $('#publish_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY') + ' - ' + picker.endDate.format('MMM DD, YYYY'));
        $("#post-filter-form").submit();
    });

    $('#publish_date').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $("#post-filter-form").submit();
    });

    $('.publish-date').on('change', function() {
        $("#post-filter-form").submit();
    });

    $('#reset').on('click', function() {
        $('#post-filter-form input, #post-filter-form select, #post-filter-form search').val('');
        $("#post-filter-form").submit();
    });

});

$(document).on('click', '.show-comments', function(event) {
    if($(".show-comments").text() == 'Show all comments'){
        $(".show-comments").text("Hide all comments");
    } else {
        $(".show-comments").text("Show all comments");
    }
    $('.comments').toggle("slide");
});
</script>