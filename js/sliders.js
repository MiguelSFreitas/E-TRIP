
function ligarSlider(idSlider, idValor) {
    const slider = document.getElementById(idSlider);
    const valor  = document.getElementById(idValor);
    const atualizar = () => { valor.textContent = slider.value + '%'; };
    slider.addEventListener('input', atualizar);
    atualizar();
}

ligarSlider('percentual_saida', 'valor_saida');
ligarSlider('percentual_chegada', 'valor_chegada');