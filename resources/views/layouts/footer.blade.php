<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('/js/app.js')}}"></script>
<script src="{{ asset('/js/app2.js')}}"></script>


@include('sweet::alert')

<script type="text/javascript">



    (function($) {
        $(document).ready(function() {
            $('#search').on('keyup', function() {

                $value = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '/todos/search',
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        
                       
                        $('#tbody').html(data);
                        if(data!=""){
                            $('.div').addClass("todown");
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        var err = xhr.responseText;
                        alert(err.Message);
                    }
                });

            })
        })
    }(jQuery));

//todo_done
$("body").on('click','.done_button',function(){
    
    let idfordone = $(this).data('iddone');
    let valuedone = $(this).data('done');
    
    donetodo(idfordone,valuedone);
})
// $(".done_button").on('click',function(){
    
//     let idfordone = $(this).data('iddone');
//     let valuedone = $(this).data('done');
    
//     donetodo(idfordone,valuedone);
// })
function donetodo(iddone,valuedone1){
alert("s");
    axios.put('/todos/3/done')
    .then(function(){
        alert('success');
    })
    .catch(function(){
        alert('استثنايي رخ داده');
    });
  
    
}

</script>

</body>

</html>