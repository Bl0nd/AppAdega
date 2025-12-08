// --- Elementos do DOM ---
const inputTelefone = document.getElementById('telefone');
const inputCPF = document.getElementById('cpf');

// ----------------------------------------------------------------
// 1. MÁSCARA DE TELEFONE (Padrão: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX)
// ----------------------------------------------------------------

const aplicarMascaraTelefone = (valor) => {
    // Remove tudo que não for dígito
    valor = valor.replace(/\D/g, ""); 
    
    if (valor.length > 0) {
        valor = "(" + valor; // (XX
    }
    if (valor.length > 3) {
        valor = valor.substring(0, 3) + ") " + valor.substring(3); // (XX) X
    }
    if (valor.length > 9) {
        valor = valor.substring(0, 9) + "-" + valor.substring(9); // (XX) XXXXX-XXXX
    }
    if (valor.length > 14) {
        valor = valor.substring(0, 15); // Limita em 15 caracteres
    }
    
    return valor;
};

// ----------------------------------------------------------------
// 2. MÁSCARA DE CPF (Padrão: XXX.XXX.XXX-XX)
// ----------------------------------------------------------------

const aplicarMascaraCPF = (valor) => {
    // Remove tudo que não for dígito
    valor = valor.replace(/\D/g, ""); 
    
    if (valor.length > 3) {
        valor = valor.substring(0, 3) + "." + valor.substring(3); // XXX.
    }
    if (valor.length > 7) {
        valor = valor.substring(0, 7) + "." + valor.substring(7); // XXX.XXX.
    }
    if (valor.length > 11) {
        valor = valor.substring(0, 11) + "-" + valor.substring(11); // XXX.XXX.XXX-XX
    }
    if (valor.length > 14) {
        valor = valor.substring(0, 14); // Limita em 14 caracteres
    }
    
    return valor;
};

// ----------------------------------------------------------------
// 3. APLICAÇÃO DOS EVENT LISTENERS
// ----------------------------------------------------------------

// Aplica máscara de telefone, se o elemento existir
if (inputTelefone) {
    inputTelefone.addEventListener('input', (event) => {
        event.target.value = aplicarMascaraTelefone(event.target.value);
    });
}

// Aplica máscara de CPF, se o elemento existir
if (inputCPF) {
    inputCPF.addEventListener('input', (event) => {
        event.target.value = aplicarMascaraCPF(event.target.value);
    });
}

// Carrosel produto
document.querySelectorAll(".categoria").forEach(categoria => {
    let index = 0;

    const items = categoria.querySelectorAll(".item");
    const total = items.length;
    const itensPorVez = 3;

    const itemsContainer = categoria.querySelector(".carrossel-items");

    categoria.querySelector(".next").addEventListener("click", () => {
        if (index < total - itensPorVez) {
            index++;
            atualizar();
        }
    });

    categoria.querySelector(".prev").addEventListener("click", () => {
        if (index > 0) {
            index--;
            atualizar();
        }
    });

    function atualizar() {
        const largura = categoria.querySelector(".item").clientWidth;
        itemsContainer.style.transform = `translateX(${-index * largura}px)`;
    }
});