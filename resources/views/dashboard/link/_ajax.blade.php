<script>
	$(function () {
		$("select.item_schema").change(function () {
			if($(this).val() != $(this).attr("data-original-schema")) {
				$(this).siblings('.btn-apply').show();
			}
		});

		$('.btn-apply').click(function () {
			var btn = $(this);
            var tRowId = $(this).parents("tr").attr("data-id");
            var schema_id = $(this).siblings('select').val();

            $.ajaxSetup({
            	headers: {
            		'X-XSRF-TOKEN': "{{ csrf_token() }}"
            	}
            });

            $.ajax({
            	url: "{{ url('dashboard/links/set-item-schema') }}",
            	data: {link_id: tRowId, item_schema_id: schema_id, _token: "{{ csrf_token() }}", _method: "patch"},
            	method: "post",
            	dataType: "json",

            	success: function (response) {
            		alert(response.msg);
            		btn.hide();
            	}
            });
        });

        $(".btn-scrape").click(function () {
        	var btn = $(this);

            btn.find(".fast-right-spinner").show();
            btn.prop("disabled", true);

            var tRowId = $(this).parents("tr").attr("data-id");

            $.ajaxSetup({
            	headers: {
            		'X-XSRF-TOKEN': "{{ csrf_token() }}"
            	}
            });

            $.ajax({
            	url: "{{ url('dashboard/links/scrape') }}",
            	data: {link_id: tRowId, _token: "{{ csrf_token() }}"},
            	method: "post",
            	dataType: "json",

            	success: function (response) {
            		if(response.status == 1) {
            			$(".alert").removeClass("alert-danger").addClass("alert-success").text(response.msg).show();
            		} else {
            			$(".alert").removeClass("alert-success").addClass("alert-danger").text(response.msg).show();
            		}
            		btn.find(".fast-right-spinner").hide();
            	}
            });
        });
    });
</script>