<li class="nav-item dropdown">
    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
        <span><i class="notika-icon notika-mail"></i></span>
        @if ($count)
            <div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>{{$count}}</span></div>
        @endif
    </a>
    <div role="menu" class="dropdown-menu message-dd animated zoomIn">
        @if ($count)
            <div class="hd-mg-tt">
                <h2>Novas Mensagens</h2>
            </div>
            <div class="hd-message-info">
                @foreach ($last as $mensagem)
                    <a href="#">
                        <div class="hd-message-sn">
                            <div class="hd-mg-ctn">
                                <h3>{{$mensagem->name}}</h3>
                                <h6>{{$mensagem->reason}}</h6>
                                <p>{{$mensagem->cropped_message}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
        <div class="hd-mg-va">
            <a href="#">Ver Todas</a>
        </div>
    </div>
</li>
