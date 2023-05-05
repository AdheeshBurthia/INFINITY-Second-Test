$(document).ready(function(){
    $("form").submit(function (event){
        event.preventDefault()

        var firstname = document.getElementById("firstname").value
        var lastname = document.getElementById("lastname").value

        var result = document.getElementById("result")

        $.post("message.php",{firstname:firstname, lastname:lastname},function(data){
            console.log(data)
            alert(data)
        })

        

    })
})