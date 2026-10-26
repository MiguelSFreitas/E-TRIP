/**
 * selects.js
 *
 * Faz a cascata marca -> modelo -> versao usando os dados que o PHP
 * já exportou em "carrosDisponiveis" (declarado no index.php, antes
 * deste script ser carregado). Não busca nada separado — só filtra
 * o array que já está na página.
 *
 * Ao final, preenche o campo oculto #carro_id com o id do carro
 * escolhido, que é o único dado que o CalculoEnergia.php usa.
 */

document.addEventListener('DOMContentLoaded', function () {

    const selectMarca = document.getElementById('marca');
    const selectModelo = document.getElementById('modelo');
    const selectVersao = document.getElementById('versao');
    const campoCarroId = document.getElementById('carro_id');

    const blocoModelo = document.getElementById('bloco_modelo');
    const blocoVersao = document.getElementById('bloco_versao');

    // Guarda os carros filtrados da marca atual, pra não precisar
    // repetir o filtro quando o modelo mudar.
    let carrosDaMarca = [];

    function limparSelect(select, textoPlaceholder) {
        select.innerHTML = '';
        const opcaoVazia = document.createElement('option');
        opcaoVazia.value = '';
        opcaoVazia.textContent = textoPlaceholder;
        select.appendChild(opcaoVazia);
    }

    function preencherModelos(marcaEscolhida) {
        carrosDaMarca = carrosDisponiveis.filter(function (carro) {
            return carro.marca === marcaEscolhida;
        });

        limparSelect(selectModelo, 'Selecione o modelo');

        // Modelos únicos dessa marca (pode ter mais de uma versão por modelo)
        const modelosUnicos = [...new Set(carrosDaMarca.map(function (c) { return c.modelo; }))];

        modelosUnicos.forEach(function (modelo) {
            const opcao = document.createElement('option');
            opcao.value = modelo;
            opcao.textContent = modelo;
            selectModelo.appendChild(opcao);
        });

        blocoModelo.classList.remove('oculto');
        blocoVersao.classList.add('oculto');
        limparSelect(selectVersao, 'Selecione a versão');
        campoCarroId.value = '';
    }

    function preencherVersoes(modeloEscolhido) {
        const versoesDoModelo = carrosDaMarca.filter(function (carro) {
            return carro.modelo === modeloEscolhido;
        });

        limparSelect(selectVersao, 'Selecione a versão');

        versoesDoModelo.forEach(function (carro) {
            const opcao = document.createElement('option');
            opcao.value = carro.id; // o value já é o id, facilita o passo final
            opcao.textContent = carro.versao;
            selectVersao.appendChild(opcao);
        });

        blocoVersao.classList.remove('oculto');
        campoCarroId.value = '';
    }

    selectMarca.addEventListener('change', function () {
        if (!selectMarca.value) {
            blocoModelo.classList.add('oculto');
            blocoVersao.classList.add('oculto');
            campoCarroId.value = '';
            return;
        }
        preencherModelos(selectMarca.value);
    });

    selectModelo.addEventListener('change', function () {
        if (!selectModelo.value) {
            blocoVersao.classList.add('oculto');
            campoCarroId.value = '';
            return;
        }
        preencherVersoes(selectModelo.value);
    });

    selectVersao.addEventListener('change', function () {
        // O value do select de versão já é o id do carro (ver preencherVersoes)
        campoCarroId.value = selectVersao.value;
    });

});