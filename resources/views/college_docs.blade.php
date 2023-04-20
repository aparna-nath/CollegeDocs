<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>College TC Doc</title>
        <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

<body>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Transfer Certificate Configuration</a></li>
      <li><a href="#profile" data-toggle="tab">Conduct Certificate Configuration</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">

      <div class="tab-pane active in" id="home">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">TC Configuration</a>
                </h4>
            </div>
           <p style="color:red">* Mandatory Fields</p>
           @csrf
        <form id="tab" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
             <label class="control-label col-sm-2">Intro Text*</label>
              <div class="col-sm-10">
              <textarea class="input-xlarge" required></textarea>
              </div>
            </div>
            <div class="form-group">
             <label class="control-label col-sm-2" >Instructions after applying *</label>
              <div class="col-sm-10">
              <textarea class="input-xlarge" required></textarea>
              </div>
            </div>
            <div class="form-group">
             <label class="control-label col-sm-2" >Upload no due form *</label>
              <div class="col-sm-10">
              <input type="file" class="input-xlarge" required>
              </div>
            </div>
          	<div>
        	    <button class="btn btn-primary">Update</button>
              <button class="btn btn-primary">Cancel</button>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" >Notification Options</label>
                 <div class="checkbox">
                  <span class="choice-details">
                   <label class="checkbox-inline">
                     <input type="checkbox" value="" checked>Email
                   </label>
                   <label class="checkbox-inline">
                     <input type="checkbox" value="">Phone
                   </label>
                   <label class="checkbox-inline">
                     <input type="checkbox" value="">Destop
                   </label>
                 </span>
                 </div>
            </div>
            <p><b>TC Number Format</b></p>
            <div>
              <input type="radio" id="tcformat1" name="tcformat" value="single" checked="checked"/>
              <label for="tcformat1">Single Series</label>
              <input type="radio" id="tcformat2" name="tcformat" value="multi" />
              <label for="tcformat2">Multiple Series</label>
                <div class="form-group">
                <div id="series_single" class="form_series">
                    <label class="control-label col-sm-2">Starts from *</label>
                    <div class="col-sm-10">
                    <input type="text" class="input-xlarge" required>
                    </div>
                    <div class="col-sm-10">
                        <label class="control-label col-sm-2">Academic Year </label>
                        <select name="year" class="input-xlarge" id="year" >
                          <option value="">--None</option>
                          <option>2022-2023</option>
                          <option>2021-2022</option>
                          <option>2020-2021</option>
                          <option>2019-2020</option>
                          <option>2018-2019</option>
                       </select>
                      </div>
                </div>
                <div id="series_multi" class="form_series" hidden="true">
                    <label class="control-label col-sm-2">TC No: </label>
                    <div class="col-sm-10">
                    <input type="text" class="input-xlarge" required>
                    </div>
                    <div class="col-sm-10">
                        <label class="control-label col-sm-2">Academic Year </label>
                        <select name="year" class="input-xlarge" id="year" >
                          <option value="">--None</option>
                          <option>2022-2023</option>
                          <option>2021-2022</option>
                          <option>2020-2021</option>
                          <option>2019-2020</option>
                          <option>2018-2019</option>
                       </select>
                    </div>
                    <div class="col-sm-10">
                        <label class="control-label col-sm-2">Application </label>
                        <select name="application" class="input-xlarge" id="apply" >
                          <option value="">--None</option>
                          <option>Self-Finance</option>
                          <option>Aided</option>
                       </select>
                    </div>
                </div>
            </div>
            
              <div>
              <button class="btn btn-primary">Restart TC Number</button>
              <button class="btn btn-primary">Cancel</button>
            </div>

        </form>
      </div>

      <div class="tab-pane fade" id="profile">
      <form id="tab2">
          
      </form>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("input[name$='tcformat']").click(function() {
        var selected = $(this).val();

        $("div.form_series").hide();
        $("#series_" + selected).show();
    });
});
</script>
  </body>
  </html>