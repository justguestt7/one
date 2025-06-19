<!-- footer -->
  <script src="<?=$url?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?=$url?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=$url?>assets/js/sidebarmenu.js"></script>
  <script src="<?=$url?>assets/js/app.min.js"></script>
  <script src="<?=$url?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?=$url?>assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?=$url?>assets/js/dashboard.js"></script>
  <script src="<?=$url?>assets/js/modal.js"></script>
</body>

</html>
<script>
  document.addEventListener('DOMContentLoaded',() => {
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal',function(event){
      const button = event.relatedTarget;
      const id = button.getAttribute('data-id');
      const idInput = editModal.querySelector('#edit-id');
      idInput.value = id;
    })
  })
</script>