<div id="main-container" class="container">
<!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Login</li>
    </ol>
<!-- Breadcrumb Ends -->
<!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        Login
    </h2>
<!-- Main Heading Ends -->
<!-- Login Form Section Starts -->
    <section class="login-area">
        <div class="row">
            <div class="col-sm-12">
            <!-- Login Panel Starts -->
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Please login using your existing account
                        </p>
                    <!-- Login Form Starts -->
                        <?php echo $this->Form->create('Login'); ?>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <?php echo $this->Form->input('username', array('label' => array(
                                                                                                'class' => 'sr-only',
                                                                                                'for' => 'exampleInputEmail2'
                                                                                                ),
                                                                                'class' => 'form-control',
                                                                                'id' => 'exampleInputEmail2',
                                                                                'placeholder' => 'Username'
                                                                                )); 
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('password', array('label' => array(
                                                                                                'class' => 'sr-only',
                                                                                                'for' => 'exampleInputPassword2'
                                                                                                ),
                                                                                'class' => 'form-control',
                                                                                'id' => 'exampleInputPassword2',
                                                                                'placeholder' => 'Password'
                                                                                )); 
                                ?>
                            </div>
                            <?php echo $this->Form->button('Login', array('class'=>'btn btn-brown'));  ?>
                        </form>
                    <!-- Login Form Ends -->
                    </div>
                </div>
            <!-- Login Panel Ends -->
            </div>
        </div>
    </section>
<!-- Login Form Section Ends -->
</div>