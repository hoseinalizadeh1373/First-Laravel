
let pen = document.getElementsByClassName('editpen');
let trash = document.getElementsByClassName('deletepen');
let closeupdate = document.getElementById('close_update');
let idd = 0;

function setupdate(valueforupdate) {

    let sender_value = valueforupdate == 2 ? 'user' : 'admin';

    axios.put('/users/' + idd, {
            value: sender_value
        })
        .then(function(response) {
            if (response.data['success'] == true) {
                document.getElementById('type_' + idd).innerHTML = sender_value;
                closeupdate.click();
            }

        }).catch(function(error) {
            // handle error
            alert(error);
        })
        .then(function() {});
}


function setid(id, method) {
    idd = id;
    if (method == "del") {
        modal.style.display = "block";
    }

}


var modal = document.getElementById('myModal2');

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener('click', function() {
        modal.style.display = "block";
    })
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

function closedelete() {
    modal.style.display = "none";
    
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



function deleteaxios() {

    axios.delete('/users/' + idd)
        .then(function(response) {
    

            if (response.data) {

                let index1 = response.data['html'].indexOf("id='tbody'");
                let index2 = response.data['html'].indexOf("<hr class='d-block'>");
                let a = index2 - index1;

                document.getElementById('pagination').remove();

                let reshteh = response.data['html'].substr(index1 + 11, a);

                document.getElementById('tbody').innerHTML = reshteh;

                closedelete();

            }
            console.log(response.data);
        })
        .catch(function(error) {
  
            alert(error);
        })
        .then(function() {});
}

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

