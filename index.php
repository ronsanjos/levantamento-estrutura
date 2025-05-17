<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Periféricos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        /* Centraliza o texto dos cabeçalhos */
        #tabelaDados thead th {
            text-align: center;
            vertical-align: middle;
        }

        /* Centraliza o texto das células do corpo da tabela */
        #tabelaDados tbody td {
            text-align: center;
            vertical-align: middle;
        }

        /* Centraliza o conteúdo da tabela inteira */
        #tabelaDados {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/logo.png" alt="Logo" width="75" height="75" class="me-2">
                Levantamento de Estrutura - ARIUS BA
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Cadastro de Periféricos por PDV</h1>

        <form id="formPerifericos" class="mb-4">
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="pdv" class="form-label">PDV</label>
                    <select class="form-select" id="pdv" name="pdv" required>
                        <option value="">Selecione</option>
                        <option value="PDV 01">PDV 01</option>
                        <option value="PDV 02">PDV 02</option>
                        <option value="PDV 03">PDV 03</option>
                        <option value="PDV 04">PDV 04</option>
                        <option value="PDV 05">PDV 05</option>
                    </select>
                </div>
            </div>

            <br>
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="processador" class="form-label">Processador</label>
                    <select class="form-select" id="processador" name="processador" required>
                        <option value="">Selecione</option>
                        <option value="Intel Celeron J1800">Intel Celeron J1800</option>
                        <option value="Intel Celeron N3350 1.10GHz">Intel Celeron N3350 1.10GHz</option>
                        <option value="Intel Core i3-3220 3.30GHz">Intel Core i3-3220 3.30GHz</option>
                        <option value="Intel Core i3-8100 3.6GHz">Intel Core i3-8100 3.6GHz</option>
                        <option value="Intel i5">Intel i5</option>
                        <option value="Intel Pentium J3710 1.60GHz">Intel Pentium J3710 1.60GHz</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="memoria" class="form-label">Memória (GB)</label>
                    <select class="form-select" id="memoria" name="memoria" required>
                        <option value="">Selecione</option>
                        <option value="4 GB">4 GB</option>
                        <option value="8 GB">8 GB</option>
                        <option value="16 GB">16 GB</option>
                        <option value="32 GB">32 GB</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="armazenamento" class="form-label">Armazenamento</label>
                    <select class="form-select" id="armazenamento" name="armazenamento" required>
                        <option value="">Selecione</option>
                        <option value="HD 500GB">HD 500GB</option>
                        <option value="SSD 120GB">SSD 120GB</option>
                        <option value="SSD 256GB">SSD 256GB</option>
                        <option value="SSD 512GB">SSD 512GB</option>
                        <option value="SSD 1TB">SSD 1TB</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="impressora" class="form-label">Impressora</label>
                    <select class="form-select" id="impressora" name="impressora" required>
                        <option value="">Selecione</option>
                        <option value="Bematech MP-4200 TH">Bematech MP-4200 TH</option>
                        <option value="Daruma">Daruma</option>
                        <option value="Elgin i8 - USB">Elgin i8 - USB</option>
                        <option value="Elgin i9 - USB">Elgin i9 - USB</option>
                        <option value="Elgin Serial">Elgin Serial</option>
                        <option value="Epson TM T20">Epson TM T20</option>
                        <option value="Epson TM T20X">Epson TM T20X</option>
                        <option value="Sweda">Sweda</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
            </div>
            <br>

            <div class="row g-3">
                <div class="col-md-2">
                    <label for="balanca" class="form-label">Balança</label>
                    <select class="form-select" id="balanca" name="balanca" required>
                        <option value="">Selecione</option>
                        <option value="Toledo - Conv. SERIAL-USB">Toledo - Conv. SERIAL-USB</option>
                        <option value="Urano - Conv. SERIAL-USB">Urano - Conv. SERIAL-USB</option>
                        <option value="SERIAL">SERIAL</option>
                        <option value="USB">USB</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="scanner" class="form-label">Scanner</label>
                    <select class="form-select" id="scanner" name="scanner" required>
                        <option value="">Selecione</option>
                        <option value="De Mão - USB">De Mão - USB</option>
                        <option value="De Mesa - SERIAL">De Mesa - SERIAL</option>
                        <option value="De Mesa - USB">De Mesa - USB</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="pinpad" class="form-label">PINPAD</label>
                    <select class="form-select" id="pinpad" name="pinpad" required>
                        <option value="">Selecione</option>
                        <option value="Possui">Possui</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="pos" class="form-label">Máquina POS</label>
                    <select class="form-select" id="pos" name="pos" required>
                        <option value="">Selecione</option>
                        <option value="Possui">Possui</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="gaveteiro" class="form-label">Gaveteiro</label>
                    <select class="form-select" id="gaveteiro" name="gaveteiro" required>
                        <option value="">Selecione</option>
                        <option value="Possui">Possui</option>
                        <option value="Não Possui">Não Possui</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-secondary" onclick="limparEdicao()">Limpar Campos</button>
                <button type="button" class="btn btn-danger" onclick="limparTabela()">Limpar Tabela</button>
                <button type="button" class="btn btn-primary text-white" onclick="imprimirPDF()">Imprimir PDF</button>
            </div>
        </form>

        <div id="mensagem" class="mb-3"></div>

        <table id="tabelaDados" class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>PDV</th>
                    <th>Processador</th>
                    <th>Memória</th>
                    <th>Armazenamento</th>
                    <th>Impressora</th>
                    <th>Balança</th>
                    <th>Scanner</th>
                    <th>PINPAD</th>
                    <th>Máquina POS</th>
                    <th>Gaveteiro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Linhas preenchidas pelo JS -->
            </tbody>
        </table>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
</body>

</html>
