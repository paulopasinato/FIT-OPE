<?php
	include "../../config.php";
	include "../../incs/cabecalho.php";
	include "../../incs/menu_superior.php";

	// echo "<pre>"; print_r($_SESSION); echo "</pre>";
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2>Finalizar Pedido de Orçamento</h2><hr/>
	</div>

	<?php include "../../incs/menu_lateral.php"; ?>
	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
		<?php if (
				(isset($_SESSION["nomeProduto"]) && !empty($_SESSION["nomeProduto"])) &&
				(isset($_SESSION["totalProduto"]) && !empty($_SESSION["totalProduto"]))
			): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_SESSION["carrinho"]) && !empty($_SESSION["carrinho"])): ?>
						<?php foreach ($_SESSION["carrinho"] as $key => $value): ?>
							<tr>
								<td><?=ucwords(strtolower($value["nome"]));?></td>
								<td>
									<?=str_pad($_SESSION["totalProduto"][$value["id_produto"]], 2, "0", STR_PAD_LEFT);?>
									<div class="pull-right">
										<a href="<?=BASE_URL;?>acoes/carrinho.php?acao=remover&id=<?=$value["id_produto"];?>" class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>
										</a>
										<a href="<?=BASE_URL;?>acoes/carrinho.php?acao=adicionar&id=<?=$value["id_produto"];?>" class="btn btn-success btn-xs">
											<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
										</a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php if (isset($_SESSION["auth"]) && $_SESSION["auth"]): ?>
						<form action="<?=BASE_URL;?>acoes/rota.php" method="POST">
							<input type="hidden" name="class" value="<?=base64_encode("Orcamento");?>">
							<input type="hidden" name="method" value="<?=base64_encode("salvar");?>">
							<input type="hidden" name="path" value="<?=base64_encode("admin/view/orcamentos/");?>">

							<input type="submit" value="Finalizar Orçamento" class="btn btn-primary btn-sm pull-right">
						</form>
					<?php else: ?>
						<a href="<?=BASE_URL;?>admin/view/index.php" class="btn btn-primary btn-sm pull-right">Finalizar Orçamento</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div> <!-- /.col-md-10 -->
</div> <!-- /.row -->

<?php include "../../incs/rodape.php"; ?>
