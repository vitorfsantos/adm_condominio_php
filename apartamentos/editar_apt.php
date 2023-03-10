<style>
      /* Works for Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

     
</style>
<h1>Editar Apartamento</h1>

<?php
    $sql = "SELECT * from apartamentos WHERE id =".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="row mb-3">
        <div class="col-2">
            <label for="numero">Número</label>
            <input type="number" name="numero" value="<?php print $row->numero; ?>" class="form-control">
            
        </div>

        <div class="col-5">
            <label for="nome_morador">Nome do Morador</label>
            <input type="text" name="nome_morador" value="<?php print $row->nome_morador; ?>"class="form-control">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="telefone_morador">Telefone</label>
            <input type="number" name="telefone_morador" value="<?php print $row->telefone_morador; ?>" class="form-control">
            
        </div>

        <div class="col-6">
            <label for="email_morador">Email</label>
            <input type="text" name="email_morador" value="<?php print $row->email_morador; ?>" class="form-control">
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="obs">Observações</label>
            <input type="text" name="obs" value="<?php print $row->obs; ?>" class="form-control">
            
        </div>
    </div>

    
    <div class="row mb-3">
        <div class="col-12">
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
        </div>
    </div>

    
    
    
    

</form>