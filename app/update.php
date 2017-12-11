<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Manage | Update</title>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Update Information</h1>
          </div>
        </div>
      </div>
    </header>
   <!-- insert section -->
   <section class="insert">
    <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <!-- html sample form -->
                <form action="" method="">
                  <!-- text -->
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="Name"  placeholder="Name">
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="email@domain.tld" placeholder="Email">
                  </div>
                  <!-- password -->
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="password" placeholder="Password">
                  </div>
                  <!-- Block multiple checkbox -->
                  <h4>Block Checkbox</h4> <!-- remove this  -->
                  <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Option 1</label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="">Option 2</label>
                  </div>
                  <div class="checkbox disabled">
                    <label><input type="checkbox" value="" disabled>Option 3</label>
                  </div>
                 <!--inline checkbox -->
                 <h4>Inline Checkbox</h4>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1" checked> 1
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="option3" disabled> 3
                  </label>
                  <!-- radio -->
                  <h4>Block Radio</h4>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" checked value="Male">
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="Male">
                      Female
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="Male">
                      Others
                    </label>
                  </div>
                  <h4>Inline Radio</h4>
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="gender" checked value="option1"> Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="gender" value="option2"> Female
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="gender" value="option3"> Others
                  </label>
                  <!-- select -->
                  <h4>Single Selected Field</h4>
                  <select class="form-control">
                    <option selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <h4>Multiple Selected Field</h4>
                  <select multiple class="form-control">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <!-- static control from -->
                  <h4>Static Control Form</h4>
                  <div class="form-group">
                    <label class="col-sm-6 control-label">Static Email Field</label>
                    <div class="col-sm-6">
                      <p class="form-control-static">email@example.com</p>
                    </div>
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label for="message">Message</label>
                     <textarea class="form-control" name="message" id="message" rows="5" placeholder="Type your message here...">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum cupiditate, dignissimos quo. Dolore, omnis, totam....</textarea>
                  </div>
                  <!-- file -->
                  <div class="form-group">
                    <label for="file">Single File input</label>
                    <input type="file" id="file">
                  </div>
                  <!-- multiple files -->
                   <div class="form-group">
                    <label for="file">Multiple File input</label>
                    <input type="file" id="file" multiple />
                  </div>
                  
                  <!-- With optional icons verticle -->
                  <div class="form-group has-success has-feedback">
                    <label class="control-label" for="inputSuccess2">Input with success</label>
                    <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                  </div>
                  <div class="form-group has-warning has-feedback">
                    <label class="control-label" for="inputWarning2">Input with warning</label>
                    <input type="text" class="form-control" id="inputWarning2" aria-describedby="inputWarning2Status">
                    <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                    <span id="inputWarning2Status" class="sr-only">(warning)</span>
                  </div>
                  <div class="form-group has-error has-feedback">
                    <label class="control-label" for="inputError2">Input with error</label>
                    <input type="text" class="form-control" id="inputError2" aria-describedby="inputError2Status">
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="inputError2Status" class="sr-only">(error)</span>
                  </div>
                  <div class="form-group has-success has-feedback">
                    <label class="control-label" for="inputGroupSuccess1">Input group with success</label>
                    <div class="input-group">
                      <span class="input-group-addon">@</span>
                      <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
                    </div>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
                  </div>
                  <!-- colum size -->
                  <div class="row">
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" placeholder=".col-xs-4">
                    </div>
                  </div>
                  <!-- form with badge -->
                  <br>
                  <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                        <div class="input-group-addon">.00</div>
                      </div>
                  </div>
                  <!-- submit button -->
                  <br>
                  <div class="center-block">
                  <!-- left button -->
                 <!-- <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>-->
                  <!-- center button -->
                  <button type="submit" name="submit" class="btn btn-success center-block">Submit</button>
                  <!-- right button -->
                 <!-- <button type="submit" name="submit" class="btn btn-success btn-lg pull-right">Submit</button>
                  </div>-->
                </form>
              <!-- /html sample form -->
            </div>
          </div>
    </div>
   </section>
   <br>
   <!-- /insert section -->
  <!-- all scripts -->  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>
