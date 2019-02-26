$(document).ready(function(){
    $("button[type='submit']").on('click',function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var name = $('#name').val();
        var tel = $('#tel').val();
        validate(email, password,name,tel)
    })

    function validate(email, password,name,tel){
        if(!email || !password || !name || !tel){
            swal("Cảnh báo", "", "error");
        }
        
    }
})