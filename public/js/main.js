console.log("funciona")
// moment.locale('es')

// const formatter = new Intl.NumberFormat('es-CO', {
//     style: 'currency',
//     currency: 'COP',
//     minimumFractionDigits: 0
// })

//   var value = 10000

// const valores = document.querySelectorAll('.valor-pago')

// for (let valor of valores) {
//     let nuevoValor = parseInt(valor.textContent)

//     valor.textContent = formatter.format(nuevoValor)
    
// }

// const fechas_finales = document.querySelectorAll('.fecha-final')


// for (const fecha of fechas_finales) {
//     let fecha_final = fecha.textContent
//     let fecha_convert = moment(fecha_final, "YYYY-MM-DD").format("MMM DD/YYYY");

//     let dias_diff = moment(fecha_final).diff(moment(), 'days')

//     if(dias_diff <= 0){
//         fecha.classList.add('bg-danger')
//         fecha.classList.add('text-light')
//     } else if(dias_diff <= 15){
//         fecha.classList.add('bg-warning')
//         fecha.classList.add('text-light')
//     }

//     fecha.textContent = fecha_convert
// }


$('.btn-delete-user').click(function(e){
    $userId = $(this).attr('data-user-id');
    $userName = $(this).attr('data-user-name');

    console.log($userId + $userName);
    $('#exampleModal #user-name').text($userName)
    $url = $('#exampleModal .btn-submit').attr('href')

    $('#exampleModal .btn-submit').attr('href', $url + $userId);

})

$("#updateForm").change(function(){
    if($('#change-pass').prop('checked')){
        $('#box-change-password').removeClass('d-none')
    } else {
        $('#box-change-password').addClass('d-none')
    }
})



