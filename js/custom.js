const situacao = document.getElementById("id");

if(situacao){
    listarSituacao();
}

async function listarSituacao(){
    const dados = await fetch('listar_situacao.php');
   const resposta = await dados.json();
    //console.dir(resposta);
   // console.log(resposta);
    var opcao = '<option value="" style="font-weight: bold;">Selecione a Empresa</option>';
    if(resposta['status']){
        document.getElementById("msgAlertaID").innerHTML = "";
         for(var i = 0; i < resposta.dados.length; i++){
            //console.log(resposta.dados[i]['id']);
            //console.log(resposta.dados[i]['email']);
           // situacao.innerHTML = situacao.innerHTML + '<option value="' + resposta.dados[i]['id'] + '">' + resposta.dados[i]['email'] + '</option>'
            opcao += '<option value="' + resposta.dados[i]['id'] + '">' + resposta.dados[i]['nome_da_empresa'] + '</option>';
        }
        situacao.innerHTML = opcao;
    }else{
        document.getElementById("msgAlertaID").innerHTML = resposta ['msg'];
    }
}