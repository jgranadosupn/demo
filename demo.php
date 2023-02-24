<div class="row">
    <div class="col">

        <div class="h-100">


            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Trámites Aceptados</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> 
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $graficastatusaceptados?>"><?= $graficastatusaceptados?></span> </h4>
                                    <a href="" class="text-decoration-underline"></a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Trámites en Espera</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $graficastatusespera ?>"><?= $graficastatusespera ?></span></h4>
                                    <a href="" class="text-decoration-underline"></a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-shopping-bag text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Trámites En Proceso</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> 
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $graficastatusproceso ?>"><?= $graficastatusproceso ?></span> </h4>
                                    <a href="" class="text-decoration-underline"></a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-warning rounded fs-3">
                                        <i class="bx bx-user-circle text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Trámites Rechazados</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-muted fs-14 mb-0">
                                   
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $graficastatusrechazados ?>"><?= $graficastatusrechazados ?></span></h4>
                                    <a href="" class="text-decoration-underline"></a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class="bx bx-wallet text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->


            <div class="row">


                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Últimas Solicitudes</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Trámite / Servicio</th>
                                            <th scope="col">Solicito</th>
                                            <th scope="col">Asignado</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tramites as $key => $tramite) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" class="fw-medium link-primary"><?= $tramite->folio_tramite ?></a>
                                                </td>

                                                <td><?= $tramite->catTramites->nombre_tramite ?></td>
                                                <td>
                                                    <span class="text-success"><?= $tramite->usuarioSolicita->nombre_completo ?></span>
                                                </td>
                                                <td>
                                                    <div class="avatar-group flex-nowrap">
                                                        <div class="avatar-group-item">
                                                            <a href="javascript: void(0);" class="d-inline-block">
                                                                <img src="/thema/ciudadanos/assets/images/users/avatar-1.jpg" alt="pedro" class="rounded-circle avatar-xxs">
                                                            </a>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <a href="javascript: void(0);" class="d-inline-block">
                                                                <img src="/thema/ciudadanos/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                            </a>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <a href="javascript: void(0);" class="d-inline-block">
                                                                <img src="/thema/ciudadanos/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($tramite->status == 'espera') {
                                                        echo '<span class="badge badge-soft-warning">En Espera</span>';
                                                    } elseif ($tramite->status == 'proceso') {
                                                        echo '<span class="badge badge-soft-info">En Proceso</span>';
                                                    } elseif ($tramite->status == 'aceptado') {
                                                        echo '<span class="badge badge-soft-success">Aceptado</span>';
                                                    } elseif ($tramite->status == 'rechazado') {
                                                        echo '<span class="badge badge-soft-danger">Rechazado</span>';
                                                    }elseif ($tramite->status == 'cancelado') {
                                                        echo '<span class="badge badge-soft-danger">Cancelado</span>';
                                                    }
                                                    
                                                    ?>

                                                </td>
                                                <td><?= $tramite->fecha_captura ?></td>
                                                <td><button onclick="location.href='/ciudadanos/solicitudes/detalles?id=<?= $tramite->id ?>'"  type="button" class="btn btn-outline-info waves-effect waves-light">Detalles</button></td>
                                            </tr><!-- end tr -->
                                        <?php } ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
                <div class="col-xl-3">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Status Solicitudes</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Download Report</a>
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="store-visits-source" data-colors='["--vz-success", "--vz-warning", "--vz-info", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

            
   <div class="row">


                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Citas</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Solicito</th>
                                            <th scope="col">Trámite / Servicio</th>
                                            <th scope="col">Secretaría</th>
                                            <th scope="col">Status</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($citas as $key => $cita) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" class="fw-medium link-primary"><?= $cita->folio ?></a>
                                                </td>

                                                <td><?= $cita->cita_fecha. ' '.$cita->cita_horario ?></td>
                                                <td>
                                                    <span class="text-success"><?= $cita->solicita0->nombre_completo ?></span>
                                                </td>
                                               <td><?= $cita->servicio->nombre ?></td>
                                                
                                                <td><?= $cita->servicio->secretarias->nombre ?></td>
                                                <td>
                                                    <?php
                                                    if ($cita->status == 'espera') {
                                                        echo '<span class="badge badge-soft-warning">En Espera</span>';
                                                    } elseif ($cita->status == 'pendiente') {
                                                        echo '<span class="badge badge-soft-info">Pendiente</span>';
                                                    } elseif ($cita->status == 'atendido') {
                                                        echo '<span class="badge badge-soft-success">Atendido</span>';
                                                    } elseif ($cita->status == 'no_atendido') {
                                                        echo '<span class="badge badge-soft-danger">Rechazado</span>';
                                                    }elseif ($cita->status == 'cancelado') {
                                                        echo '<span class="badge badge-soft-danger">Cancelado</span>';
                                                    }
                                                    
                                                    ?>

                                                </td>
                                            </tr><!-- end tr -->
                                        <?php } ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
                <div class="col-xl-3">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Status Citas</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Download Report</a>
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="status-citas" data-colors='["--vz-warning", "--vz-info", "--vz-success", "--vz-danger", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

               <div class="row">


                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Reportes</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Solicito</th>
                                            <th scope="col">Trámite / Servicio</th>
                                            <th scope="col">Secretaría</th>
                                            <th scope="col">Status</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($citas as $key => $cita) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" class="fw-medium link-primary"><?= $cita->folio ?></a>
                                                </td>

                                                <td><?= $cita->cita_fecha. ' '.$cita->cita_horario ?></td>
                                                <td>
                                                    <span class="text-success"><?= $cita->solicita0->nombre_completo ?></span>
                                                </td>
                                               <td><?= $cita->servicio->nombre ?></td>
                                                
                                                <td><?= $cita->servicio->secretarias->nombre ?></td>
                                                <td>
                                                    <?php
                                                    if ($cita->status == 'espera') {
                                                        echo '<span class="badge badge-soft-warning">En Espera</span>';
                                                    } elseif ($cita->status == 'pendiente') {
                                                        echo '<span class="badge badge-soft-info">Pendiente</span>';
                                                    } elseif ($cita->status == 'atendido') {
                                                        echo '<span class="badge badge-soft-success">Atendido</span>';
                                                    } elseif ($cita->status == 'no_atendido') {
                                                        echo '<span class="badge badge-soft-danger">Rechazado</span>';
                                                    }elseif ($cita->status == 'cancelado') {
                                                        echo '<span class="badge badge-soft-danger">Cancelado</span>';
                                                    }
                                                    
                                                    ?>

                                                </td>
                                            </tr><!-- end tr -->
                                        <?php } ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
                <div class="col-xl-3">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Status Reportes</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Download Report</a>
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="status-citas" data-colors='["--vz-warning", "--vz-info", "--vz-success", "--vz-danger", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->


        </div> <!-- end .h-100-->

    </div> <!-- end col -->


</div>
