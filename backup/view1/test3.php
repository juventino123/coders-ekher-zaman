<html>
<head></head>
<body>
<div class="container">
  <input class="form-control" id="anythingSearch" type="text" placeholder="Type something to search list items">
  <div id="myDIV">
    <p>I am a paragraph.</p>
    <div>I am a div element inside div.</div>
    <button class="btn btn-default">I am a button</button>
    <button class="btn btn-info">Another button</button>
    <p>Another paragraph.</p>
  </div>
</div>
<script type="text/javascript">
// FIlter anything
$(document).ready(function () {
  $("#anythingSearch").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>