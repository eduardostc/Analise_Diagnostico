<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analytics com IA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
      crossorigin="anonymous"
    ></script>
    
    <style>
        ::placeholder {
            font-weight: bold;
        }
    </style>
    <style>
      .hidden {
      display: none;
    }
    .green-text {
      color: green;
    }
  </style>
  </head>
  <body >  <!--style="background-color: #F2F2F2" -->
  <div class="container m-12 p-5 ">
      <div class="row  ">
        <div class="col-12">
          <div class="card m-12 p-5" style="background-color: #F2F2F2">          
            <div class="card-body">
              <h1 class="custom-title text-center" style="color: green">
                Analytics da IA <br>
                Formulário Diagnostico
              </h1>
              <br />
              <br />
              <div>

              <!--RADIO---------->
              <div class="form-group mb-3 row">
                  <div class="my-3 col">
                  <label class="form-label" for="id" style="color: green">Selecione o lote:</label>
                  <br>
                    <label for="PriLote" class="green-text">
                      <input type="radio" name="lote" id="PriLote" value="1"> Turma '1'
                    </label>
                    <br>
                    <label for="SegLote" class="green-text">
                      <input type="radio" name="lote" id="SegLote" value="2"> Turma '2'
                    </label>
                  </div>
                </div>
<!--Inicio das perguntas AMBIENTE--------------------------->
                <div class="form-group mb-3 row">
                    <label class="form-label" for="id" style="color: green"
                      >Selecione a Empresa:</label
                    >    
                    <select
                      class="form-select"
                      name="id"
                      id="id"
                    >
                    <option value="" style="font-weight: bold;">Selecione a Empresa</option>
                    </select>
                    <span id="msgAlertaID"></span>
                    <input type="hidden" name="NomeDaEmpresa" id="NomeDaEmpresa" />
                 </div>  
<!--RADIO---------->
                <div class="form-group mb-3 row">
                  <div class="my-3 col">
                    <label for="opcaoInput" class="green-text">
                      <input type="radio" name="opcao" id="opcaoInput" onclick="mostrarInput()"> Exibir campo de pergunta
                    </label>
                    <br>
                    <label for="opcaoSelect" class="green-text">
                      <input type="radio" name="opcao" id="opcaoSelect" onclick="mostrarSelect()"> Exibir campo lista de opções
                    </label>
                  </div>
                </div>
                <!--PERGUNTA---------->
                  <div id="campoInput" class="hidden">
                    <label  class="form-label" for="campo_pergunta" style="color: green">Pergunta:</label>
                    <input class="form-control" name="campo_pergunta" type="text" id="campo_pergunta"  maxlength="100">  
                  </div>
<!--PROMPT---------------------------------------------------------------->
                <div id="campoSelect" class="hidden my-3 col" >
                  <label

                    class="form-label"
                    for="prompt"
                    style="color: green;"
                    >Lista de Opções:</label
                  >
                  <select
                    class="form-select"
                    name="prompt"
                    id="prompt"
                  >
                    <option value="" style="font-weight: bold;">Clique aqui e escolha uma das opções:</option>
                    <option value="Vamos analisar a validade dos dados fornecidos e verificar se estão consistentes, com de limite de output de 1000 caracteres">1-Validação dos Dados da Empresa:</option>
                    <!--
                    - Dados da empresa recebidos:
                    - Nome da empresa: "{nome_da_empresa}"
                    - CNPJ: "{cnpj_da_empresa}"
                    - Telefone para contato: "{telefone_da_empresa}"
                    - Email da empresa: "{email}"
                    - Endereço completo: "{endereco_da_empresa}"
                    -->
                    <option value="Vamos analisar a situação financeira da empresa e fornecer indicadores relevantes para a tomada de decisão, de modo que explique utilizando no máximo 1000 caracteres">2-Análise Financeira:</option>                                                   
                    <!--
                    - Dados financeiros da empresa recebidos:
                    - Faturamento anual: "{faturamento_anual_da_empresa}"
                    - Principais meses de MAIOR faturamento: "{maiores_meses_faturamento}"  -----------
                    - Principais meses de MENOR faturamento: "{menores_meses_faturamento}"  --------
                    - Percentual de vendas pela internet: "{percentual_vendas_pela_internet}"
                    -->                    
                  <option value="Vamos analisar a presença digital da empresa e fornecer indicadores para otimização da estratégia digital, de modo que explique utilizando no máximo 1000 caracteres">3-Presença Digital e Marketing:</option>                                            
                    <!--
                    - Principais ferramentas e redes sociais utilizadas: "{ferramentas_e_redes_sociais}"  ----------
                    - Nível de maturidade em plataformas digitais: "{maturidade_empresa_uso_plataformas}"
                    - Conhecimento sobre transformação digital e marketing digital: "{nivel_conhecimento_digital}"
                    - Utilização de site próprio: "{possui_site_proprio}"
                    - Terceirização de serviços de marketing digital: "{terceiriza_servicos_digital}"
                    --> 
                    <option value="Vamos entender os principais desafios enfrentados e propor soluções para melhorar a eficiência digital, de modo que explique utilizando no máximo 1000 caracteres">4-Desafios e Dificuldades:</option>
                    <!--
                    - Principal desafio para utilizar plataformas de mídias digitais e ferramentas de gestão: "{principal_desafio_digitais}"
                    -->
                    <option value="Resuma de forma descritivo, sintetizando em cada campo com de limite de output de 1000 caracteres">5-Resumo descritivo sintetizando cada campo:</option>
                    <option value="Faça um resumo das palavras chaves mencionada em cada input, de modo que explique utilizando no máximo 1000 caracteres.">6-Resumo das palavras chaves mencionada em cada campo:</option>                    
                    <option value="Quais as principais estratégia que o usuário pode desenvolver com base as informações mencionada, com limite de output de 1000 caracteres:">7-Principais estratégia que o usuário pode desenvolver com base nas informações mencionada:</option>
                    <option value="Priorizar os desafios que precisará atacar primeiro com base nas informações mencionada, com limite de output de 1000 caracteres:">8-Priorizar os desafios que precisará atacar primeiro com base nas informações mencionada:</option>
                    <option value="Como ajudar as empresas a alcançar seus objetivos conforme o que foi digitado em cada input,de modo que explique utilizando no máximo 1000 caracteres.">9-Como ajudar as empresas a alcançar seus objetivos conforme ao que foi mencionada em cada campo:</option>
                    <option value="Faça um resumo, incluindo problema, objetivo e ação, em três linha de sugestões de ações baseadas no que foi dito em cada input,de modo que explique utilizando no máximo 1000 caracteres">10-Resumo, incluindo problema, objetivo e ação, em três linha de sugestões:</option>
                    <option value="Realize uma estratégias para cada desafio de marketing 'Output: formate o resultado em Tabela': a)Atrair cliente; b)Estimular interesse;C)Levar a venda/transação; d)Fidelizar. Com limite de output de 500 caracteres.">11-Realize uma Estratégias para cada desafio de marketing (Em formato de Tabela): a)Atrair cliente; b)Estimular interesse;C)Levar a venda/transação; d)Fidelizar</option>
                    <option value="Responda toda as mensagem que foram enviadas, com um resumo estruturado da minha mensagem, organizado em tópicos para facilitar a leitura. Por fim, faça um resumo com limite de 500 caracteres de como ajudar as empresas a alcançar seus objetivos.">12-Resumo estruturado organizado por tópico</option>
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label" for="resultado" style="color: green; font-weight: bold;"
                    >Resultado:</label
                  >
                  <textarea
                    class="form-control"
                    name="resultado"
                    id="resultado"
                    cols="20"
                    rows="7"
                  ></textarea>
                </div>
<!--FIM do Prompt------------------------------------------------------------------------->
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-success col-2" id="btn_enviar">
                    Consultar
                  </button>              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
         function mostrarInput() {
           document.getElementById('campoInput').classList.remove('hidden');
           document.getElementById('campoSelect').classList.add('hidden');
           document.getElementById('prompt').value = "";
           document.getElementById('campo_pergunta').value = "";
         }

         function mostrarSelect() {
          document.getElementById('campoInput').classList.add('hidden');
           document.getElementById('campoSelect').classList.remove('hidden');
           document.getElementById('prompt').value = "";
           document.getElementById('campo_pergunta').value = "";
         }

      window.addEventListener('load', function () {
        const form_empresa = document.querySelector('#NomeDaEmpresa'); //-------------->1
        const id = document.querySelector('#id');
        const prompt = document.querySelector('#prompt'); 
        const campo_pergunta = document.querySelector('#campo_pergunta');
        const resultado = document.querySelector('#resultado');
        const btn_enviar = document.querySelector('#btn_enviar');

        btn_enviar.addEventListener('click', function () {
          enviar_dados(
            NomeDaEmpresa.value,  //-------------->2 
            id.value, 
            campo_pergunta.value,
            prompt.value
          );
          btn_enviar.setAttribute('disabled', 'true');
        });
        
        async function enviar_dados(
          NomeDaEmpresa, //-------------->3 
          id,
          campo_pergunta,
          prompt
        ) {
          window.setTimeout(function () {
            btn_enviar.removeAttribute('disabled');
          }, 15000);
          var formdata = new FormData();
          formdata.append("NomeDaEmpresa", NomeDaEmpresa); //-------------->4
          formdata.append("id", id);
          formdata.append("campo_pergunta", campo_pergunta);
          formdata.append("prompt", prompt);
          var requestOptions = {
              method: 'POST',
              body: formdata,
              redirect: 'follow'
          };
          let resp = await fetch("./proxy.php", requestOptions);
          resp = await resp.json();
          if (resp?.result?.content !== null) {
            resultado.innerHTML = resp?.result?.content;
            btn_enviar.removeAttribute('disabled');
          }
        }
      });
    </script>
   <script src="js/custom.js"></script>
  </body>
</html>
