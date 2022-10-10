<?php
    require_once '../includes/header.php';

    require_once '../php_action/db_connect.php';

    $sql = "SELECT id as idgrade, nome as nomegrade FROM produtosgrade ";
    $resultado = mysqli_query($connect, $sql);
    $sql2 = "SELECT id as idgrupo, nome as grupo FROM produtosgrupo";
    $resultado2 = mysqli_query($connect, $sql2);
    $sql3 = "SELECT id as idsubgrupo, nome as subgrupo FROM produtosgruposub";
    $resultado3 = mysqli_query($connect, $sql3);
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Produto</h3>
        <form action="../php_action/create.php" method="POST">
            <div class="input-field col s3">
                <input type="text" name="codigo" id="codigo">
                <label for="codigo">Código</label>
            </div>
            <div class="input-field col s9">                
                <input type="text" name="nome" id="nome">
                <label for="nome">Raiz do Nome</label>
            </div>
            <div class="input-field col s4">
                <select name="id" id="id">
                    <option>Selecione o Grupo</option>
                    <?php 
                    while($tipo = mysqli_fetch_array($resultado3)) { ?>
                        <option value="<?php echo($tipo['idtipo']); ?>"><?php echo($tipo['tipo']);?> </option>
                    <?php 
                    }
                    ?>
                </select> 
                <label>Selecione</label>
            </div>  
            <div class="input-field col s4">                
                <input type="text" name="apelido" id="apelido">
                <label for="sobrenome">Apelido</label>
            </div>    
            <div class="input-field col s8">
                <input type="text" name="email" id="email">
                <label for="email">E-mail</label>
            </div>    
            <div class="input-field col s4">
                <input type="text" name="whatsapp" id="whatsapp">
                <label for="whatsapp">WhatsApp</label>
            </div>  
            <div class="input-field col s4">
                <input type="text" name="instagram" id="instagram">
                <label for="instagram">Instagram</label>
            </div>  
            <div class="input-field col s3">
                <input type="text" name="cep" id="cep">
                <label for="cep">CEP</label>
            </div> 
            <div class="input-field col s9">
                <input type="text" name="logradouro" id="logradouro">
                <label for="logradouro">Logradouro</label>
            </div> 
            <div class="input-field col s2">
                <input type="text" name="numero" id="numero">
                <label for="numero">Numero</label>
            </div>  
            <div class="input-field col s5">
                <input type="text" name="complemento" id="complemento">
                <label for="complemento">Complemento</label>
            </div>  
            <div class="input-field col s5">
                <select name="idestado" id="idestado">
                    <option>Selecione</option>
                    <?php 
                    while($tipo2 = mysqli_fetch_array($resultado2)) { ?>
                        <option value="<?php echo($tipo2['codigo']); ?>"><?php echo($tipo2['nome']);?> </option>
                    <?php 
                    }
                    ?>
                </select> 
                <label>Selecione</label>
            </div>  
                         
            <button type="submit" name="btn-cadastrar-cliente" class="btn"> Cadastrar </button>
            <a href="entidades.php" type="submit" class="btn blue"> Lista de Entidades </a>
        </form>

    </div>
</div>

<?php    
    require_once '../includes/footer.php';
 ?>       

