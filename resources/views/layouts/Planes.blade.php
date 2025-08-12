@extends('layouts.app')

@section('titulo', 'Planes | FitZone')

@section('contenido')
<div class="container mt-5 text-center">
    <h2>Nuestros Planes</h2>
    <div class="row mt-4">
        
        <!-- Plan Básico -->
        <div class="col-md-4 mb-3">
            <div class="card border-primary">
                <div class="card-body text-center">
                    <h5>Plan Básico</h5>
                    <p>L 300 / mes</p>
                    <p>Acceso al gimnasio</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">
                        Elegir Plan
                    </button>
                </div>
            </div>
        </div>

        <!-- Plan Plus -->
        <div class="col-md-4 mb-3">
            <div class="card border-success">
                <div class="card-body">
                    <h5>Plan Plus</h5>
                    <p>L 500 / mes</p>
                    <p>Incluye clases + entrenador</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistroPLUS">Elegir Plan</button>
                </div>
            </div>
        </div>

        <!-- Plan Premium -->
        <div class="col-md-4 mb-3">
            <div class="card border-warning">
                <div class="card-body">
                    <h5>Plan Premium</h5>
                    <p>L 800 / mes</p>
                    <p>Todo incluido + nutrición</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistroPremium">Elegir Plan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para formulario personalizado -->
    <div class="mt-4">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalRegistroPersonalizado">
            Plan Personalizado
        </button>
    </div>

    <!-- Modal Plan Personalizado -->
    <div class="modal fade" id="modalRegistroPersonalizado" tabindex="-1" aria-labelledby="modalRegistroPersonalizadoLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('guardar.store') }}" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="modalRegistroPersonalizadoLabel">Formulario Plan Personalizado</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <!-- Datos ocultos generales del plan -->
              <input type="hidden" name="tipodeplan" value="Personalizado">
              <input type="hidden" name="fecha_pago">
              <input type="hidden" name="objetivo" value="Acceso al gimnasio">
              <input type="hidden" name="entrenador" value="Plan Personalizado">
              <input type="hidden" name="nutricionista" value="Sin Nutricionista">
              <input type="hidden" name="descripcion" value="Plan Personalizado">

              <!-- Datos del usuario -->
              <div class="mb-3">
                <label>Nombres</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
              <div class="mb-3">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="apellido" required>
              </div>
              <div class="mb-3">
                <label>Edad</label>
                <input type="number" class="form-control" name="edad" required>
              </div>
              <div class="mb-3">
                <label>Teléfono</label>
                <input type="number" class="form-control" name="telefono" required>
              </div>
              <div class="mb-3">
                <label>Peso (en libras)</label>
                <input type="number" class="form-control" name="peso" required>
              </div>
              <div class="mb-3">
                <label>Altura (en cm)</label>
                <input type="number" class="form-control" name="altura" required>
              </div>
              <div class="mb-3">
                <label>Correo electrónico</label>
                <input type="email" class="form-control" name="email" required>
              </div>

              <!-- Información del objetivo -->
              <div class="mb-3">
                <label>¿Con qué frecuencia haces ejercicio?</label>
                <select class="form-control" name="frecuencia" required>
                  <option>1-2 veces por semana</option>
                  <option>3-5 veces por semana</option>
                  <option>Diario</option>
                  <option>Nunca</option>
                </select>
              </div>
              <div class="mb-3">
                <label>¿Cuál es tu objetivo?</label>
                <select class="form-control" name="objetivo" id="objetivo" onchange="mostrarOpcionesAdicionales()" required>
                  <option value="">Selecciona una opción</option>
                  <option value="tonificar">Tonificar</option>
                  <option value="bajar">Bajar de peso</option>
                  <option value="salud">Solo por salud</option>
                </select>
              </div>
              <div class="mb-3" id="areas" style="display:none;">
                <label>¿Qué áreas deseas trabajar más?</label>
                <select class="form-control" name="areas">
                  <option>Abdomen</option>
                  <option>Piernas</option>
                  <option>Brazos</option>
                  <option>Todo el cuerpo</option>
                </select>
              </div>
              
              <!-- Frecuencia de pago -->
              <div class="mb-3">
                <label>Frecuencia de pago</label>
                <select name="frecuenciadepago" class="form-control" required>
                  <option value="">Selecciona una opción</option>
                  <option value="mensual">Mensual</option>
                  <option value="trimestral">Trimestral</option>
                  <option value="anual">Anual</option>
                </select>
              </div>

              <!-- Plan generado -->
              <div id="resultadoPlan" class="alert alert-info mt-4" style="display:none;"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="generarPlan()">Ver tu plan</button>
              <button type="submit" class="btn btn-success">Registrar y generar código</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Plan Básico -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="{{ route('guardar.store') }}" method="POST" onsubmit="return false;">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalRegistroLabel">Registro de Usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" name="tipodeplan" value="Basico">
                      <input type="hidden" name="frecuenciadepago" value="mensual">
                      <input type="hidden" name="fecha_pago">
                      <input type="hidden" name="objetivo" value="Acceso al gimnasio">
                      <input type="hidden" name="entrenador" value="Sin entrenador">
                      <input type="hidden" name="nutricionista" value="Sin Nutricionista">
                      <input type="hidden" name="descripcion" value="Plan Basico">

                      <div class="mb-2">
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="mb-2">
                          <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="edad" class="form-control" placeholder="Edad" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                      </div>
                      <div class="mb-2">
                          <input type="number" name="peso" class="form-control" placeholder="Peso (kg)" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="altura" class="form-control" placeholder="Altura (cm)">
                      </div>
                      <div class="mb-2">
                          <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Registrar</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  </div>
              </form>
          </div>
      </div>
    </div>

    <!-- Modal Plan Plus -->
    <div class="modal fade" id="modalRegistroPLUS" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="{{ route('guardar.store') }}" method="POST">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalRegistroLabel">Registro de Usuario - Plan Plus</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" name="tipodeplan" value="Plus">
                      <input type="hidden" name="frecuenciadepago" value="mensual">
                      <input type="hidden" name="fecha_pago">

                      <div class="mb-2">
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="mb-2">
                          <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="edad" class="form-control" placeholder="Edad" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                      </div>
                      <div class="mb-2">
                          <input type="number" name="peso" class="form-control" placeholder="Peso (kg)" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="altura" class="form-control" placeholder="Altura (cm)">
                      </div>
                      <div class="mb-2">
                          <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                      </div>

                      <div class="mb-2">
                          <select name="objetivo" class="form-select" required>
                              <option value="">Selecciona una clase</option>
                              <option value="Fitness Funcional">Fitness Funcional</option>
                              <option value="Musculación y Fuerza">Musculación y Fuerza</option>
                              <option value="Cardio Intensivo">Cardio Intensivo</option>
                              <option value="Entrenamiento HIIT">Entrenamiento HIIT</option>
                              <option value="Yoga y Flexibilidad">Yoga y Flexibilidad</option>
                              <option value="Resistencia y Core">Resistencia y Core</option>
                          </select>
                      </div>

                      <div class="mb-2">
                          <select name="entrenador" class="form-select" required>
                              <option value="">Selecciona un entrenador</option>
                              <option value="Laura Torres">Laura Torres - Fitness funcional</option>
                              <option value="Carlos Díaz">Carlos Díaz - Musculación y fuerza</option>
                              <option value="Valeria Gómez">Valeria Gómez - Entrenadora personal</option>
                          </select>
                      </div>

                      <div class="mb-2">
                          <textarea name="descripcion" class="form-control" placeholder="Descripción (opcional)"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Registrar</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  </div>
              </form>
          </div>
      </div>
    </div>

    <!-- Modal Plan Premium -->
    <div class="modal fade" id="modalRegistroPremium" tabindex="-1" aria-labelledby="modalRegistroPremiumLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="{{ route('guardar.store') }}" method="POST">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalRegistroPremiumLabel">Registro de Usuario - Plan Premium</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" name="tipodeplan" value="Premium">
                      <input type="hidden" name="frecuenciadepago" value="mensual">
                      <input type="hidden" name="fecha_pago">

                      <div class="mb-2">
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="mb-2">
                          <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="edad" class="form-control" placeholder="Edad" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                      </div>
                      <div class="mb-2">
                          <input type="number" name="peso" class="form-control" placeholder="Peso (kg)" required>
                      </div>
                      <div class="mb-2">
                          <input type="number" name="altura" class="form-control" placeholder="Altura (cm)">
                      </div>
                      <div class="mb-2">
                          <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                      </div>

                      <div class="mb-2">
                          <select name="objetivo" class="form-select" required>
                              <option value="">Selecciona una clase</option>
                              <option value="Fitness Funcional">Fitness Funcional</option>
                              <option value="Musculación y Fuerza">Musculación y Fuerza</option>
                              <option value="Cardio Intensivo">Cardio Intensivo</option>
                              <option value="Entrenamiento HIIT">Entrenamiento HIIT</option>
                              <option value="Yoga y Flexibilidad">Yoga y Flexibilidad</option>
                              <option value="Resistencia y Core">Resistencia y Core</option>
                          </select>
                      </div>

                      <div class="mb-2">
                          <select name="entrenador" class="form-select" required>
                              <option value="">Selecciona un entrenador</option>
                              <option value="Laura Torres">Laura Torres - Fitness funcional</option>
                              <option value="Carlos Díaz">Carlos Díaz - Musculación y fuerza</option>
                              <option value="Valeria Gómez">Valeria Gómez - Entrenadora personal</option>
                          </select>
                      </div>

                      <div class="mb-2">
                          <select name="nutricionista" class="form-select" required>
                              <option value="">Selecciona un nutricionista</option>
                              <option value="Ana Martínez">Ana Martínez - Nutrición deportiva</option>
                              <option value="Luis Herrera">Luis Herrera - Nutrición clínica</option>
                              <option value="María Pérez">María Pérez - Nutrición para pérdida de peso</option>
                              <option value="Jorge Ramírez">Jorge Ramírez - Nutrición vegetariana y vegana</option>
                          </select>
                      </div>

                      <div class="mb-2">
                          <textarea name="descripcion" class="form-control" placeholder="Comentarios adicionales (opcional)"></textarea>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  </div>
              </form>
          </div>
      </div>
    </div>


    <!-- Resultado QR -->
<div id="resultadoQR" class="text-center mt-5" style="display:none;">
    <h4 id="mensajeQR" class="fw-bold text-primary">Registro exitoso</h4>
    <div id="qr" class="my-4 d-flex justify-content-center"></div>
    <p class="mt-3 fs-5 fw-semibold text-success">
        ✅ CUANDO USTED INGRESE NUEVAMENTE, MUESTRE SU CÓDIGO EN EL GIMNASIO.
    </p>
    <p id="diasRestantes" class="fs-5 fw-semibold text-danger"></p>
</div>

</div> <!-- Cierre del container -->

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    // Muestra u oculta opciones adicionales según el objetivo seleccionado
    function mostrarOpcionesAdicionales() {
        const objetivo = document.getElementById('objetivo').value;
        const areas = document.getElementById('areas');
        areas.style.display = (objetivo === 'bajar') ? 'block' : 'none';
    }

    // Genera el mensaje del plan personalizado según opciones
    function generarPlan() {
        const objetivo = document.getElementById('objetivo').value;
        const area = document.querySelector('[name="areas"]')?.value || '';
        let mensaje = "";

        if (objetivo === "bajar") {
            if (area === "Abdomen") {
                mensaje = "🧘‍♀️ Cardio 30 min + Rutina abdomen 5x semana + dieta baja en carbohidratos.";
            } else if (area === "Piernas") {
                mensaje = "🏋️‍♀️ Sentadillas, estocadas y cardio 4x semana.";
            } else {
                mensaje = "🔥 Plan para bajar de peso completo con ejercicios y dieta balanceada.";
            }
        } else if (objetivo === "tonificar") {
            mensaje = "💪 Pesas ligeras, resistencia y descanso adecuado. 4-5x semana.";
        } else if (objetivo === "salud") {
            mensaje = "🌿 Caminata diaria + estiramientos + hidratación y buena alimentación.";
        } else {
            mensaje = "Selecciona un objetivo para generar tu plan.";
        }

        const resultado = document.getElementById('resultadoPlan');
        resultado.innerText = mensaje;
        resultado.style.display = 'block';
    }

    // Variables para mensaje QR y días restantes
    let qrMensaje = '';
    let qrDias = 0;

    // Función para mostrar el código QR y mensaje
    function mostrarQR() {
        const qrContainer = document.getElementById('qr');
        const resultadoQR = document.getElementById('resultadoQR');
        
        // Clear previous content
        qrContainer.innerHTML = '';
        resultadoQR.style.display = 'block';
        
        // Always show the text message
        document.getElementById('mensajeQR').innerText = qrMensaje;
        document.getElementById('diasRestantes').innerText = `Le quedan ${qrDias} días de membresía.`;

        try {
            // Try to generate QR code
            new QRCode(qrContainer, {
                text: qrMensaje,
                width: 200,
                height: 200,
                correctLevel: QRCode.CorrectLevel.L // Lowest error correction = more capacity
            });
        } catch (error) {
            console.warn('QR generation failed, falling back to text', error);
            qrContainer.innerHTML = `
                <div class="alert alert-info p-3">
                    <p class="mb-1"><strong>ID de membresía:</strong></p>
                    <p class="font-monospace">${qrMensaje}</p>
                    <p class="small text-muted mt-1">(Mostrando texto en lugar de QR)</p>
                </div>
            `;
        }
        // Oculta el spinner y texto de procesando si existen
        const spinner = document.getElementById('qrSpinner');
        if (spinner) spinner.style.display = 'none';
        const procesando = document.getElementById('qrProcesando');
        if (procesando) procesando.style.display = 'none';
    }

    // Maneja el envío de formularios y crea el QR tras registro exitoso
    function handleFormSubmit(modalId, plan, dias) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        const form = modal.querySelector('form');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Deshabilita el botón de registrar y muestra spinner y texto
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `<span id="qrSpinner" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                <span id="qrProcesando">Procesando...</span>`;
            }

            const fechaPagoInput = form.querySelector('input[name="fecha_pago"]');
            if (fechaPagoInput) {
                const hoy = new Date();
                fechaPagoInput.value = hoy.toISOString().slice(0, 10);
            }

            const formData = new FormData(form);
            const nombre = formData.get('nombre');
            const mensaje = `Bienvenido/a ${nombre} a FitZone (${plan})`;

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text || 'Error en el registro'); });
                }
                return response.text();
            })
            .then(data => {
                qrMensaje = mensaje;
                qrDias = dias;
                const bsModal = bootstrap.Modal.getInstance(modal);
                bsModal.hide();
                setTimeout(mostrarQR, 350);
            })
            .catch(error => {
                alert('Error al registrar: ' + error.message);
            })
            .finally(() => {
                // Reactiva el botón y restaura el texto original
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = submitBtn.classList.contains('btn-success') ? 'Registrar' : 'Registrar y generar código';
                }
            });
        });
    }

    // Inicialización al cargar la página
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('resultadoQR').style.display = 'none';
        document.getElementById('qr').innerHTML = '';
        document.getElementById('mensajeQR').innerText = 'Registro exitoso';
        document.getElementById('diasRestantes').innerText = '';

        handleFormSubmit('modalRegistro', 'Básico', 30);
        handleFormSubmit('modalRegistroPLUS', 'Plus', 30);
        handleFormSubmit('modalRegistroPremium', 'Premium', 30);
        handleFormSubmit('modalRegistroPersonalizado', 'Personalizado', 30);

        // Al abrir cualquier modal, limpiar resultados previos de QR
        ['modalRegistro', 'modalRegistroPLUS', 'modalRegistroPremium', 'modalRegistroPersonalizado'].forEach(function(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.addEventListener('show.bs.modal', function () {
                    document.getElementById('resultadoQR').style.display = 'none';
                    document.getElementById('qr').innerHTML = '';
                    document.getElementById('mensajeQR').innerText = 'Registro exitoso';
                    document.getElementById('diasRestantes').innerText = '';
                });
            }
        });
    });
</script>

@endsection
