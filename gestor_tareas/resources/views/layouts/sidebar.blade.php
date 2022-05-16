
    <div class="wrapper" >
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('home') }}" ><h3>WorkFine</h3></a>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{ route('home') }}" >Home</a>
                </li>
                <li id="today">
                    <a href="#tareasHoy" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hoy</a>
                    <ul class="collapse list-unstyled" id="tareasHoy">
                        @foreach($tareasHoy as $tarea)
                        <li>
                            <input type="hidden" name="tareaHoy" value="{{$tarea->id}}" id="hoy">
                            <a href="#" id="tareaHoy-{{$tarea->id}}">
                                    {{$tarea->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li id="next">
                    <a href="#">Próximas</a>
                </li>
                <li>
                    <a href="{{ route('proyectos') }}">Proyectos</a>
                    {{-- <ul class="collapse list-unstyled" id="proyectosSubmenu">
                        <li>
                            <a href="#">Page 1</a> 
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul> --}}
                </li>
              
            </ul>
            {{-- <ul class="list-unstyled components">
                <li>
                    <div class="row">
                        <div class="">
                            <button class="btn btn-primary" type="button" id="buttonAddTask">Añadir Tarea</button>
                            <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button>
                        </div>
                    </div> 
                </li>
                
            </ul> --}}
        </nav>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            $('#todasTareas').on("click",function(){
                console.log("hola");
                $tareas = document.getElementsByClassName("tarea");
                $arrayOfElements = Array.from($tareas);

                for (let i = 0; i < $arrayOfElements.length; i++) {
                    const element = $arrayOfElements[i];
                        $('#tarea-'+element.dataset.value).css("display","block");
                    }
                });

                if (matchMedia('(max-width: 767px)').matches) {
                    $('main').on("click",function(){
                        $('#sidebar').removeClass("active");
                        $('#sidebarCollapse').removeClass("active");
                    });
                }
        });
    </script>
