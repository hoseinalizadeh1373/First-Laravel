<script src="{{ asset('/js/app.js')}}"></script>
@include('sweet::alert')
<script >

    // let del = document.getElementsByClassName('positioner');
    // for (let i = 0; i < del.length; i++) {
    //     del[i].addEventListener('click', (e) => {

    //         document.getElementById("hid").value = hidden1[i].value;
    //         // e.preventDefault();
    //         console.log(hidden1[i].value);

    //     });

    //     function modal() {


    //         $('#myModal').on('shown.bs.modal', function() {
    //             $('#myInput').trigger('focus')

    //         })
    //     }
    // }
    var id = 0;
    let form = document.getElementById('formusers');
   
    let s ="";
function setid(id2){
    
id = id2;
form.action = "{{Route('users.update',['user' => 1])}}";
// form.action = ss.replace("888888888",id);
}

function getid(){

    alert(id+" ");
// alert(form.action);
// form.submit(); 
}
    
</script>
</body>

</html>