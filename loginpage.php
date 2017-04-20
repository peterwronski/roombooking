

    <hr/>
    <div class="row">


        <div class="col-lg-6 col-lg-offset-3 loginform">
            <table class="logintable">
                <form action="login.php" method="POST">
                    <tr><td class="logintable"><label><b>Student ID</b></label></td>
                        <td class="logintable"><input type="text" name="studentid" placeholder="Student ID" id="studentid" required/></td>
                    </tr>
                    <tr><td class="logintable"><label><b>Password</b></label></td>
                        <td class="logintable"><input type="password" name="password" id="password" required/></td>
                    </tr>

                    <tr><td  class="logintable" colspan="2" align="center"><input type="submit" name="login-submit"/></td></tr>
                    <tr><td  class="logintable" colspan="2" align="center"><a href="#" id="registerbtn">Click here </a> to register</td></tr>
                </form>
            </table>
        </div>
    </div>

    <script>
    $(function(){
        $('a#registerbtn').on('click',function(){
            $('#register').show();
        });
    });
    </script>

    <div class="container" id="register" style="display:none;">

        <hr/>
        <div class="row">

            <h1>Create an account</h1>
            <div class="col-lg-4 col-lg-offset-4 loginform">
                <table class="logintable">
                    <form action="registerscr.php" method="POST">
                        <tr><td class="logintable"><label><b>Student ID</b></label></td>
                            <td class="logintable"><input type="text" name="studentid" placeholder="Student ID" id="studentid" required/></td>
                        </tr>

                        <tr><td class="logintable"><label><b>Name</b></label></td>
                            <td class="logintable"><input type="text" name="name" placeholder="Your name" id="name" required/></td>
                        </tr>

                        <tr><td class="logintable"><label><b>Password</b></label></td>
                            <td class="logintable"><input type="password" name="password" id="password" required/></td>
                        </tr>

                        <tr><td class="logintable"><label><b>Confirm your password</b></label></td>
                            <td class="logintable"><input type="password" name="password2" id="password2" required/></td>
                        </tr>

                        <tr><td  class="logintable" colspan="2" align="center"><input type="submit" name="login-submit"/></td></tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
