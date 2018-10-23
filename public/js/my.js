$(document).ready(function(){
   	//var token = "{{ csrf_token() }}";
    $('#form').on('submit', function(e){
    	//var myurl = '/laravelNews/public/article/add_2';
        e.preventDefault();
        let formData = new FormData(e.currentTarget);
        $.ajax({
           type: 'POST',
            url: '/laravelNews/public/article/add',  // '{{ route('add_article_post') }}', //url,
            data: formData, //$('#form').serialize(), 
            //dataType: 'html',
            processData: false,
            contentType: false,
            success: function(response){
            	var response = $.parseJSON(response);
            	// console.log(typeof response); 
            	// console.log(response.article_title);
            	$('#result_form').html(response.article_title);
            	$('#status').html(response.status);
                $('#status_end').html(response.status_end);
                // console.log(response);
            }
        });
    });
});