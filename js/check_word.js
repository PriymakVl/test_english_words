/**
 * Created by Vladimir Priymak on 03.02.2016.
 */
$(document).ready(function(){
    var id_word;
    var id_check;
    var show_words = $('#info_show_words').text();
    var answers = $('#info_answers').text();
    var url = 'http://' + location.host;//now do not need to know the host

    $(':radio').prop('checked', false);//reset selection radio box

    $(':radio').change(function() {
        //change number answers in table statistic test
        ++answers;
        document.getElementById('info_answers').innerHTML = answers;

        //compare words
        id_word = $(this).attr('id_word');
        id_check = $('#word_check').attr('id_check');
        if(id_word == id_check) {
            alert('Молодец Правильно!');
            location.href = url + '?show=' + show_words + '&answers=' + answers;
        }
        else alert('Попробуй еще');
    })
});


