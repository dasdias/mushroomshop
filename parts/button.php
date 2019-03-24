<form method="POST" action="actions/add.php">
    <input type="hidden" name="id" value="<?=$product['id']?>">
    <input onclick="clickBtn(this)" class="buttonclick" data-click="<?=$product['id']?>" type="submit" value="Добавить в корзину">
</form>
