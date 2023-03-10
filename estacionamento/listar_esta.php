
<div class="d-flex justify-content-between mb-3">
    <h1>Listagem Estacionamento</h1>
</div>
<!-- ?page=listar -->

<div class="row mb-3">
        <div class="col-2">
            <!-- form de pesquisa -->
            <form action="?page=listar_esta" method="post">
                <label for="vaga">Vaga</label>
                <input type="number" name="vaga" id="vaga" class="form-control">
                <button class="mt-3 btn btn-primary" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            
        </div>
</div>
    
<?php
   if(!empty($_POST['vaga'])){
        
        $sql = "SELECT * FROM estacionamento WHERE vaga = ".$_REQUEST["vaga"];
        $res = $conn->query($sql);
        $qtd = 0;
        if($res != false){
            $qtd = $res->num_rows;
        }
        
        
    }
    else {
        $sql = "SELECT * FROM estacionamento";
        $res = $conn->query($sql);
        
        $qtd = $res->num_rows;
    }

 

    
    

    if($qtd > 0)
    {
        print "<table class='table table-hover table-striped table-bordered'>";
        
        print "<tr>";

        print "<th>Apartamento </th>";
        print "<th>Placa </th>";
        print "<th>Vaga</th>";
        print "<th>Tipo de Veículo</th>";
        print "<th>Marca</th>";
        print "<th>Modelo</th>";
        print "<th>Cor</th>";

        print "</tr>";
        
        while($row = $res->fetch_object())
        {
            $sql_apt = "SELECT * FROM apartamentos WHERE id = $row->apartamento_id";
            $res_apt = $conn->query($sql_apt);
            $row_apt = $res_apt->fetch_object();
            // $qtd = $res->num_rows;


            print "<tr>";

            print "<td>" . $row_apt->numero . "</td>";
            print "<td>" .$row->placa. "</td>";
            print "<td>" .$row->vaga. "</td>";
            print "<td>" .$row->tipo_veiculo. "</td>";
            print "<td>" .$row->marca. "</td>";
            print "<td>" .$row->modelo. "</td>";
            print "<td>" .$row->cor. "</td>";
            print "<td>
                        <button 
                            onClick=\"location.href='?page=editar_esta&id=" .$row->id."'\" 
                            class='btn btn-success'> 
                            <i class='fa-solid fa-pen'></i>
                        </button>
                        <button 
                            onClick=\"if(confirm('Tem certeza que deseja excluir?'))
                            {
                                location.href='?page=salvar_esta&acao=excluir&id=".$row->id."';
                            }else{false;}\" 
                            class='btn btn-danger'>
                            <i class='fa-solid fa-trash'></i>
                        </button>
                   </td>";

            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'> Dados não foram encontrados</p>";
    }
?>