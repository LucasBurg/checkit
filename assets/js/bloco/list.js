/**
 * Arquivos para realizar o list dos blocos cadastrados
 */

var $table_content = $('#table_content');

function load_list_bloco() {
    return $.ajax({'url': '/bloco/list_itens'}).promise();
};

function render_list_bloco(response) {
    if (response.valid) {
        $table_content.empty();
        $.each(response.data, function(i, e){
            var $tr = $('<tr/>');
            $tr.append($('<td/>').text(e.id));
            $tr.append($('<td/>').text(e.nom));
            $table_content.append($tr);
        });
    }
};




load_list_bloco().done(render_list_bloco);
