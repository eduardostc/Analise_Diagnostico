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
<!--Inicio das perguntas AMBIENTE--------------------------->
              <div class="form-group mb-3 row">
                <div class="my-3 col">
                
                        <label class="form-label" for="id" style="color: green"
                          >Selecione a Empresa:</label
                        >    
                        <select
                          class="form-select"
                          name="id"
                          id="situacao_id"
                        >
                        <!--  <option value="resposta.dados[i]['email']" style="font-weight: bold;">Selecione a Empresa</option>    -->                                         
                        <option value="" style="font-weight: bold;">Selecione a Empresa</option>
                        </select>
                        <span id="msgAlertaID"></span>
<!-- SEGUNDO CAMPO DO FORMULÁRIO
                        <label
                          class="form-label"
                          for="form_empresa"
                          style="color: green"
                          >Nome da Empresa:</label
                        >
                        <input
                          class="form-control"
                          type="text"
                          name="form_empresa"
                          id="form_empresa"
                          maxlength="100"
                        /> --->
                        <input type="hidden" name="form_empresa" id="form_empresa" />
                  </div>
                </div>
<!--PROMPT------------------------------------------------------------------>
                <div class="my-3 col">
                  <label
                    class="form-label"
                    for="prompt"
                    style="color: green; font-weight: bold;"
                    >Prompt:</label
                  >
                  <select
                    class="form-select"
                    name="prompt"
                    id="prompt"
                  >
                    <option value="" style="font-weight: bold;">Escolha uma das opção abaixo:</option>
                    <option value="Faça uma analise descritivo sintetizando com de limite de output de 1000 caracteres">Resumo descritivo sintetizando cada campo:</option>
                    <option value="Faça um resumo das palavras chaves mencionada em cada input, de modo que explique utilizando no máximo 1000 caracteres.">Resumo das palavras chaves mencionada em cada campo:</option>                    
                                                            
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
      window.addEventListener('load', function () {
        const form_empresa = document.querySelector('#form_empresa');
        const id = document.querySelector('#id');
        const prompt = document.querySelector('#prompt'); 
        const resultado = document.querySelector('#resultado');
        const btn_enviar = document.querySelector('#btn_enviar');
        
        btn_enviar.addEventListener('click', function () {
          enviar_dados(
            form_empresa.value, 
            id.value, 
            prompt.value
          );
          btn_enviar.setAttribute('disabled', 'true');
        });
        
        async function enviar_dados(
          form_empresa,
          id,
          prompt
        ) {
          window.setTimeout(function () {
            btn_enviar.removeAttribute('disabled');
          }, 15000);
          var formdata = new FormData();
          formdata.append("form_empresa", form_empresa); //AMBIENTE
          formdata.append("id", id);
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
