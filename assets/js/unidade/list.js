/**
 * Arquivos para realizar o list dos blocos cadastrados
 */

var $table_content = $('#table_content');
var $msg = $('#msg');

function load_list() {
    return $.ajax({'url': '/unidade/list_itens'}).promise();
};

function fail_list(error) {
    alert(error.text);
    console.log(error);
};

function render_list(response) {
    if (response.valid) {
        $msg.hide().text(response.msg).fadeIn(600);
        $table_content.empty().hide().fadeIn(600);
        $.each(response.data, function (i, e) {
            var $tr = $('<tr/>');
            $tr.append($('<td/>').text(e.id));
            $tr.append($('<td/>').text(e.nom));
            $a_editar = $('<a/>').prop('href','/unidade/'+e.id).text('Editar');
            $a_excluir = $('<a/>').prop('href','/unidade/excluir/'+e.id).text('Excluir');
            $tr.append($('<td/>').html([$a_editar, ' / ', $a_excluir]));
            $table_content.append($tr);
        });
    }
};

load_list().done(render_list).fail(fail_list);
