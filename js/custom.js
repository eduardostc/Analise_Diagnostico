document.addEventListener('DOMContentLoaded', function () {
    const situacao = document.getElementById("id");
    const lotes = document.getElementsByName("lote");

    // Adiciona um ouvinte de mudança para os elementos de lote
    for (let i = 0; i < lotes.length; i++) {
        lotes[i].addEventListener('change', function () {
            const loteSelecionado = lotes[i].value;
            listarSituacao(loteSelecionado);
        });
    }

    // Função para listar as empresas
    async function listarSituacao(lote) {
        const dados = await fetch('listar_situacao.php?lote=' + lote);
        const resposta = await dados.json();
        var empresa = '<option value="" style="font-weight: bold;">Clique aqui e escolha uma empresa:</option>';

        if (resposta['status']) {
            document.getElementById("msgAlertaID").innerHTML = "";
            for (var i = 0; i < resposta.dados.length; i++) {
                empresa += '<option value="'
                    + resposta.dados[i]['id']
                    + '">'
                    + resposta.dados[i]['nome_da_empresa']
                    + '</option>';
            }
            situacao.innerHTML = empresa;
        } else {
            document.getElementById("msgAlertaID").innerHTML = resposta['msg'];
        }
    }

    // Função para capturar o nome e o id da empresa selecionada
    function getEmpresa(nome_empresa, id) {
        // Atualiza o valor do campo input com o nome da empresa selecionado
        document.getElementById("NomeDaEmpresa").value = nome_empresa;
        // Atualiza o valor do campo input com o id da empresa selecionado
        document.getElementById("id").value = id;
    }

    // Adiciona um ouvinte de mudança para o elemento select
    situacao.addEventListener('change', function () {
        const selectedOption = situacao.options[situacao.selectedIndex];
        getEmpresa(selectedOption.text, selectedOption.value);
    });
});
