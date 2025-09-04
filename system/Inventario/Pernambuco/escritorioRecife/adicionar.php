<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário Dinâmico</title>
  <style>
    .hidden { display: none; }
  </style>
</head>
<body>
  <form>
    <label for="local">Local</label>
    <input type="text" id="local" placeholder="Digite o local do equipamento">
    <label>Escolha uma opção:</label>
    <select id="opcao">
      <option value="">Selecione...</option>
      <option value="gabinete">Gabinete</option>
      <option value="monitor">Monitor</option>
      <option value="mouse">mouse</option>
      <option value="teclado">teclado</option>
      <option value="gabinete">notebook</option>
      <option value="switch">switch</option>
      <option value="roteador">roteador</option>
      <option value="projetor">projetor</option>
      <option value="caixaDeSom">Caixa De Som</option>
      <option value="webcam">webcam</option>
      <option value="tv">TV</option>
    </select>

    <!-- Campos para Pessoa -->
    <div id="gabinete" class="hidden">
        <label>Hostname:</label>
      <input type="text" name="cpf">
        <label>Processador:</label>
      <input type="text" name="nome"><br>
      <label>Armazenamento:</label>
      <input type="text" name="nome"><br>
      <label>Menoria:</label>
      <input type="text" name="cpf">
      <label>SO:</label>
      <input type="text" name="nome"><br>
      <label>Teamviewer:</label>
      <input type="text" name="cpf">
      <label>Antivirus:</label>
      <input type="text" name="nome"><br>
      
      
    </div>

    <!-- Campos para Empresa -->
    <div id="empresa" class="hidden">
      <label>Razão Social:</label>
      <input type="text" name="razao"><br>
      <label>CNPJ:</label>
      <input type="text" name="cnpj">
    </div>
  </form>

  <script>
    const select = document.getElementById('opcao');
    const pessoa = document.getElementById('gabinete');
    const empresa = document.getElementById('empresa');

    select.addEventListener('change', () => {
      gabinete.classList.add('hidden');
      empresa.classList.add('hidden');
      
      if (select.value === 'gabinete') pessoa.classList.remove('hidden');
      if (select.value === 'empresa') empresa.classList.remove('hidden');
    });
  </script>
</body>
</html>
