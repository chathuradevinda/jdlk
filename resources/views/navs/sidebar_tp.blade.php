<style>
       
        h1,h2,h3,h4,h5,h6{
            color: #110077;
            font-weight: 500;
        }
body{
    background-color: lightgray;
    font-family: Arial, Helvetica, sans-serif;
}
.sidenav {
  height: 600px;
  width: 160px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #323232;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: lightgrey;
  display: block;
}

.sidenav a:hover {
  color: white;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div class="sidenav" style="font-size: small">
        <a href="#">My Jobs</a>
        <a href="/jobdone/public/pendingjobs/index_assigned">Assigned Jobs</a>
        <a href="/jobdone/public/pendingjobs/index_accepted">Accepted Jobs</a>
        <a href="/jobdone/public/pendingjobs/index_completed">Completed Jobs</a>
        <a href="/jobdone/public/pendingjobs/index_rejected">Rejected Jobs</a>
      </div>

<div class="container" style="height: 100%">
    
</div>