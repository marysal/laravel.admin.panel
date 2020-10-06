$('.delete').click(function () {
    var res = confirm('Подтвердите действия');
    if(!res) return false;
});

/** Редактирование заказа */
$('.redact').click(function () {
    var res = confirm('Вы можете только изменить комментарий');
    return false;
});
