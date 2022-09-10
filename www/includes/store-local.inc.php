<script>
    const id = <?php echo json_encode($_SESSION['ID']); ?>;
    localStorage.setItem('id', id);
</script>