<?php
    require_once '../includes/header.php';
    require_once '../includes/mesagem.php';
    require_once '../php_action/db_connect.php';
?>
    
<div class="row">
<div class="col s12 m6 push-m3">
    <div class="col s4">
    <h3 class="light"> Produtos </h3>
    </div>

    <table class="stripe" >
        <thead>
            <tr>
                <th>Foto:</th>
                <th>Código:</th>
                <th>Nome:</th>
                <th>Variacão:</th>
                <th>Grupo:</th>
                <th>Sub grupo:</th>
                <th>Vl Custo:</th>
                <th>Vl Varejo:</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT 
                        a.id,
                        d.foto,
                        a.codigo,
                        a.nome,
                        d.nomevariacao,
                        b.nome as grupo,
                        c.nome as subgrupo,
                        e.customedio,
                        e.valorvarejo
                    from
                        produtos a
                    left join
                        produtosgrupo b on a.id = b.idproduto
                    left join
                        produtosgruposub c on b.id = c.idgrupo
                    left join
                        produtosvariacoes d on a.id = d.idproduto
                    left join
                        (SELECT distinct
                            idvariacoes,
                            valoratacado,
                            valorvarejo,
                            customedio
                        from
                            produtosestoque
                        )e on  d.id = e.idvariacoes";
                    
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0){

            while($dados = mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <td><?php echo $dados['foto']; ?></td>
                <td><?php echo $dados['codigo']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['nomevariacao']; ?></td>
                <td><?php echo $dados['grupo']; ?></td>
                <td><?php echo $dados['subgrupo']; ?></td>
                <td><?php echo $dados['customedio']; ?></td>
                <td><?php echo $dados['valorvarejo']; ?></td>

                <td><a href="editarProdutos.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">inativar</i></a></td>

                <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                        <h4>ALERTA!</h4>
                        <p>Você tem certeza que deseja inativar esse produto?</p>
                        </div>
                        <div class="modal-footer">

                        <form action="../php_action/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-inativar-produtos" class="btn red">Sim, quero inativar</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                        </div>
                    </div>

            </tr>
            <?php 
                }
            }else { ?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    <br>
    <a href="adicionarProdutos.php" class="btn">Adicionar Produtos</a>
</div>
</div>

<?php
    require_once '../includes/footer.php';
?>