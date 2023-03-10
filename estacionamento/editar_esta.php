<style>
      /* Works for Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

     
</style>

<h1>Editar Veículo</h1>

<?php
    $sql = "SELECT * from estacionamento WHERE id =".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    $nr_cadastrado = "SELECT * from apartamentos WHERE id = $row->apartamento_id";
    $res_nr = $conn->query($nr_cadastrado);
    $row_apt = $res_nr->fetch_object();

    // var_dump($row_apt);
?>



<form action="?page=salvar_esta" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">


    <div class="row mb-3">
        <div class="col-3">
                <label for="numero">Apartamento</label>
                <input type="number" name="numero" value="<?php print $row_apt->numero; ?>" class="form-control">
            
        </div>

        <div class="col-5">
            <label for="vaga">Número da Vaga</label>
            <input type="number" name="vaga" value="<?php print $row->vaga; ?>" class="form-control">
        </div>

        <div class="col-4">
            <label for="vaga">Placa</label>
            <input type="text" name="placa" value="<?php print $row->placa; ?>" class="form-control">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="veiculo">Veículo</label>
            <input type="text" name="veiculo" value="<?php print $row->tipo_veiculo; ?>" class="form-control">
            
        </div>

        <div class="col-6">
            <label for="marca">Marca</label>
            <input type="text" name="marca" value="<?php print $row->marca; ?>" class="form-control">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" value="<?php print $row->modelo; ?>" class="form-control">
        </div>
        <div class="col-6">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="<?php print $row->cor; ?>" class="form-control">
        </div>
    </div>

    
    <div class="row mb-3">
        <div class="col-12">
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
        </div>
    </div>
    

</form>