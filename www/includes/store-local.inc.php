<script>
    const cart = <?php echo json_encode($_SESSION['cart']) ?>;
    const id = <?php echo json_encode($_SESSION['ID']); ?>;

    localStorage.setItem(id, JSON.stringify(cart));
</script>