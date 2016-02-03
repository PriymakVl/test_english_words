/**
 * Created by Vladimir Priymak on 03.02.2016.
 */
$(document).ready(function(){
    var id_word;
    var id_check;
    $(':radio').prop('checked', false);//reset selection radio box
    $(':radio').change(function() {
        id_word = $(this).attr('id_word');
        id_check = $('#word_check').attr('id_check');
        if(id_word == id_check) {
            alert('Молодец Правильно!');
            location.reload();
        }
        else alert('Попробуй еще');
    })
});
