<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test College TC Doc</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
        	.tabContent {
						  padding:20px;
						}
        </style>
  </head>

<body>
<!-- Tabs -->
<ul class="nav nav-tabs">
  <li class="active">
    <a id="1" href="#">Tab 1</a>
  </li>
  <li><a id="2" href="#">Tab 2</a></li>
  <li><a id="3" href="#">Tab 3</a></li>
</ul>

<!-- Accordions -->
<div class="tabContent" id="tabContent1">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">First </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>First Section</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Second</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Second Section</a></p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Third</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Third Section</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tabContent" id="tabContent2">
  Tab Content 2
</div>  
<div class="tabContent" id="tabContent3">
  Tab Content 3
</div>  

<script type="text/javascript">
  $('.nav a').click(function (e) {
    $(this).tab('show');
  
  var tabContent = '#tabContent' + this.id; 
  
  $('#tabContent1').hide();
  $('#tabContent2').hide();
  $('#tabContent3').hide();
  $(tabContent).show();
})

</script>
</body>
</html>