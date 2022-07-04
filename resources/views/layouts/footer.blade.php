<script src="{{ asset('/js/app.js')}}"></script>
@include('sweet::alert')
<script type="text/javascript">
    let pen = document.getElementsByClassName('editpen');
    let trash = document.getElementsByClassName('deletepen');
    let idd = 0;
    
    for(let i=0;i<pen.length;i++){
        pen[i].addEventListener('click',function(e){
            idd = pen[i].value;
        })
    }

    for(let i=0;i<trash.length;i++){
        trash[i].addEventListener('click',function(e){
            idd = trash[i].value;
        })
    }
    let form = document.getElementById('formusers');
    let form2 = document.getElementById('formdelete');
    form.addEventListener('submit',function(){
        let s  = "{{Route('users.update',['user'=>88888888888])}}";
    form.action = s.replace('88888888888',idd);
    form.submit();
    });
    form2.addEventListener('submit',function(){
        let s  = "{{Route('users.destroy',['user'=>88888888888])}}";
    form2.action = s.replace('88888888888',idd);
    form2.submit();
    });

    function gettodo(){
axios.get('/todos?todo=1')
  .then(function (response) {
    
    
  })
  .catch(function (error) {
    // handle error
    alert(error);
  })
  .then(function () {
    // always executed
  });

}


</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script
</body>

</html>