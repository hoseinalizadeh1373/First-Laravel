<script src="{{ asset('/js/app.js')}}"></script>
<script src="{{ asset('/js/app2.js')}}"></script>
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@include('sweet::alert')
<script type="text/javascript">
    let pen = document.getElementsByClassName('editpen');
    let trash = document.getElementsByClassName('deletepen');
    let idd = 0;
/*
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
*/

function setupdate(valueforupdate){
    
    axios.put('/users/'+idd,
    {
        value:valueforupdate =1? 'admin' : 'user'
    }
    )
    .then(function(response){
        if(response.data['success']==true){
            alert(response.data['data']);
        }

    }).catch(function (error) {
    // handle error
    alert(error);
  })
  .then(function () {
  });
}
   function  setid(id,method){
    idd = id;
    if(method=="del"){
    modal.style.display = "block";
   }

   }

    let form = document.getElementById('formusers');
    let form2 = document.getElementById('formdelete');
    form.addEventListener('submit',function(){
        let s  = "{{Route('users.update',['user'=>88888888888])}}";
    form.action = s.replace('88888888888',idd);
    form.submit();
    });

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


// let tbody = document.getElementById('tbody');
function deleteaxios(){
 
axios.delete('/users/'+idd)
.then(function (response){
  // (response)=>response.json({success:true});
  
  if(response.data){
    //  document.getElementById('tr_'+idd).style.display="none";
  
     let index1 = response.data['html'].indexOf("id='tbody'");
     let index2 = response.data['html'].indexOf("<hr class='d-block'>");
     let a = index2 - index1;

     document.getElementById('pagination').remove();
     //مگم مگه از همینه که دو تا ازش هست ، مگه با کد اضافش کنم ؟
     let reshteh = response.data['html'].substr(index1+11,a);
   
     document.getElementById('tbody').innerHTML=reshteh;
    
    closedelete();
    
  }
  console.log(response.data);
})
.catch(function (error) {
    // handle error
    alert(error);
  })
  .then(function () {
  });
}


</script>

</body>

</html>
