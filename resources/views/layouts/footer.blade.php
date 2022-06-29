<script src="{{ asset('/js/app.js')}}"></script>
@include('sweet::alert')
<script type="text/javascript">
    let pen = document.getElementsByClassName('editpen');
    let idd = 0;
    for(let i=0;i<pen.length;i++){
        pen[i].addEventListener('click',function(e){
            idd = pen[i].value;
        })
    }
    let form = document.getElementById('formusers');
    form.addEventListener('submit',function(){
        let s  = "{{Route('users.update',['user'=>88888888888])}}";
    form.action = s.replace('88888888888',idd);
    form.submit();
    });
</script>
</body>

</html>