
<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg,#4099ff,#73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg,#2ed8b6,#59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg,#FFB64D,#ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg,#FF5370,#ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Home</h4>
                <p class="category">Selamat Datang, <?php $role == "Admin" ?  print($nama_admin) : print($nama); ?></p>
            </div>
            <div class="card-content">
                <?php if($role == "Admin"){?>
                    <div class="col-md-4 col-sm-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Pendaftar <span class="f-right">351</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <div class="card bg-c-green  order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Konfirmasi Pendaftar<span class="f-right">351</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Lulus Seleksi<span class="f-right">351</span></h6>
                            </div>
                        </div>
                    </div>
                <?php }else{?>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
