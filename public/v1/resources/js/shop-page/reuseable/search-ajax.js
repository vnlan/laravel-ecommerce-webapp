$(document).ready(function() {
    $('#searchkey').on('change', function() {
        $value = $(this).val();
        if($value != '')  
        {  
            $.ajax({
                type: 'get',
                url: 'products/search-name',
                data: {
                    'keyword': $value
                },
                success: function(data) {
                    $('#searchResult').fadeIn();  
                    $('#searchResult').html(data); 
                    if(data === "" ){
                        $('#searchResult').hide(); 
                    } 
                }
            });
        }else{
            $('#searchResult').hide(); 
        };
      
    });
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
 
});