require('./bootstrap');
require("sweetalert");

$("#form").submit((e)={
    axios.get("Asd")
    .then(res=>{
        console.log(res)
    });
})
