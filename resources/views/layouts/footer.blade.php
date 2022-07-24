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
    // form2.addEventListener('submit',function(e){
    //   e.preventDefault();
    //   deleteaxios(idd);
    // //     let s  = "{{Route('users.destroy',['user'=>88888888888])}}";
    // // form2.action = s.replace('88888888888',idd);
    // form2.submit();
    // });


   

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

 function getuser(){
axios.get('/users/changelist')
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
let page = document.getElementById('pagination');
page.addEventListener('click',function(e){
  // getuser();
  // e.preventDefault();
  console.log(page.getitem());
})
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
    //  alert(index1+"d"+index2);
    //  let reshteh = response.data['html'].substr(index1);
    document.getElementById('pagination').innerHTML="";
    //مگم مگه از همینه که دو تا ازش هست ، مگه با کد اضافش کنم ؟
 let reshteh = response.data['html'].substr(index1,a);
 console.log(reshteh);

 reshteh="<div class='container rounded mt-2' "+reshteh;
    // let reshteh = response.data['html'].replaceAt(index1,reshteh);
    
     document.getElementById('tbody').innerHTML=reshteh;
    //  tbody.innerHtml = reshteh;
    closedelete();
    // getuser();
    
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
String.prototype.replaceAt = function(index, replacement) {
	if (index >= this.length) {
		return this.valueOf();
	}

	return this.substring(0, index) + replacement + this.substring(index + 1);
}
String.prototype.replaceBetween = function(start, end, what) {
  return this.substring(0, start) + what + this.substring(end);
};

</script>

</body>

</html>
