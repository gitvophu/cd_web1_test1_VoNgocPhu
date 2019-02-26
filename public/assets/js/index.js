
$(document).ready(function () {


    $('#btn-search').on('click',function (e) {
        e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var departure = $('#departure-date').val()
        var flight_type = $("input[name='flight_type']:checked").val();
        var return_date = $('#return_date').val();
        var flight_class = $('#flight-class').val();
        var total_person = $('#total-person').val();
        console.log(`${from} ${to} ${departure} ${flight_type} ${return_date} ${flight_class} ${total_person} `)
        if (from  && to  && departure  && flight_type  && return_date  && flight_class  && total_person){

            if (from == to){
                swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
            }
            else{
                // console.log('ok nè')
                // window.location.replace('/flight-list');
                $('#search-form').submit()
            }

        }
        else
        {
            swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
        }
    })



})