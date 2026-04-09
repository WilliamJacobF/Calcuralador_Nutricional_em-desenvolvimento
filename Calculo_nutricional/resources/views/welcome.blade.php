<!DOCTYPE html>
<html lang="pt-br">
    

<head>
  <meta charset="UTF-8">
  <title>nutrição</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    .body{
      background-image: url("aliment.png");
    }
    h1,h3{
      text-align: center;
    }
    .corpo{
      position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
    }
    .testo{
      position: absolute;
      top: 55%;
    }
    
  </style>
</head>
<body class="body">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<br>
    <h1>Calculadora de Nutrientes</h1>
    <h3>Projeto de Extenção do curso de Engenharia de Software</h3>
    <hr>
<div class="corpo">
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
<div class="testo">
  <h2>Sobre o Projeto</h2>
  <p class="fs-4">Um site que mostra as Calorias, Proteinas, Carboidados e Gorduras dos Alimentos buscados, feito em Laravel usando php, HTML, CSS, Bootstrap, ligado a um banco de dados relacional(mysql)</p>
  <h2>O que é um projeto de extenção</h2>
  <p class="fs-4">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><br>    
</div>

</body>
</html>