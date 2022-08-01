require('./bootstrap');
require("sweetalert");

// let pen = document.getElementsByClassName('editpen');

const { default: axios } = require("axios");

// let trash = document.getElementsByClassName('deletepen');
let closeupdate = document.getElementById('close_update');


function setupdate(idforedit,valueforupdate) {

    let sender_value = valueforupdate == 2 ? 'user' : 'admin';

    axios.put('/users/' + idforedit, {
        value: sender_value
    })
        .then(function (response) {
            if (response.data['success'] == true) {
                document.getElementById('type_' + idforedit).innerHTML = sender_value;
                closeupdate.click();
            }

        }).catch(function (error) {
            // handle error
            alert(error);
        })
        .then(function () { });
}





var modal = document.getElementById('myModal2');

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
// for (let i = 0; i < btn.length; i++) {
//     btn[i].addEventListener('click', function () {
//         modal.style.display = "block";
//     })
// }


// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

function closedelete() {
    modal.style.display = "none";

}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//edit_user
$(".editpen").bind().on('click',function(){
    let idforedit = $(this).data('id_row');
    $('#exampleModal').data('modal',idforedit);
});

$(".editer").on('click',function(){
    let idforupodate = $('#exampleModal').data('modal');
    let permission = $(this).data('update');
    setupdate(idforupodate,permission);
})


//delete_user
$("body").on("click", ".deletepen", function(){
    let idfordelete = $(this).data('idrow');
    showmodal(idfordelete);
})
$(".deletepen").bind().on('click',function(){
    let idfordelete = $(this).data('idrow');
    showmodal(idfordelete);
});



//todo_done
$("body").on('click','.done_button',function(){
    
    let idfordone = $(this).data('iddone');
    let valuedone = $(this).data('done');
    donetodo(idfordone,valuedone);
})
$(".done_button").on('click',function(){
    
    let idfordone = $(this).data('iddone');
    let valuedone = $(this).data('done');
    
    donetodo(idfordone,valuedone);
})
function donetodo(iddone,valuedone){
    axios.put('/todos/'+iddone+'/done',{
        value : valuedone 
    })
    .then(function(response){
        if(response.data['success']==true){
            alert("true");
        }
    })
    .error(function(){
        alert('استثنايي رخ داده');
    })
    .then(function () { });

}


function showmodal (id_delete=0){
    let idrow = id_delete;

    $(".submit_btn").data('iddelete', idrow);
    modal.style.display = "block";
}

$(".submit_btn").on('click', function () {
    let idfordelete = $(this).data('iddelete');
    deleteaxios(idfordelete);
})
function deleteaxios(idr) {
    axios.delete('/users/' + idr)
        .then(function (response) {
            if (response.data) {

                let index1 = response.data['html'].indexOf("id='tbody'");
                let index2 = response.data['html'].indexOf("<hr class='d-block'>");

                let a = index2 - index1;
                
                

                let reshteh = response.data['html'].substr(index1 + 11, a);

                console.log(reshteh);

                document.getElementById('tbody').innerHTML = reshteh;
                document.getElementById('pagination').remove();
                closedelete();

            }
            console.log(response.data);
        })
        .catch(function (error) {

            alert(error);
        })
        .then(function () { });
}

$.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
