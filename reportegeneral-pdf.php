<?php
    include("conexion.php");

    if(isset($_POST['desde'])){
        $desde = $_POST['desde'];
    }else{
        $desde = "";
    }

    if(isset($_POST['hasta'])){
        $hasta = $_POST['hasta'];
    }else{
        $hasta = "";
    }
    $company = mysqli_query($con, 'select * from company');
    $rowcompany = mysqli_fetch_assoc($company);
?>

<!DOCTYPE html>
<html lang="en">
<head id="head">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="assets/css/PDFstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body id="pdf">
    <div class="container" id="container">
        <div id="pag1" style="height: 1500px;">
            <div class="container container-bg rounded-pill py-3 my-3 text-white">
                <div class="row">
                    <div class="col-7">
                        <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                    </div> 
                    <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                        R E P O R T E &nbsp;&nbsp;&nbsp;G E N E R A L
                    </div>   
                </div>
            </div>
            <br>
            <div class="row mx-2">
                <div class="col font-weight-bold">Desde: <span id="desde">19-10-2023</span></div>
                <div class="col font-weight-bold text-right">Total en USD : <span id="total_usd">$10203</span></div>
            </div>
            <div class="row mx-2">
                <div class="col font-weight-bold">Hasta: <span id="hasta">23-10-2023</span></div>
                <div class="col font-weight-bold text-right">Total en Pesos : <span id="total_pesos">$10203</span></div>
            </div>
            <br>
            <div class="container container-bg rounded-pill my-3 text-color">
                <div class="row font-weight-bold">
                    <div class="col-3">Fecha</div>
                    <div class="col">Concepto</div>
                    <div class="col">Tipo de Ingreso</div>
                    <div class="col">Moneda de Cambio</div>
                    <div class="col">Monto</div>
                </div>
            </div>
            <div id="tabla"></div> 
        </div>
    </div>
</body>
<script>
    window.jsPDF = window.jspdf.jsPDF;
    document.getElementById("pdf").onload = function() {
        generatePDF();
    };

    function generatePDF() {
        const pdf = new jsPDF();
        let total_pages = 1;
        $.ajax({
            url: "reportegeneral-query.php",
            type: "POST",
            success: function(serverResponse) {
                let userResponse = jQuery.parseJSON(serverResponse);
                let inputDesde = '<?php echo $desde;?>';
                let inputHasta = '<?php echo $hasta;?>';
                document.getElementById('desde').value = inputDesde;
                document.getElementById('hasta').value = inputHasta;
                let container = document.getElementById('container');
                let table = document.getElementById('tabla');
                console.log('Desde: ' + inputDesde + ' Hasta: ' + inputHasta);
                if (inputDesde == '') {
                    inputDesde = new Date(0).getTime();
                } else {
                    inputDesde = new Date(inputDesde).getTime();
                }
                if (inputHasta == '') {
                    inputHasta = new Date().getTime();
                } else {
                    inputHasta = new Date(inputHasta).getTime();
                }
                let total_usd = 0;
                let total_pesos = 0;
                let total_registros = 0;

                for (const userKey in userResponse) {
                    const userData = userResponse[userKey];
                    if ((new Date(userData['date']).getTime() >= inputDesde) && (new Date(userData['date']).getTime() <= inputHasta)) {
                        total_registros++;
                    }
                }
                let real_total_pages = ((Math.trunc(total_registros/20))<(total_registros/20))? (Math.trunc(total_registros/20))+1 : Math.trunc(total_registros/20);
                let cont = 0;
                for (const userKey in userResponse) {
                    const userData = userResponse[userKey];
                    if ((new Date(userData['date']).getTime() >= inputDesde) && (new Date(userData['date']).getTime() <= inputHasta)) {
                        console.log('cont:'+cont);
                        if(cont>=20){
                            cont = 0;
                            console.log('ENTRE AL IF cont:'+cont);
                            document.getElementById('pag'+total_pages).innerHTML += `
                                <hr class="hr-style">
                                <div class="d-flex flex-row-reverse">
                                    <span class="page-num-bg rounded-pill px-3 font-weight-bold"> `+total_pages+`/`+real_total_pages+` </span>
                                </div>
                            `;
                            let divPage = document.createElement('div');
                            total_pages++;
                            divPage.setAttribute('id','pag'+total_pages);
                            divPage.setAttribute('style','height: 1500px;');
                            divPage.innerHTML = `
                                <div class="container container-bg rounded-pill py-3 my-3 text-white">
                                    <div class="row">
                                        <div class="col-7">
                                            <img src="<?php echo $rowcompany['logo_dir']?>" height="50px" class="rounded-circle ml-3">
                                        </div> 
                                        <div class="col text-right mr-4 my-auto" style="font-family: 'Archivo', sans-serif; font-size: larger;">
                                            R E P O R T E &nbsp;&nbsp;&nbsp;G E N E R A L
                                        </div>   
                                    </div>
                                </div>
                                <br>
                                <div class="container container-bg rounded-pill my-3 text-color">
                                    <div class="row font-weight-bold">
                                        <div class="col-3">Fecha</div>
                                        <div class="col">Concepto</div>
                                        <div class="col">Tipo de Ingreso</div>
                                        <div class="col">Moneda de Cambio</div>
                                        <div class="col">Monto</div>
                                    </div>
                                </div>
                            `;
                            container.appendChild(divPage);
                            let newTable = document.createElement('div');
                            newTable.setAttribute('id','table');
                            divPage.appendChild(newTable);
                            table = newTable;
                        }
                        
                        let row = document.createElement('div');
                        table.appendChild(row);
                        row.classList.add('row','font-weight-bold', 'mx-auto', 'text-secondary');
                        let colDate = document.createElement('div');
                        colDate.classList.add('col-3');
                        row.appendChild(colDate);
                        colDate.innerHTML = userData['date'];

                        let colConcept = document.createElement('div');
                        colConcept.classList.add('col');
                        row.appendChild(colConcept);
                        colConcept.innerHTML = userData['concept'];

                        let colType = document.createElement('div');
                        colType.classList.add('col');
                        row.appendChild(colType);
                        colType.innerHTML = userData['type'];

                        let colMoneda = document.createElement('div');
                        colMoneda.classList.add('col');
                        row.appendChild(colMoneda);
                        colMoneda.innerHTML = userData['moneda_cambio'];

                        let colAmount = document.createElement('div');
                        colAmount.classList.add('col');
                        row.appendChild(colAmount);
                        colAmount.innerHTML = userData['amount'];

                        let hr = document.createElement('hr');
                        table.appendChild(hr);

                        if(userData['moneda_cambio']=='USD'){
                            total_usd += parseFloat(userData['amount']);
                        }else{  
                            total_pesos += parseFloat(userData['amount']);
                        }
                        cont++;
                    }
                }
                document.getElementById('pag'+total_pages).innerHTML += `
                    <hr class="hr-style">
                    <div class="d-flex flex-row-reverse">
                        <span class="page-num-bg rounded-pill px-3 font-weight-bold"> `+total_pages+`/`+ real_total_pages + ` </span>
                    </div>
                `;
                document.getElementById('total_pesos').innerHTML = '$'+total_pesos;
                document.getElementById('total_usd').innerHTML = '$'+total_usd;
            },
        }).then(async function(){
            for(let x = 1;x<=total_pages;x++){
                const pag = document.querySelector("#pag"+x);
                let imgPag;
                (x != 1)? pdf.addPage(): '';
                await html2canvas(pag).then(canvas => {
                    imgPag = canvas.toDataURL('image/png');
                    pdf.addImage(imgPag, 'PNG', 10, 10,190,290);
                });
            }
            pdf.save("Reporte-General.pdf");
            location.href = "reportegeneral.php";
        });

     }
</script>
</html>
