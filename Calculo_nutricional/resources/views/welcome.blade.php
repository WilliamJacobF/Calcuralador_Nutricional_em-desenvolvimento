<!DOCTYPE html>
<html lang="pt-br">
    

<head>
  <meta charset="UTF-8">
  <title>nutrição</title>
</head>
<body class="body">

    <div class="divtitle">
    <h1 class="fw-bold ">alimentos</h1>
    </div>

  <div class="divform position-absolute top-50 start-50 translate-middle w-50 p-3 h-50 d-inline-block border border-dark rounded-4">
    <div class="position-absolute top-50 start-50 translate-middle">
  <form id="formBusca">
    <label class="divlabel" for="Nome">Digite o nome do alimento:</label><br>
    <input type="text" id="Nome" placeholder="exemplo:arroz" required>
    <button type="submit" class="btn btn-primary" >Buscar</button>
    
  </form>


  <div class="resultado" id="resultado"></div>

  <script>
    document.getElementById('formBusca').addEventListener('submit', function (e) {
      e.preventDefault();

      const nome = document.getElementById('Nome').value;
      const resultadoDiv = document.getElementById('resultado');

      fetch(`http://localhost:8000/api/alimentos/buscar/${encodeURIComponent(nome)}`)
        .then(response => {
          if (!response.ok) {
            throw new Error('alimento não encontrado');
          }
          return response.json();
        })
        .then(data => {
          resultadoDiv.innerHTML = `Nome: ${data.Nome}<br>Calorias: ${data.Calorias}<br>Proteinas: ${data.Proteinas}<br>Carboidratos: ${data.Carboidratos}<br>Gorduras: ${data.Gorduras}`;
        })
        .catch(error => {
          resultadoDiv.innerHTML = error.message;
        });
    });
  </script>    
  </div>
</div>
</body>
</html>