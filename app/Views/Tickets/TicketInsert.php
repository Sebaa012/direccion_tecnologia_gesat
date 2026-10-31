<?php echo $this->extend('Layout/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="py-5">
    <h1 class="text-center fw-bold">Ingresar Ticket</h1>
    <h2 class="text-center text-secondary">Por favor, complete el formulario a continuación</h2>
    <hr>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <?php echo form_open('tickets/saveTicket'); ?>

                    <div class="mb-3">
                        <?php echo form_label('Solicitante', 'solicitante'); ?>
                        <?php echo form_input('solicitante', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Departamento', 'departamento'); ?>
                        <?php echo form_input('departamento', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Oficina', 'oficina'); ?>
                        <?php echo form_input('oficina', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Piso', 'piso'); ?>
                        <?php echo form_input('piso', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Requerimiento', 'requerimiento'); ?>
                        <?php echo form_input('requerimiento', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Detalle', 'detalle'); ?>
                        <?php echo form_textarea('detalle', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Fecha', 'fecha'); ?>
                        <?php echo form_input('fecha', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Estado', 'estado'); ?>
                        <?php echo form_input('estado', '', ['class' => 'form-control']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_submit('submit', 'Guardar Ticket', ['class' => 'btn btn-primary']); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>