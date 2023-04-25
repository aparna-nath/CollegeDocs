<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test College TC Doc</title>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <style type="text/css">
body 
{
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
}
.tabs {
  max-width: 1040px;
  margin: 0 auto;
  padding: 0 20px;
}
#tab-button {
  display: table;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}
#tab-button li {
  display: table-cell;
  width: 20%;
}
#tab-button li a {
  display: block;
  padding: .5em;
  background: #eee;
  border: 1px solid #ddd;
  text-align: center;
  color: #000;
  text-decoration: none;
}
#tab-button li:not(:first-child) a {
  border-left: none;
}
#tab-button li a:hover,
#tab-button .is-active a {
  border-bottom-color: transparent;
  background: #89cff0;
}
.tab-contents {
  padding: .5em 2em 1em;
  border: 1px solid #ddd;
}



.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 50px;
}
@media screen and (min-width: 768px) {
  .tab-button-outer {
    position: relative;
    z-index: 2;
    display: block;
  }
  .tab-select-outer {
    display: none;
  }
  .tab-contents {
    position: relative;
    top: -1px;
    margin-top: 0;
  }
}
        </style>
  </head>

<body>
    <br/><br/>
<div class="tabs">

    <div class="tab-button-outer">
        <ul id="tab-button">
          <li><a href="#tab01">Transfer Certificate Configuration</a></li>
          <li><a href="#tab02">Conduct Certificate Configuration</a></li>
        </ul>
    </div>

    <div id="tab01" class="tab-contents">
       @if (\Session::has('Msg'))
            <div class="alert alert-success">
              <p>{{ \Session::get('Msg') }}</p>
            </div><br/>
            @endif
        <h4>TC Configuration</h4>
        <p style="color:red">* Mandatory Fields</p>
        
        <form id="tab" class="form-horizontal" action="/TcCcGenerate" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Intro Text*</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="tc_intro_text" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Instructions after applying *</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="tc_instruction" required ></textarea>
                </div>
            </div>
            <div class="row mb-3">
               <label class="control-label col-sm-2" >Upload no due form *</label>
               <div class="col-sm-10">
                <input type="file"  name="tc_file" class="form-control" required>
              </div>
            </div>
            <div>
             <input type="submit" value="Update" class="btn btn-primary">
             <input type="reset" value="Reset "class="btn btn-primary">
            </div>
        </br>
            <div class="row mb-3">
                <label class="control-label col-sm-2" >Notification Options</label>
                <div class="col-sm-10">
                    <span class="choice-details">
                    <label class="checkbox-inline">
                    <input type="checkbox" name="tc_notification[]" value="Email" checked>Email
                    <input type="checkbox" name="tc_notification[]" value="Phone">SMS
                    <input type="checkbox" name="tc_notification[]" value="Text">Desktop
                    </label>
                    </span>
                </div>
            </div>
            <h5>TC Number Format</h5>
            <div class="row mb-3">
                <input type="radio" id="tcformat1" name="tcformat" value="single" checked="true"/>
                <label for="tcformat1">Single Series</label>
                <input type="radio" id="tcformat2" name="tcformat" value="multi" />
                <label for="tcformat2">Multiple Series</label>
            </div>
            <div class="row mb-3">
                <div id="series_single" class="form_series">
                  <div class="form-group form-inline">
                  <label class="control-label col-sm-2" >Starts from *</label>
                    <div class="col-sm-10">
                      <input type="text" name="tc_start_num" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group form-inline">
                    <label class="control-label col-sm-2">Academic Year </label>
                    <div class="col-sm-10">
                    <select name="academic_year_tc" class="form-control" id="year" >  
                      <option value="">--None</option>
                       @foreach($academicyears as $year)
                        <option value="{{$year->id}}">{{$year->name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  </br>
                  <button class="btn btn-primary">Restart TC Number</button>
                  <button class="btn btn-primary">Cancel</button>
                </div>

                <div id="series_multi" class="form_series">
                  <div class="form-group form-inline">
                    <label class="control-label col-sm-2">TC No: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control">
                    </div>

                    <label class="control-label col-sm-2">Academic Year </label>
                    <div class="col-sm-10">
                      <select name="year" class="form-control" id="year" >
                        <option value="">--None</option>
                         @foreach($academicyears as $year)
                          <option value="{{$year->id}}">{{$year->name}}</option>
                          @endforeach
                      </select>
                    </div>

                    <label class="control-label col-sm-2">Application </label>
                    <div class="col-sm-10">
                      <select name="application" class="form-control" id="apply" >
                        <option value="">--None</option>
                        <option>Self-Finance</option>
                        <option>Aided</option>
                      </select>
                    </div>

                  </div>
                  </br>
                  <div>
                    <button class="btn btn-primary">Restart TC Number</button>
                    <button class="btn btn-primary">Cancel</button>
                    <button class="btn btn-primary">+Add</button>
                  </div>
                </div>
            </div>
        </form>
    </div>
    <div id="tab02" class="tab-contents">
        <h2>Tab 2</h2>
        <p>Tab 2 inputs </p>
    </div>
      
</div>

<script type="text/javascript">
    $(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();
  $("#series_multi").hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("input[name$='tcformat']").click(function() {
      var selected = $(this).val();

      $("div.form_series").hide();
      $("#series_" + selected).show();
      // alert("#series_" + selected)
    });
  });
</script>

</body>
</html>