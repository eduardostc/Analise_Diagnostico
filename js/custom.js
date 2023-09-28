const situacao = document.getElementById("id");
if(situacao){
    listarSituacao();
}
async function listarSituacao(){
    const dados = await fetch('listar_situacao.php');
    const resposta = await dados.json();
    var empresa = '<option value="" style="font-weight: bold;">Selecione a Empresa</option>';
    
    if(resposta['status']){
        document.getElementById("msgAlertaID").innerHTML = "";
         for(var i = 0; i < resposta.dados.length; i++){         
          empresa += '<option value="'
          + resposta.dados[i]['id'] 
          + '" onclick="getEmpresa(' + "'" + resposta.dados[i]['nome_da_empresa'] + "'" + ',' + resposta.dados[i]['id'] + ',' + "'" + resposta.dados[i]['email'] + "'" + ')">' 
          
          //A couna abaixo mostra as empresas no formulário
          + resposta.dados[i]['nome_da_empresa']
          + '</option>';
        }
        situacao.innerHTML = empresa;
    }else{
        document.getElementById("msgAlertaID").innerHTML = resposta ['msg'];
    }
}
function getEmpresa(nome_empresa, id, email){
    document.getElementById("form_empresa").value = nome_empresa;
    document.getElementById("id").value = id;
    document.getElementById("form_email").value = email;
}
