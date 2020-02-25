var div = document.querySelector('#aluno');
HTMLTemporario = div.innerHTML;
var html = '<div class="row"><div class="col-sm"> <div class="input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" for="curso">Curso</label></div><select name="curso" class="custom-select" id="curso" required><option value="">Escolha...</option><option value="1">Desenvolvimento de Sistemas</option><option value="2">Desgin de Interiores</option><option value="3">Edificações</option><option value="4">Informática Para Internet</option><option value="5">Logística</option></select></div></div><!-- input série --><div class="col-sm"><div class="input-group mb-3"><select name="serie" class="custom-select" id="serie" required><option value="">Escolha...</option><option value="1">1°Ano</option><option value="2">2°Ano</option><option value="3">3°Ano</option></select><div class="input-group-append"><label class="input-group-text" for="serie">Série</label></div></div></div></div>'
HTMLNovo = html;
HTMLTemporario = HTMLNovo + HTMLTemporario;

function adc(){
  if(document.getElementById('distincao').value == 3){
    div.innerHTML = HTMLTemporario;
  }else{
    div.innerHTML = '';
  }
}
