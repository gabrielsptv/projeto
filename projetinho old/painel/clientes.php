<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/stylecl.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-usuario').DataTable({
                "dom": '<"toolbar">frtip',
			    "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "proc_pesq_clientes.php",
					"type": "POST"
				}
			});
		} );
		</script>


</head>
<body>
       
<div class="main-panel">
       
        <h1>Clientes</h1>

<div id="pr">


        <div class="table">


                <table id="listar-usuario" class="display">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Email</th>

                            <th>Telefone</th>

                            <th>Estado</th>

                            <th>Bonus</th>

                        </tr>

                    </thead>

                </table>		


        </div>

</div>

    </body>
</html>