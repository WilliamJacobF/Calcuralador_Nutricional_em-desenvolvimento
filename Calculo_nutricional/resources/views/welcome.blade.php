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
    <input type="text" id="Nome" placeholder="exemplo:arroz" required><br>
    <label for="quantidade">Quantidade (g):</label><br>
    <input type="number" id="quantidade" placeholder="ex: 300" required><br><br>
    <button type="submit" class="btn btn-primary" >Buscar</button>
    
  </form>


  <div class="resultado" id="resultado"></div>

  <script>
    document.getElementById('formBusca').addEventListener('submit', function (e) {
    e.preventDefault();

    const nome = document.getElementById('Nome').value;
    const quantidade = document.getElementById('quantidade').value;
    const resultadoDiv = document.getElementById('resultado');

    fetch(`http://localhost:8000/api/alimentos/buscar/${encodeURIComponent(nome)}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('alimento não encontrado');
        }
        return response.json();
      })
      .then(data => {

        // regra de 3 (base 100g)
        const fator = quantidade / 100;

        const calorias = data.Calorias * fator;
        const proteinas = data.Proteinas * fator;
        const carboidratos = data.Carboidratos * fator;
        const gorduras = data.Gorduras * fator;

        resultadoDiv.innerHTML = `
          <strong>${data.Nome}</strong><br>
          Quantidade: ${quantidade}g<br><br>
          Calorias: ${calorias.toFixed(2)}<br>
          Proteínas: ${proteinas.toFixed(2)}g<br>
          Carboidratos: ${carboidratos.toFixed(2)}g<br>
          Gorduras: ${gorduras.toFixed(2)}g
        `;
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