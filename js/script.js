const campos = [
  "PDV",
  "Processador",
  "Memoria",
  "Armazenamento",
  "Impressora",
  "Balanca",
  "Scanner",
  "Pinpad",
  "Pos",
  "Gaveteiro",
];
let perifericos = JSON.parse(localStorage.getItem("perifericos")) || [];

function atualizarTabela() {
  const tbody = document.querySelector("#tabelaDados tbody");
  tbody.innerHTML = "";
  perifericos.forEach((p, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML =
      campos.map((c) => `<td>${p[c.toLowerCase()]}</td>`).join("") +
      `<td>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-sm btn-warning btn-editar" data-index="${index}">Editar</button>
                    <button class="btn btn-sm btn-danger btn-excluir" data-index="${index}">Excluir</button>
                </div>
            </td>`;
    tbody.appendChild(tr);
  });

  // Listeners para os botões editar e excluir
  document.querySelectorAll(".btn-editar").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const idx = e.target.getAttribute("data-index");
      editarPeriferico(idx);
    });
  });

  document.querySelectorAll(".btn-excluir").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const idx = e.target.getAttribute("data-index");
      excluirPeriferico(idx);
    });
  });
}

function mostrarMensagem(msg, tipo = "success") {
  const div = document.getElementById("mensagem");
  div.innerHTML = `<div class="alert alert-${tipo}" role="alert">${msg}</div>`;
  setTimeout(() => (div.innerHTML = ""), 4000);
}

function editarPeriferico(index) {
  const p = perifericos[index];
  campos.forEach((c) => {
    const campo = document.getElementById(c.toLowerCase());
    if (campo) campo.value = p[c.toLowerCase()];
  });
  // Guarda o índice para edição
  document.getElementById("formPerifericos").dataset.editIndex = index;
  // Focar no primeiro campo (PDV)
  document.getElementById("pdv").focus();
}

function excluirPeriferico(index) {
  if (confirm("Deseja realmente excluir este periférico?")) {
    perifericos.splice(index, 1);
    localStorage.setItem("perifericos", JSON.stringify(perifericos));
    atualizarTabela();
    mostrarMensagem("Periférico excluído com sucesso.");
    limparEdicao();
  }
}

function limparEdicao() {
  const form = document.getElementById("formPerifericos");
  delete form.dataset.editIndex;
}

document
  .getElementById("formPerifericos")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const novoObj = {};
    campos.forEach((c) => {
      novoObj[c.toLowerCase()] = document.getElementById(c.toLowerCase()).value;
    });

    const editIndex = this.dataset.editIndex;
    const existeDuplicado = perifericos.some((p, i) => {
      if (editIndex !== undefined && i == editIndex) return false;
      return p.pdv === novoObj.pdv;
    });

    if (existeDuplicado) {
      mostrarMensagem(
        "Já existe um periférico cadastrado com este PDV.",
        "danger"
      );
      return;
    }

    if (editIndex !== undefined) {
      perifericos[editIndex] = novoObj;
      delete this.dataset.editIndex;
      mostrarMensagem("Periférico atualizado com sucesso!");
    } else {
      perifericos.push(novoObj);
      mostrarMensagem("Periférico cadastrado com sucesso!");
    }

    localStorage.setItem("perifericos", JSON.stringify(perifericos));
    atualizarTabela();
    this.reset();
    document.getElementById(campos[0].toLowerCase()).focus();
  });

function limparTabela() {
  if (confirm("Tem certeza que deseja apagar todos os registros da tabela?")) {
    perifericos = [];
    localStorage.removeItem("perifericos");
    atualizarTabela();
    mostrarMensagem("Todos os dados da tabela foram apagados.", "warning");
    limparEdicao();
  }
}

// Inicializa tabela ao carregar
atualizarTabela();

function imprimirPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF({ orientation: "landscape" });

  let y = 10;
  doc.setFontSize(14);

  const titulo = "Levantamento de Estruturas - ARIUS BA";
  const pageWidth = doc.internal.pageSize.getWidth();
  const textWidth = doc.getTextWidth(titulo);
  const x = (pageWidth - textWidth) / 2;
  doc.text(titulo, x, y);
  y += 10;

  if (perifericos.length === 0) {
    doc.setFontSize(12);
    doc.text("Nenhum periférico cadastrado.", 14, y);
  } else {
    const colunas = [
      "PDV",
      "Processador",
      "Memória",
      "Armazenamento",
      "Impressora",
      "Balança",
      "Scanner",
      "PINPAD",
      "Pos",
      "Gaveteiro",
    ];
    const linhas = perifericos.map((p) => [
      p.pdv,
      p.processador,
      p.memoria,
      p.armazenamento,
      p.impressora,
      p.balanca,
      p.scanner,
      p.pinpad,
      p.pos,
      p.gaveteiro,
    ]);

    doc.autoTable({
      head: [colunas],
      body: linhas,
      startY: y,
      styles: {
        fontSize: 10,
        cellPadding: 2,
        overflow: "linebreak",
        halign: "center",
        //lineColor: [255, 255, 255], // borda branca
        lineColor: [0, 0, 0],
        lineWidth: 0.5, // espessura da borda
      },
      columnStyles: {
        0: { cellWidth: 16 },
        1: { cellWidth: 40 },
        2: { cellWidth: 20 },
        3: { cellWidth: 32 },
        4: { cellWidth: 35 },
        5: { cellWidth: 26 },
        6: { cellWidth: 27 },
        7: { cellWidth: 25 },
        8: { cellWidth: 25 },
        9: { cellWidth: 20 },
      },
      tableWidth: "auto",
      margin: { horizontal: "auto" },
    });
  }

  doc.save("cadastro_perifericos.pdf");
}
