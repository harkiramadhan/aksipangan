setTimeout(function(){ 
    $(".alert").fadeOut("slow") 
}, 4000 )

$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase()
    $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    })
})