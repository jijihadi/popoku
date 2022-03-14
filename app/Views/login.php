<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Popoku | <?=$title?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="<?=site_url()?>/assets/admin/main.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/admin/scripts/main.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"
        crossorigin="anonymous" />
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow closed-sidebar-mobile closed-sidebar">
        <div class="app-container closed-sidebar-mobile closed-sidebar">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="col-12" style="color:white;">
                            <center>
                                <h3>POPOKU</h3>
                            </center>
                        </div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account.</span>
                                        </h4>
                                    </div>
                                    <?php if (session()->getFlashdata('msg')): ?>
                                    <?=session()->getFlashdata('msg')?>
                                    <?php endif;?>
                                    <form action="<?=base_url()?>/login/auth" method="post">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" id="exampleEmail" placeholder="Email here..."
                                                        type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword"
                                                        placeholder="Password here..." type="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <h6 class="mb-0">No account? <a href="<?=base_url('Register')?>"
                                                class="text-primary">Sign
                                                up now</a></h6>
                                </div>
                                <div class="modal-footer clearfix">
                                    <!-- <div class="float-left">
                                        <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                    </div> -->
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg" type="submit">Login to Dashboard</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.d810cf0ae7f39f28f336.js"></script>

    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

</html>