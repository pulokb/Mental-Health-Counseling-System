<script>
    $(document).ready(function() {
        $('body').on('click', '.delete', function() {
            var dataTable = $('#data-table').DataTable();
            var id = $(this).data("id");
            if (confirm("{{ __('Are you sure to delete') }} ?")) {
                $.ajax({
                    type: 'DELETE',
                    url: "/{{ config('admin.admin_route_prefix') }}/{{ $url }}/" + id,
                    success: function(data) {
                        dataTable.draw();
                    },
                    error: function(data) {}
                });
            }
        });
    });
</script>
