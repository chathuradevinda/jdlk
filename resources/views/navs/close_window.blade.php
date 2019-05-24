<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
            <div class="alert alert-success" style="text-align: center">
                    <strong>Job Details Updated!</strong> You can view details in assigned section.
                  </div>
                  <br><br><br> <br><br><br> <br>
    <div class="container" style="display: flex; justify-content: center;">
        
                  
        <button type="button"  onclick="closeWin()" class="btn btn-outline-dark">Close Window</button>
    </div>
</body>
</html>
<script>
    var myWindow;
    
    function openWin() {
        myWindow = window.open("", "myWindow", "width=200,height=100");
        myWindow.document.write("<p>This is 'myWindow'</p>");
    }
    
    function closeWin() {
        this.close();
    }
</script>