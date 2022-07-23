<script src="{{ asset('/js/app.js')}}"></script>
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    form2.addEventListener('submit',function(e){
      e.preventDefault();
      deleteaxios(idd);
    //     let s  = "{{Route('users.destroy',['user'=>88888888888])}}";
    // form2.action = s.replace('88888888888',idd);
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
function deleteaxios(){
axios.delete('/users/'+idd)
.then(function (response){
  (response)=>response.json({success:true});
})
.catch(function (error) {
    // handle error
    alert(error);
  })
  .then(function () {
  });
}

var modal = document.getElementById('myModal2');

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
for(let i=0;i<btn.length;i++){
btn[i].addEventListener('click',function() {
  modal.style.display = "block";
})
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
function closedelete(){
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>

</html>