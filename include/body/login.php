<script src="include/assets/js/loginUSER.js"></script>
<div>
    <form method="POST" action="" id="loginFROM">
        <div class="row margin-top-50px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2"><button type="button" onclick="login()" class="btn btn-primary w100p">Login</button></div>
            <div class="col-md-5"></div>
        </div>
    </form>
</div>