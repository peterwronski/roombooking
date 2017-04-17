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
            Donec non enim in turpis pulvinar facilisis. Ut felis. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

    </div>

        <div class="col-lg-4 contentbox"><img src="img/building.jpg" class="img-responsive"/></div>

        <div class="col-lg-4 contentbox"><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                It has survived not only five centuries, but also the leap</p> </div>
</div>

</div>

<div class="container" id="loginpage">

<hr/>



       <div class="row">

           <h1>Check your booking</h1>
           <div class="col-lg-4 col-lg-offset-4 loginform">
               <table class="logintable">
                   <form action="login.php" method="POST">
                        <tr><td class="logintable"><label><b>Student ID</b></label></td>
                            <td class="logintable"><input type="text" name="studentid" placeholder="Student ID" id="studentid" required/></td>
                        </tr>
                       <tr><td class="logintable"><label><b>Password</b></label></td>
                           <td class="logintable"><input type="password" name="password" id="password" required/></td>
                       </tr>

                       <tr><td  class="logintable" colspan="2" align="center"><input type="submit" name="login-submit"/></td></tr>
               </form>
               </table>
           </div>
       </div>
</div>



<?php include('rooms.php'); ?>





</body>

</html>
