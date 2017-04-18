<?php

include 'header.php';
?>


<div class="container" id="content1">
    <div class="row"><h1>What is Lorem Ipsum?</h1>
        <div class="col-lg-8 contentbox"><br/>

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><br/>

        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
            Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
            Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.
            Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.
            Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.
            Donec non enim in turpis pulvinar facilisis. Ut felis.
            Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.
            Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
            Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.
            Donec non enim in turpis pulvinar facilisis. Utt felis. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

    </div>

        <div class="col-lg-4 contentbox"><img src="img/building.jpg" class="img-responsive" /></div>

        <div class="col-lg-4 contentbox"><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                It has survived not only five centuries, but also the leap</p> </div>
</div>

</div>

<div class="container" id="loginpage">

    <hr/>
    <div class="row">

        <div class=" col-lg-6 col-lg-offset-3 loginform">
            <ul class="nav nav-tabs">
                <li class="active col-lg-3"><a href="#login" data-toggle="pill">Login</a></li>
                <li class=" col-lg-3"><a href="#signup"  data-toggle="pill" >Sign up</a></li>
            </ul>
            <div class="tab-content">
                <div id="login" class="tab-pane fade in active">
                    <form id="login" action ="login.php" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Student ID">
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <button type="submit" name="login-btn" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div id="signup" class="tab-pane fade">
                    <form id="register" action ="register.php" method="post">
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Student ID">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                        </div>

                        <button type="submit" name ="signup-btn" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('rooms.php'); ?>

<?php include('booking.php'); ?>




</body>

</html>
