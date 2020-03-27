$(document).on('click','.delete_btn',function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Вы уверены?',
        text: "Действие невозможно отменить!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Да, удалить!',
        cancelButtonText: 'Отмена'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Удалено!',
                'Данные удалены.',
                'success'
            )
            $(this).find("form").submit();
        }
    })
});
