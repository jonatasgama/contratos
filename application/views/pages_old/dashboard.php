
<h1>Dashboard</h1>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contratos em Andamento</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?=base_url("financeiro/listaContratosEmAndamento");?>"><?=$contratosAndamento['0']->andamento;?></a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Contratos Pagos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?=base_url("financeiro/listaContratosPagos");?>"><?=$contratosPagos['0']->pagos;?></a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-check-o fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Contratos Finalizados(IPNF)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="<?=base_url("financeiro/listaContratosFinalizados");?>"><?=$contratosFinalizados['0']->finalizados;?></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-check-o fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
		  
		  <div class="row">
			<canvas id="vendasMes"></canvas>
		  </div>	  