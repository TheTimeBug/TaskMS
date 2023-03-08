<script src="include/assets/js/signupUSER.js"></script>
<div>
    <form method="POST" action="" id="signupFRORM">
        <div class="row margin-top-50px">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="exampleInput" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
              
            </div>
            <div class="col-md-3">
                <label for="exampleInput" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp">
              
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Phone No</label>
                <input type="phone" class="form-control" id="phone" name="phone" >
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" >
            </div>
            <div class="col-md-3">
                <label for="exampleInputPassword1" class="form-label">Conform Password</label>
                <input type="password" id="password2" name="password2" class="form-control" >
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row margin-top-10px">
            <div class="col-md-5"></div>
            <div class="col-md-2"><button type="button" onclick="storeUSERdata()" class="btn btn-primary w100p">Sign Up</button></div>
            <div class="col-md-5"></div>
        </div>
    </form>
</div>