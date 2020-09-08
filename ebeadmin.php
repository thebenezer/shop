<?php include"header.php";
//Use ini_get to get the value of
//the file_uploads directive
if(ini_get('file_uploads')){
    echo 'file_uploads is set to "1". File uploads are allowed.';
} else{
    echo 'Warning! file_uploads is set to "0". File uploads are NOT allowed.';
}
$tempFolder = ini_get('upload_tmp_dir');

echo 'Your upload_tmp_dir directive has been set to: "' . $tempFolder . '"<br>';

//Firstly, lets make sure that the upload_tmp_dir
//actually exists.
if(!is_dir($tempFolder)){
    throw new Exception($tempFolder . ' does not exist!');
} else{
    echo 'The directory "' . $tempFolder . '" does exist.<br>';
}

if(!is_writable($tempFolder)){
    throw new Exception($tempFolder . ' is not writable!');
} else{
    echo 'The directory "' . $tempFolder . '" is writable. All is good.<br>';
}
?>
<body>

      <div class="col-md-8 col-md-offset-2 text-center">
        <div class="display-t">
            <h1>Admin</h1>
        </div>
      </div>

<div id="fh5co-about">
  <div class="container">
    <form action="addprod.php" method="POST">
      <input type="text" name="pid" placeholder="pid"><br>
      <input type="text" name="name" placeholder="name"><br>
      <input type="number" name="quantity" placeholder="quantity"><br>
      <input type="number" min="0.01" step="0.01" name="price" placeholder="price"><br>
      <input type="textbox" name="description" placeholder="description"><br>
      <input type="text" name="pic" placeholder="pic"><br>
      <input type="text" name="subpic1" placeholder="subpic1"><br>
      <input type="text" name="subpic2" placeholder="subpic2"><br>

      <label for="dropdownlist">Category :</label>
        <select name="category" placeholder="Print">
          <option value="1">Print</option>
          <option value="2">Original</option>
          <option value="3">Tote</option>
        </select>
      <button type="submit" name="prod-button">Upload</button>
    </form>
  </div>
</div>

<?php include"footer.html" ?>



</body>
</html>
