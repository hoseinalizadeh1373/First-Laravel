

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('/js/app.js')}}"></script>
<script src="{{ asset('/js/app2.js')}}"></script>




@include('sweet::alert')

<script type="text/javascript">
//todo_done
$(".done_button2").unbind().on('click',function(){
  
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
    valuedone1 = 1 -valuedone1;
    
    axios.get('/todos/'+iddone+'/done',{
        params: { value: valuedone1 }
    })
    .then(function(response){
        if(response.data){
            let element = document.getElementById('done_'+iddone);
             element.innerHTML=response.data['result'];
             $('#done_'+iddone).data('done',valuedone1);
        }
    })
    .catch(function(error){
        alert(error);
    });   
}


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



</script>

</body>

</html>