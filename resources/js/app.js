require('./bootstrap');
require("sweetalert");
jQuery(function($) {
    $('#exampleModal').on('shown.bs.modal', function() {
        $('input[name="title"]').focus();
    });
});
(function ($) {
    $(document).ready(function () {
        $('#search').on('keyup', function () {

            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '/todos/search',
                data: {
                    'search': $value
                },
                success: function (data) {
                    
                    $('#tbody').html(data);
                    if (data != "") {
                        
                        $('.div').addClass("todown");
                    }
                },
                error: function (xhr, status, error) {
                    var err = xhr.responseText;
                    alert(err.Message);
                }
            });

        })
    })
}(jQuery));


//createtodo
(function ($) {
    $(document).ready(function () {
        $("body").on('click', '.createtodo', function () {

            let title = $('#title').val();
            let desc = $('#desc').val();
            createtodo(title, desc);
        })
    })
}(jQuery));

function createtodo(title_todo, desc_todo) {
    axios.post('/todos', {
        title: title_todo,
        desc: desc_todo

    })
        .then(function (response) {

            if (response.data) {

                console.log(response.data['html']);
                let index1 = response.data['html'].indexOf("id='div'");
                let index2 = response.data['html'].indexOf("<hr class='d-block'>");

                let a = index2 - index1;



                let reshteh = response.data['html'].substr(index1 + 11, a);

                console.log(reshteh);
                document.getElementById('pagination2').remove();
                document.getElementById('div').innerHTML = reshteh;
                

                let closecrate = document.getElementById("close_create");
                $('#title').val("");
                $('#desc').val("");
                closecrate.click();
            }
        }).catch(function (error) {
            if (error.response) {

                if(error.response.data['errors']['title']){
                    document.getElementById('error_create_title').innerHTML = error.response.data['errors']['title'];
                }
                else{
                    document.getElementById('error_create_desc').innerHTML = error.response.data['errors']['desc'] ;
                }
                
                

                console.log(error.response.data['errors']);
            }

        });
}
//todo_done
$(function () {
    $(document).ready(function () {
        $("body").on('click', '.done_button2', function () {

            let idfordone = $(this).data('iddone');
            let valuedone = $(this).data('done');
            donetodo(idfordone, valuedone);

        })
    })
});

function donetodo(iddone, valuedone1) {
    valuedone1 = 1 - valuedone1;

    axios.get('/todos/' + iddone + '/done', {
        params: { value: valuedone1 }
    })
        .then(function (response) {
            if (response.data) {
                
                $('#done_' + iddone).data('done', valuedone1);
            }
        })
        .catch(function (error) {
            alert(error);
        });
}
// let pen = document.getElementsByClassName('editpen');


// let trash = document.getElementsByClassName('deletepen');
let closeupdate = document.getElementById('close_update');


function setupdate(idforedit, valueforupdate) {

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
$(".editpen").bind().on('click', function () {
    let idforedit = $(this).data('id_row');
    $('#exampleModal').data('modal', idforedit);
});

$(".editer").on('click', function () {
    let idforupodate = $('#exampleModal').data('modal');
    let permission = $(this).data('update');
    setupdate(idforupodate, permission);
})


//delete_user
$("body").on("click", ".deletepen", function () {
    let idfordelete = $(this).data('idrow');
    showmodal(idfordelete);
})
$(".deletepen").bind().on('click', function () {
    let idfordelete = $(this).data('idrow');
    showmodal(idfordelete);
});



// //todo_done
// $("body").on('click','.done_button',function(){

//     let idfordone = $(this).data('iddone');
//     let valuedone = $(this).data('done');
//     donetodo(idfordone,valuedone);
// })
// $(".done_button").on('click',function(){

//     let idfordone = $(this).data('iddone');
//     let valuedone = $(this).data('done');

//     donetodo(idfordone,valuedone);
// })



function showmodal(id_delete = 0) {
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

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
})

