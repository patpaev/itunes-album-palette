<style>
.colored-box {
  border: 1px lightgrey solid; 
  height: 192px;
  width: 192px;
  display: inline-block;
}
.colored-box h2 {
  padding-top: 52px; 
  text-align: center; 
  color: <?php echo $_POST['textcolor']?>;
}
#colour1 { background-color: <?php echo $_POST['colour1']?> }
#colour2 { background-color: <?php echo $_POST['colour2']?> }
#colour3 { background-color: <?php echo $_POST['colour3']?> }
</style>

<div class="row text-center">  
  <div class="col-xs-12 col-sm-4">     
    <h3>Lighter</h3> 
    <div class="img-circle colored-box" id="colour1">
      <h2>Lorem ipsum</h2>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <h3>Primary</h3>
    <div class="img-circle colored-box" id="colour2">
      <h2>Lorem ipsum</h2>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <h3>Darker</h3>
    <div class="img-circle colored-box" id="colour3">
      <h2>Lorem ipsum</h2>
    </div>
  </div>
</div>