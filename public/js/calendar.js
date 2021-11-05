
document.addEventListener('DOMContentLoaded', function() {

    //seleccionar formulario
    let formulario = document.querySelector('#formEventos')

    var calendarEl = document.getElementById('calendar');   //busca un elemento con id "calendar"
    var calendar = new FullCalendar.Calendar(calendarEl, {  //
      initialView: 'dayGridMonth',

      //languages
      locale:"es",

      //evita domingo y sabado
      weekends:false,

      //enfatizar horario laboral
      businessHours: {
        // days of week. an array of zero-based day of week integers (0=Sunday)
        daysOfWeek: [ 1, 2, 3, 4, 5], // Monday - Thursday

        startTime: '10:00', // a start time (10am in this example)
        endTime: '18:00', // an end time (6pm in this example)
      },

      displayEventTime:false,

      headerToolbar:{
        left:'prev,next today',
        center:'title',
        right: 'dayGridMonth,timeGridWeek,listWeek' //dia, mes y año
      },

      //mostrar eventos
      events: baseUrl+'reunionAprendiz/mostrar',
      /*eventSources:{
          url:baseUrl+'/evento/mostrar',
          method:'POST',
          extraParams:{
              _token:formulario._token.value,
          }
      }*/

      //click de dia
      dateClick:function(info){
        document.getElementById('btnGuardar').style.display='block'
        document.getElementById('btnModificar').style.display='none'
        document.getElementById('btnEliminar').style.display='none'

          //traer las fechas del calendar
          formulario.reset();
          formulario.start.value=info.dateStr;
          formulario.end.value=info.dateStr;

          $('#evento').modal("show");
      },

      //para actualizar
      eventClick:function(info){

        //recibir formulario
        axios.post(baseUrl+'reunionAprendiz/' + info.event.id)
        .then((respuesta)=>{
            document.getElementById('btnGuardar').style.display='none'
            document.getElementById('btnModificar').style.display='block'
            document.getElementById('btnEliminar').style.display='block'

            //trae los datos
            formulario.id.value = info.event.id;
            formulario.title.value = respuesta.data.title;
            formulario.Descripcion.value = respuesta.data.Descripcion;
            formulario.Modalidad.value = respuesta.data.Modalidad;
            formulario.MomentoEleccion.value = respuesta.data.MomentoEleccion;
            formulario.Estado.value = respuesta.data.Estado;
            formulario.start.value = respuesta.data.start;
            formulario.end.value = respuesta.data.end;

            $('#evento').modal("show");

        }).catch(
            error=>{
                if(error.response){
                    console.log(error.response.data)
                }
            }
        )
      },

    });
    calendar.render();

    //btn guardar
    document.getElementById('btnGuardar').addEventListener('click',function(){
        url('reunionAprendiz');
    })

    //btnModificar
    document.getElementById('btnModificar').addEventListener('click',function(){
        url('reunionAprendiz/'+formulario.id.value+'/edit');
    })

    //btnEliminar
    document.getElementById('btnEliminar').addEventListener('click',function(){
        url('reunionAprendiz/'+formulario.id.value+'/delete');
    })


    //function
    let url =(url)=>{

        let newUrl = baseUrl+url;

        const datos = new FormData(formulario)

        //enviar formulario
        axios.post(newUrl, datos).
        then((respuesta)=>{
            calendar.refetchEvents();
            $('#evento').modal("hide");
        }).catch(
            error=>{
                if(error.response){
                    console.log(error.response.data)
                }
            }
        )

    }

    /*
    //actualizar
    let actualizar =(respuesta)=>{
        //enviar formulario
        axios.post('http://127.0.0.1:8000/evento/'+respuesta.data.id+'/edit').
        then((respuesta)=>{
            calendar.refetchEvents();
            $('#evento').modal("hide");
        }).catch(
            error=>{
                if(error.response){
                    console.log(error.response.data)
                }
            }
        )
    }
    */

  });
