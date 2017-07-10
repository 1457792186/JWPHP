<?php $this->render("header", $data["header"]); ?>

<?php if (!empty($data["books"])) { ?>
<?php } elseif (!empty($data["books"])) { ?>
<?php } else { ?>
<?php } ?>

<?php if (count($data["books"]) > 0) { ?>
<?php } elseif (count($data["books"]) > 1) { ?>
<?php } else { ?>
<?php } ?>

<?php /* 商品数量 */ ?>
<div>book count: <?php echo htmlspecialchars(count($data["books"])); ?></div>

<?php /* 商品列表 */ ?>
<div>
	<table>
<?php foreach ($data["books"] as $i => $data) { ?>
		<tr>
			<td><?php echo htmlspecialchars($data["id"]); ?></td>
			<td><?php echo htmlspecialchars($data["name"]); ?></td>
			<td><?php echo htmlspecialchars($data["price"]); ?></td>
			<td><?php echo htmlspecialchars($data["cover"]); ?></td>
		</tr>
<?php $data = $_data; } ?>
	</table>
</div>

<?php /* 商品列表 */ ?>
<div>
	<table>
<?php foreach ($data["books"] as $i => $row) { ?>
<?php $data = $row; ?>
		<tr>
			<td><?php echo htmlspecialchars($data["id"]); ?></td>
			<td><?php echo htmlspecialchars($data["name"]); ?></td>
			<td><?php echo htmlspecialchars($data["price"]); ?></td>
			<td><?php echo htmlspecialchars($data["cover"]); ?></td>
		</tr>
<?php $data = $_data; } ?>
	</table>
</div>

<?php $this->render("footer", $data["footer"]); ?>