<!-- Footer -->
<footer class="bg-black py-4 mt-auto">


      <p class="text-gray-400 text-center">© <?= date('Y') ?> Powered by <b>Andres Silva ♥️</b></p>
</footer>

<script>
  function toggleFullscreen() {
    const iframe = document.getElementById('drivePlayer');
    if (iframe.requestFullscreen) {
      iframe.requestFullscreen();
    } else if (iframe.webkitRequestFullscreen) {
      iframe.webkitRequestFullscreen();
    } else if (iframe.msRequestFullscreen) {
      iframe.msRequestFullscreen();
    }
  }
</script>
</body>
</html>
