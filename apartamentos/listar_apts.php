
<div class="d-flex justify-content-between mb-3">
    <h1>Listagem Apartamentos</h1>
</div>
<!-- ?page=listar -->

<div class="row mb-3">
        <div class="col-2">
            <!-- form de pesquisa -->
            <form action="?page=listar" method="post">
                <label for="numero">Número</label>
                <input type="number" name="numero" id="numero" class="form-control">
                <button class="mt-3 btn btn-primary" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            
        </div>
</div>
    
<?php
    // var_dump($_POST['numero']);
    //seleciona todos os dados do banco
    if(isset($_POST['numero']))
    {
        $sql = "SELECT * FROM apartamentos WHERE numero =".$_REQUEST["numero"];
        $res = $conn->query($sql);
        $qtd = $res->num_rows;
    } else {
        $sql = "SELECT * FROM apartamentos";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;
    }
    
    
    if($qtd > 0)
    {
        print "<table class='table table-hover table-striped table-bordered'>";
        
        print "<tr>";

        print "<th>Número </th>";
        print "<th>Nome do Morador</th>";
        print "<th>Telefone</th>";
        print "<th>Email</th>";
        // print "<th>Observações</th>";
        print "<th>Ações</th>";

        print "</tr>";
        
        while($row = $res->fetch_object())
        {
            // var_dump($row = $res->fetch_object());
            print "<tr>";

            print "<td>" . $row->numero . "</td>";
            print "<td>" .$row->nome_morador. "</td>";
            print "<td>" .$row->telefone_morador. "</td>";
            print "<td>" .$row->email_morador. "</td>";
            // print "<td>" .$row->animal. "</td>";
            print "<td>
                        <button 
                            onClick=\"location.href='?page=editar&id=" .$row->id."'\" 
                            class='btn btn-success'> 
                            <i class='fa-solid fa-pen'></i>
                        </button>
                        <button 
                            onClick=\"if(confirm('Tem certeza que deseja excluir?'))
                            {
                                location.href='?page=salvar&acao=excluir&id=".$row->id."';
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