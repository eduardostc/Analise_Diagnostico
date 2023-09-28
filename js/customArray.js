const situacao = document.getElementById("id");

if(situacao){
    listarSituacao();
}

async function listarSituacao(){
    const dados = await fetch('listar_situacao.php');
   const resposta = await dados.json();
    //console.dir(resposta);
   // console.log(resposta);
    var empresa = '<option value="" style="font-weight: bold;">Selecione a Empresa</option>';
    var arrayEmpresa = [];
    if(resposta['status']){
        document.getElementById("msgAlertaID").innerHTML = "";
         for(var i = 0; i < resposta.dados.length; i++){
            //console.log(resposta.dados[i]['id']);
            //console.log(resposta.dados[i]['email']);
           // situacao.innerHTML = situacao.innerHTML + '<option value="' + resposta.dados[i]['id'] + '">' + resposta.dados[i]['email'] + '</option>'
           empresa += '<option value="' + resposta.dados[i]['id'] + '">' + resposta.dados[i]['nome_da_empresa'] + '</option>';
           arrayEmpresa = resposta.dados[i]['nome_da_empresa']
        }
        situacao.innerHTML = empresa;
    }else{
        document.getElementById("msgAlertaID").innerHTML = resposta ['msg'];
    }
}


function obterMeuArray() {
    if (arrayEmpresa.length > 0) {
        return arrayEmpresa;
    } else {
        return ['o array está vazio'];
    }
}

/// CODIGO 2 funcionando retornando o nome da empresa
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
          empresa += '<option value="' + resposta.dados[i]['id'] + '" onclick="getEmpresa(this.innerHTML)">' + resposta.dados[i]['nome_da_empresa'] + '</option>';
        }
        situacao.innerHTML = empresa;
    }else{
        document.getElementById("msgAlertaID").innerHTML = resposta ['msg'];
    }
}
function getEmpresa(nome_empresa){
    document.getElementById("form_empresa").value = nome_empresa;
}