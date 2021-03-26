$(document).ready(function () {
	//console.log("123")
   	$('#searchForm').on('submit', function (e) {
        filterParam = $('#searchForm').serializeArray();
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     	console.log(filterParam)
        $.ajax({
            type: 'POST',
            url: '/tasks/search/',
            data: filterParam,
            success: function (data) {
                if (data) {
                   // $('#senderror').hide();
                 //   $('#sendmessage').show();
                      //console.log(filterParam[0].value)
                    window.location.href = "/tasks/search/"+filterParam[0].value;
                } else { 
                	//console.log(data)
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
    });
});